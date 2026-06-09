<?php

if (!class_exists('Stotage_Page')) {

    class Stotage_Page
    {
        public function get_site_loader(){

            $site_loader = stotage()->get_theme_opt( 'site_loader', false );
            $loader_logo = stotage()->get_theme_opt('loader_logo' );
            $site_loader_p = stotage()->get_page_opt( 'site_loader_p', false );
            $loader_logo_p = stotage()->get_page_opt('loader_logo_p' );
            if($site_loader_p) { ?>
                <div id="pxl-loadding" class="pxl-loader">
                    <div class="loader-circle">
                        <div class="loader-line-mask">
                            <div class="loader-line"></div>
                        </div>
                        <div class="loader-logo"><img src="<?php echo esc_url($loader_logo_p['url']); ?>" /></div>
                    </div>
                </div>
            <?php } 
            else if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader">
                    <div class="loader-circle">
                        <div class="loader-line-mask">
                            <div class="loader-line"></div>
                        </div>
                        <div class="loader-logo"><img src="<?php echo esc_url($loader_logo['url']); ?>" /></div>
                    </div>
                </div>
            <?php } 
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        public function get_page_title(){
            $titles = $this->get_title();
            $pt_mode = stotage()->get_opt('pt_mode');
            $ptitle_scroll_opacity = stotage()->get_opt('ptitle_scroll_opacity');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)stotage()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor" class="<?php if($ptitle_scroll_opacity == true) { echo 'pxl-scroll-opacity'; } ?>">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php 
            } else {
                $ptitle_breadcrumb_on = stotage()->get_opt( 'ptitle_breadcrumb_on', '1' ); 
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="pxl--parallax" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                        <div class="ptitle-col-right col-12">
                                <?php if($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <h1 class="pxl-page-title"><?php echo stotage_html($titles['title']) ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
        } 

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'stotage' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404 Error', 'stotage' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'stotage' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'stotage' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb() {
            if ( ! class_exists( 'CASE_Breadcrumb' ) ) {
                return;
            }
        
            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();
        
            if ( empty( $entries ) || ! is_array( $entries ) ) {
                return;
            }
        
            // --- chuẩn bị thông tin post type nếu cần chèn ---
            $should_insert_pt = false;
            $pt_label = '';
            $pt_archive_link = '';
        
            if ( is_singular() ) {
                $post_type = get_post_type();
                if ( $post_type && ! in_array( $post_type, array( 'post', 'page', 'attachment' ), true ) ) {
                    $pt_obj = get_post_type_object( $post_type );
                    if ( $pt_obj ) {
                        $pt_label = ! empty( $pt_obj->labels->name ) ? $pt_obj->labels->name : ucfirst( $post_type );
                        if ( function_exists( 'get_post_type_archive_link' ) ) {
                            $pt_archive_link = get_post_type_archive_link( $post_type ); // có thể trả false nếu CPT không có archive
                        }
                        $should_insert_pt = true;
                    }
                }
            }
        
            // --- DEBUG: nếu muốn kiểm tra cấu trúc entries, bật dòng này và xem wp-content/debug.log ---
            // error_log( 'CASE Breadcrumb raw entries: ' . print_r( $entries, true ) );
        
            // --- tạo mảng mới và chèn post type archive ngay sau Home (index 0) ---
            $new_entries = array();
            foreach ( $entries as $i => $entry ) {
                $entry = wp_parse_args( $entry, array( 'label' => '', 'url' => '' ) );
                $new_entries[] = $entry;
        
                // sau phần tử đầu tiên (thường là Home) -> chèn Post Type nếu cần và nếu chưa có
                if ( $i === 0 && $should_insert_pt ) {
                    $exists = false;
                    foreach ( $entries as $e_check ) {
                        $e_check = wp_parse_args( $e_check, array( 'label' => '', 'url' => '' ) );
                        if ( ! empty( $e_check['label'] ) && mb_strtolower( trim( $e_check['label'] ) ) === mb_strtolower( trim( $pt_label ) ) ) {
                            $exists = true;
                            break;
                        }
                    }
                    if ( ! $exists ) {
                        $new_entries[] = array(
                            'label' => $pt_label,
                            // nếu không có archive link thì đặt url rỗng -> sẽ render là span (không click được)
                            'url'   => $pt_archive_link ? $pt_archive_link : ''
                        );
                    }
                }
            }
        
            // --- render breadcrumb từ $new_entries ---
            ob_start();
            foreach ( $new_entries as $entry ) {
                $entry = wp_parse_args( $entry, array( 'label' => '', 'url' => '' ) );
                $entry_label = $entry['label'];
        
                if ( ! empty( $_GET['blog_title'] ) ) {
                    $blog_title = sanitize_text_field( wp_unslash( $_GET['blog_title'] ) );
                    $custom_title = explode( '_', $blog_title );
                    $entry_label = implode( ' ', array_map( 'sanitize_text_field', $custom_title ) );
                }
        
                if ( empty( $entry_label ) ) {
                    continue;
                }
        
                echo '<li>';
        
                if ( ! empty( $entry['url'] ) ) {
                    printf(
                        '<a class="breadcrumb-hidden" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_html( $entry_label )
                    );
                } else {
                    $sg_post_title = stotage()->get_theme_opt( 'sg_post_title', 'default' );
                    $sg_post_title_text = stotage()->get_theme_opt( 'sg_post_title_text' );
                    if ( is_singular( 'post' ) && $sg_post_title === 'custom_text' && ! empty( $sg_post_title_text ) ) {
                        $entry_label = $sg_post_title_text;
                    }
                    $sg_product_ptitle = stotage()->get_theme_opt( 'sg_product_ptitle', 'default' );
                    $sg_product_ptitle_text = stotage()->get_theme_opt( 'sg_product_ptitle_text' );
                    if ( is_singular( 'product' ) && $sg_product_ptitle === 'custom_text' && ! empty( $sg_product_ptitle_text ) ) {
                        $entry_label = $sg_product_ptitle_text;
                    }
                    printf( '<span class="breadcrumb-entry">%s</span>', esc_html( $entry_label ) );
                }
        
                echo '</li>';
            }
        
            $output = ob_get_clean();
            if ( $output ) {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post( $output ) );
            }
        }
        

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'stotage_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.25 8.90625C5.125 9.0625 4.875 9.0625 4.75 8.90625L1.09375 5.28125C0.9375 5.125 0.9375 4.90625 1.09375 4.75L4.75 1.125C4.875 0.96875 5.125 0.96875 5.25 1.125L5.5 1.34375C5.625 1.5 5.625 1.71875 5.5 1.875L2.875 4.46875H14.625C14.8125 4.46875 15 4.65625 15 4.84375V5.15625C15 5.375 14.8125 5.53125 14.625 5.53125H2.875L5.5 8.15625C5.625 8.3125 5.625 8.53125 5.5 8.6875L5.25 8.90625Z" fill="#010101"/>
                </svg>
                ',
                'next_text' => '<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="#010101"/>
                </svg>
                ',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
                ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                    <div class="pxl-pagination-links">
                        <?php
                        echo ''.$links;
                        ?>
                    </div>
                </nav>
                <?php
            endif;
        }
    }
}
