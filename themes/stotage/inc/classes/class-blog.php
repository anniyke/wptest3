<?php
if (!class_exists('Stotage_Blog')) {
    class Stotage_Blog
    {

        public function get_archive_meta($post_id = 0) {
            $archive_category = stotage()->get_theme_opt( 'archive_category', true );
            $post_comments_on = stotage()->get_theme_opt('post_comments_on', true);
            $archive_author = stotage()->get_theme_opt( 'archive_author', true );
            if($archive_author || $archive_category || $post_comments_on) : ?>
                <div class="post-metas">
                    <div class="meta-inner ">
                        <?php if($archive_author) : ?>
                            <span class="post-author  ">
                                <span class="icon-post"><i class="flaticon-user"></i></span>
                                <span><?php echo esc_html__('By', 'stotage'); ?> <?php the_author_posts_link(); ?></span>
                            </span>
                        <?php endif; ?> 
                        <?php if($archive_category && has_category('', $post_id)) : ?>
                            <span class="post-category">
                                <span class="icon-post"><i class="flaticon-tag"></i></span>
                                <span><?php the_terms( $post_id, 'category', '', ', ', '' ); ?></span>
                            </span>
                        <?php endif; ?>
                        <?php if($post_comments_on) : ?>
                            <span class="post-comments  ">
                                <a href="<?php echo get_comments_link($post_id); ?>">
                                    <span class="icon-post"><i class="flaticon-speech-bubble"></i></span>
                                    <span><?php comments_number(esc_html__('No Comments', 'stotage'), esc_html__(' 1 Comment', 'stotage'), esc_html__('%  Comments', 'stotage'), $post_id); ?></span>
                                </a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; 
        }

        public function get_archive_meta_2($post_id = 0) {
           $archive_category = stotage()->get_theme_opt( 'archive_category', true );
           $archive_date = stotage()->get_theme_opt( 'archive_date', true );
           ?>
           <div class="archive-meta">
            <?php if($archive_category && has_category('', $post_id)) : ?>
                <span class="post-category">
                    <?php the_terms( $post_id, 'category', '', ', ', '' ); ?>
                </span>
            <?php endif; ?>
            <?php if($archive_date) : ?>
                <span class="date"><?php echo get_the_date('M d,Y'); ?> </span>
            <?php endif; ?>
        </div>
    <?php }

    public function get_excerpt( $length = 55 ){
        $pxl_the_excerpt = get_the_excerpt();
        if(!empty($pxl_the_excerpt)) {
            echo esc_html($pxl_the_excerpt);
        } else {
            echo wp_kses_post($this->get_excerpt_more( $length ));
        }
    }

    public function get_excerpt_more( $length = 55, $post = null ) {
        $post = get_post( $post );

        if ( empty( $post ) || 0 >= $length ) {
            return ''; 
        }

        if ( post_password_required( $post ) ) {
            return esc_html__( 'Post password required.', 'stotage' );
        }

        $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
        $content = str_replace( ']]>', ']]&gt;', $content );

        $excerpt_more = apply_filters( 'stotage_excerpt_more', '&hellip;' );
        $excerpt      = wp_trim_words( $content, $length, $excerpt_more );

        return $excerpt;
    }

    public function get_post_metas(){
        $post_categories = stotage()->get_theme_opt('post_ca',true);
        $post_date = stotage()->get_theme_opt('post_date', true);
        $author_id = get_the_author_meta('ID');
        if ($post_categories  || $post_date || $post_view || $post_comment) : ?>
            <div class="post-metas">
                <?php if($post_categories  || $post_date) : ?>
                    <?php if($post_categories ) : ?>
                        <div class="category"><?php the_terms( get_the_ID(), 'category', '', ', ', '' ); ?></div>
                    <?php endif; ?>
                    <?php if($post_date) : ?>
                        <div class="pxl-item--date">
                            <?php echo get_the_date('M d, Y'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; }

        public function stotage_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_post_tags(){
            $post_tag = stotage()->get_theme_opt( 'post_tag', true );
            if($post_tag != '1') return;
            $tags_list = get_the_tag_list();
            if ( $tags_list ){
                echo '<div class="post-tags ">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_post_share($post_id = 0) {
            $post_social_follow = stotage()->get_theme_opt( 'post_social_follow', false );
            $link_facebook = stotage()->get_theme_opt('link_facebook', '');
            $link_twitter = stotage()->get_theme_opt('link_twitter', '');
            $link_behance = stotage()->get_theme_opt('link_behance', '');
            $link_youtube = stotage()->get_theme_opt('link_youtube', '');
            if($post_social_follow != '1') return;
            $post = get_post($post_id);
            ?>
            <div class="post-shares align-items-center">
                <h5 class="label"><?php echo esc_html__('Follow Us:', 'stotage'); ?> </h5>
                <div class="wrap-social">
                    <?php if($link_facebook) : ?>
                        <a class="fb" href="<?php echo esc_attr($link_facebook)?>">
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.1875 8.95312H0.382812V6.27344H2.1875V5.125C2.1875 2.14453 3.52734 0.75 6.45312 0.75C7 0.75 7.95703 0.859375 8.33984 0.96875V3.40234C8.14844 3.375 7.79297 3.375 7.32812 3.375C5.90625 3.375 5.35938 3.92188 5.35938 5.31641V6.27344H8.20312L7.71094 8.95312H5.35938V14.75H2.1875V8.95312Z" fill="#67917A"/>
                            </svg>

                        </a>
                    <?php endif; ?>
                    <?php if($link_twitter) : ?>
                        <a class="insta" href="<?php echo esc_attr($link_twitter)?>">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.6367 0.0625H12.5508L8.33984 4.90234L13.3164 11.4375H9.43359L6.37109 7.47266L2.89844 11.4375H0.957031L5.46875 6.29688L0.710938 0.0625H4.70312L7.4375 3.69922L10.6367 0.0625ZM9.95312 10.2891H11.0195L4.12891 1.15625H2.98047L9.95312 10.2891Z" fill="#CB360F"/>
                            </svg>

                        </a>
                    <?php endif; ?>
                    <?php if($link_behance) : ?>
                        <a class="tt" href="<?php echo esc_attr($link_behance)?>">
                            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.34375 5.25781C7.51953 5.58594 8.09375 6.48828 8.09375 7.69141C8.09375 9.66016 6.45312 10.5078 4.67578 10.5078H0V0.828125H4.56641C6.20703 0.828125 7.65625 1.29297 7.65625 3.23438C7.65625 4.19141 7.19141 4.82031 6.34375 5.25781ZM2.10547 2.46875V4.73828H4.26562C5.03125 4.73828 5.57812 4.41016 5.57812 3.58984C5.57812 2.6875 4.89453 2.46875 4.12891 2.46875H2.10547ZM4.40234 8.86719C5.25 8.86719 5.96094 8.56641 5.96094 7.58203C5.96094 6.59766 5.38672 6.1875 4.42969 6.1875H2.10547V8.86719H4.40234ZM14.1914 2.27734V1.32031H10.2812V2.27734H14.1914ZM15.75 7.11719C15.75 7.22656 15.7227 7.36328 15.7227 7.47266H10.6641C10.6641 8.59375 11.2656 9.25 12.3867 9.25C12.9609 9.25 13.7266 8.94922 13.918 8.34766H15.6133C15.0938 9.93359 14 10.6992 12.332 10.6992C10.1172 10.6992 8.72266 9.19531 8.72266 7.00781C8.72266 4.90234 10.1719 3.28906 12.332 3.28906C14.5195 3.28906 15.75 5.03906 15.75 7.11719ZM10.6641 6.24219H13.8086C13.7266 5.3125 13.2344 4.76562 12.25 4.76562C11.3477 4.76562 10.7188 5.33984 10.6641 6.24219Z" fill="#67917A"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if($link_youtube) : ?>
                        <a class="linked" href="<?php echo esc_attr($link_youtube)?>">
                            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.0117 2.16797C15.3398 3.31641 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 8.21094 15.0117 9.38672C14.8477 10.043 14.3281 10.5352 13.6992 10.6992C12.5234 11 7.875 11 7.875 11C7.875 11 3.19922 11 2.02344 10.6992C1.39453 10.5352 0.875 10.043 0.710938 9.38672C0.382812 8.21094 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 3.31641 0.710938 2.16797C0.875 1.51172 1.39453 0.992188 2.02344 0.828125C3.19922 0.5 7.875 0.5 7.875 0.5C7.875 0.5 12.5234 0.5 13.6992 0.828125C14.3281 0.992188 14.8477 1.51172 15.0117 2.16797ZM6.34375 7.99219L10.2266 5.77734L6.34375 3.5625V7.99219Z" fill="#67917A"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }

        public function get_post_nav() {
            $post_navigation = stotage()->get_theme_opt( 'post_navigation', true );
            if($post_navigation != '1') return;
            global $post;

            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();
            if(empty($previous_post) && empty($next_post)) return;

            ?>
            <div class="single-next-prev-nav justify-content-between align-items-center">
                <?php if(!empty($previous_post)): 
                    ?>
                    <div class="nav-wrap prev  relative text-start">
                        <a class="nav-icon" href="<?php echo esc_url(get_permalink($previous_post->ID));?>">
                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.25 8.90625C5.125 9.0625 4.875 9.0625 4.75 8.90625L1.09375 5.28125C0.9375 5.125 0.9375 4.90625 1.09375 4.75L4.75 1.125C4.875 0.96875 5.125 0.96875 5.25 1.125L5.5 1.34375C5.625 1.5 5.625 1.71875 5.5 1.875L2.875 4.46875H14.625C14.8125 4.46875 15 4.65625 15 4.84375V5.15625C15 5.375 14.8125 5.53125 14.625 5.53125H2.875L5.5 8.15625C5.625 8.3125 5.625 8.53125 5.5 8.6875L5.25 8.90625Z" fill="#fff"/>
                            </svg>
                        </a>
                        <div class="nav-label-wrap  align-items-center">
                            <span class="nav-label"><?php echo esc_html__('Prev post', 'stotage'); ?></span>
                            <div class="nav-title"><?php echo '<a href="' . get_permalink($previous_post->ID) . '">' . get_the_title($previous_post->ID) . '</a>'; ?></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($next_post)) : 
                    ?>
                    <div class="nav-wrap next relative text-end">
                        <div class="nav-label-wrap  align-items-center justify-content-end">
                            <span class="nav-label"><?php echo esc_html__('Next Post', 'stotage'); ?></span>
                            <div class="nav-title"><?php echo '<a href="' . get_permalink($next_post->ID) . '">' . get_the_title($next_post->ID) . '</a>'; ?></div>
                        </div>
                        <a class="nav-icon" href="<?php echo esc_url(get_permalink($next_post->ID));?>">
                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div> 
            <?php  
        }
        public function get_project_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            $link_grid = stotage()->get_theme_opt( 'link_grid', '' );
            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-project--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                ?>
                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="far fa-arrow-left"></i>Prev Project</a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-grid">
                            <?php if (!empty($link_grid)) { ?>
                                <a  href="<?php echo esc_url($link_grid); ?>">
                                    <span class="bl bl1"></span>
                                    <span class="bl bl2"></span>
                                    <span class="bl bl3"></span>
                                    <span class="bl bl4"></span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                ?>
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">Next Project <i class="far fa-arrow-right"></i> </a>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }
        public function get_related_post(){
            $post_related_on = stotage()->get_theme_opt( 'post_related_on', false );

            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'stotage-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 3, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h3 class="widget-title"><?php echo esc_html__('Related Posts', 'stotage'); ?></h3>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                                <?php foreach ($query_similar->posts as $post):
                                    $thumbnail_url = '';
                                    if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'stotage-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php }
        } wp_reset_postdata();
    }
}

}