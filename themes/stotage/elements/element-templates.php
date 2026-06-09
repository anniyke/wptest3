<?php 
use Elementor\Embed;
if(!function_exists('stotage_get_post_grid')){
    function stotage_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            stotage_get_post_grid_layout1($posts, $settings);
            break;

            case 'post-2':
            stotage_get_post_grid_layout2($posts, $settings);
            break;

            case 'post-3':
            stotage_get_post_grid_layout3($posts, $settings);
            break;

            case 'portfolio-1':
            stotage_get_portfolio_grid_layout1($posts, $settings);
            break;

            case 'portfolio-2':
            stotage_get_portfolio_grid_layout2($posts, $settings);
            break;

            case 'portfolio-3':
            stotage_get_portfolio_grid_layout3($posts, $settings);
            break;

            case 'portfolio-4':
            stotage_get_portfolio_grid_layout4($posts, $settings);
            break;


            case 'service-1':
            stotage_get_service_grid_layout1($posts, $settings);
            break;


            case 'event-1':
            stotage_get_event_grid_layout1($posts, $settings);
            break;

            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function stotage_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '645x450';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img          = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail'];
                    ?>
                    <div class="pxl-post--featured ">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="pxl-post--inner">
                    <div class="top">
                        <?php if($show_category == 'true'): ?>
                            <div class="pxl-post--category">
                                <?php the_terms( $post->ID, 'category', '', ', ' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_date == 'true') : ?>
                            <span class="post-date">
                                <?php echo get_the_date('M d, Y', $post->ID)  ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="pxl-post--title ">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo pxl_print_html(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}


function stotage_get_post_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '100x100';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--featured ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                    <div class="pxl-post--content">
                        <?php if($show_date == 'true') : ?>
                            <div class="post-date">
                                <?php echo get_the_date('F d , Y', $post->ID)  ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-post--title ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo pxl_print_html(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php
        endif; 
    endforeach;
endif;
}

function stotage_get_post_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '544x268';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--content">
                        <?php if($show_date == 'true') : ?>
                            <div class="post-date">
                                <?php echo get_the_date('F d , Y', $post->ID)  ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-post--title ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo pxl_print_html(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                    </div>
                    <div class="pxl-post--featured ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        endif; 
    endforeach;
endif;
}



// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function stotage_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '500x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            $video_url = get_post_meta($post->ID, 'video_url', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s"  data-wow-delay="400ms">
                    <div class="pxl-post--inner" >
                        <div class="pxl-post--featured ">
                        <span class="tg tg1"></span>
                        <span class="tg tg2"></span>
                        <span class="tg tg3"></span>
                        <span class="tg tg4"></span>
                        <?php if(!empty($video_url) && $show_video == 'true'): ?>
                            <a class="video-play-button pxl-action-popup" href="<?php echo esc_url($video_url); ?>"> <i class="caseicon-play1"></i> </a>
                        <?php endif; ?>
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                        </div>
                        <?php if($show_category == 'true'): ?>
                            <div class="pxl-post--category">
                                <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h5 class="pxl-post--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h5>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

function stotage_get_portfolio_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '1000x645';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s"  data-wow-delay="400ms">
                    <div class="pxl-post--inner " >
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                        </div>
                        <div class="pxl-content">
                            <?php if($show_category == 'true'): ?>
                                <div class="pxl-post--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                                </div>
                            <?php endif; ?>
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

function stotage_get_portfolio_grid_layout3($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '800x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s"  data-wow-delay="400ms">
                    <div class="pxl-post--inner " >
                        <span class="tg tg1"></span>
                        <span class="tg tg2"></span>
                        <span class="tg tg3"></span>
                        <span class="tg tg4"></span>
                        <a class="link-box" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                        </a>  
                        <div class="plus-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <rect x="8.5" width="16" height="1" transform="rotate(90 8.5 0)" fill="white"/>
                            <rect y="7.5" width="16" height="1" fill="white"/>
                        </svg>
                        </div>
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

function stotage_get_portfolio_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    if(!empty($bgr_ct['id'])) { 
        $img2  = pxl_get_image_by_size( array(
            'attach_id'  => $bgr_ct['id'],
            'thumb_size' => 'full',
            'class' => 'no-lazyload bgr-ct',
        ) );
        $thumbnail_bgr = $img2['thumbnail'];
    }
    $images_size = !empty($img_size) ? $img_size : '500x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s"  data-wow-delay="400ms">
                    <div class="pxl-post--inner" <?php if($tilt == 'true') { ?> data-tilt data-tilt-max="5" <?php } ?>>
                        <span class="tg tg1"></span>
                        <span class="tg tg2"></span>
                        <span class="tg tg3"></span>
                        <span class="tg tg4"></span>
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                        </div>
                        <?php if(!empty($bgr_ct['id'])) 
                            $img2  = pxl_get_image_by_size( array(
                                'attach_id'  => $bgr_ct['id'],
                                'thumb_size' => 'full',
                            ) ); { ?>
                                <?php echo wp_kses_post($thumbnail_bgr); ?>
                        <?php } ?> 
                        <div class="pxl-content">
                            <?php if($show_category == 'true'): ?>
                                <div class="pxl-post--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                                </div>
                            <?php endif; ?>
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function stotage_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : 'full';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                } 
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID);
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }  ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <span class="pxl-post--icon">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </span>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <span class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="pxl-post--title">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                    </h3>
                    <?php if($show_excerpt == 'true'): ?>
                        <p class="pxl-post--content">
                            <?php if($show_excerpt == 'true'): ?>
                                <?php
                                echo wp_trim_words( $post->post_excerpt, 20, null );
                                ?>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    endif;
}
//--------------------------------------------------
function stotage_get_event_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : 'full';
    if (is_array($posts)):
        $count_pos = 1;
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $event_external_link = get_post_meta($post->ID, 'event_external_link', true);
            $img_id = get_post_thumbnail_id($post->ID);
            $event_avatar = get_post_meta($post->ID, 'event_avatar', true); 
            $location = get_post_meta($post->ID, 'location', true);
            $date = get_post_meta($post->ID, 'date', true);
            $author = get_post_meta($post->ID, 'author', true);
            $price = get_post_meta($post->ID, 'price', true);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                        
                        <span class="pxl-post--avatar">
                            <?php if(!empty($event_avatar)) : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $event_avatar['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                                echo wp_kses_post($icon_thumbnail);
                                ?>
                                <span class="pxl-post--avatar-text">
                                    <?php echo pxl_print_html($author); ?>
                                </span>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="wrap-inner">
                        <h3 class="pxl-post--title">
                            <a href="<?php if(!empty($event_external_link)) { echo esc_url($event_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h3>
                        <div class="content-top">
                            <?php if(!empty($date)) : ?>
                                <span class="date ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                        <path d="M10.9375 2.5C11.6484 2.5 12.25 3.10156 12.25 3.8125V13.4375C12.25 14.1758 11.6484 14.75 10.9375 14.75H1.3125C0.574219 14.75 0 14.1758 0 13.4375V3.8125C0 3.10156 0.574219 2.5 1.3125 2.5H2.625V1.07812C2.625 0.914062 2.76172 0.75 2.95312 0.75H3.17188C3.33594 0.75 3.5 0.914062 3.5 1.07812V2.5H8.75V1.07812C8.75 0.914062 8.88672 0.75 9.07812 0.75H9.29688C9.46094 0.75 9.625 0.914062 9.625 1.07812V2.5H10.9375ZM1.3125 3.375C1.06641 3.375 0.875 3.59375 0.875 3.8125V5.125H11.375V3.8125C11.375 3.59375 11.1562 3.375 10.9375 3.375H1.3125ZM10.9375 13.875C11.1562 13.875 11.375 13.6836 11.375 13.4375V6H0.875V13.4375C0.875 13.6836 1.06641 13.875 1.3125 13.875H10.9375ZM4.04688 9.5H2.95312C2.76172 9.5 2.625 9.36328 2.625 9.17188V8.07812C2.625 7.91406 2.76172 7.75 2.95312 7.75H4.04688C4.21094 7.75 4.375 7.91406 4.375 8.07812V9.17188C4.375 9.36328 4.21094 9.5 4.04688 9.5ZM6.67188 9.5H5.57812C5.38672 9.5 5.25 9.36328 5.25 9.17188V8.07812C5.25 7.91406 5.38672 7.75 5.57812 7.75H6.67188C6.83594 7.75 7 7.91406 7 8.07812V9.17188C7 9.36328 6.83594 9.5 6.67188 9.5ZM9.29688 9.5H8.20312C8.01172 9.5 7.875 9.36328 7.875 9.17188V8.07812C7.875 7.91406 8.01172 7.75 8.20312 7.75H9.29688C9.46094 7.75 9.625 7.91406 9.625 8.07812V9.17188C9.625 9.36328 9.46094 9.5 9.29688 9.5ZM6.67188 12.125H5.57812C5.38672 12.125 5.25 11.9883 5.25 11.7969V10.7031C5.25 10.5391 5.38672 10.375 5.57812 10.375H6.67188C6.83594 10.375 7 10.5391 7 10.7031V11.7969C7 11.9883 6.83594 12.125 6.67188 12.125ZM4.04688 12.125H2.95312C2.76172 12.125 2.625 11.9883 2.625 11.7969V10.7031C2.625 10.5391 2.76172 10.375 2.95312 10.375H4.04688C4.21094 10.375 4.375 10.5391 4.375 10.7031V11.7969C4.375 11.9883 4.21094 12.125 4.04688 12.125ZM9.29688 12.125H8.20312C8.01172 12.125 7.875 11.9883 7.875 11.7969V10.7031C7.875 10.5391 8.01172 10.375 8.20312 10.375H9.29688C9.46094 10.375 9.625 10.5391 9.625 10.7031V11.7969C9.625 11.9883 9.46094 12.125 9.29688 12.125Z" fill="#CB360F"/>
                                    </svg>
                                    <?php echo pxl_print_html($date); ?>
                                </span>
                            <?php endif; ?>
                            <?php if(!empty($location)) : ?>
                                <span class="location">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
                                        <path d="M5.25 3.375C6.67188 3.375 7.875 4.57812 7.875 6C7.875 7.44922 6.67188 8.625 5.25 8.625C3.80078 8.625 2.625 7.44922 2.625 6C2.625 4.57812 3.80078 3.375 5.25 3.375ZM5.25 7.75C6.20703 7.75 7 6.98438 7 6C7 5.04297 6.20703 4.25 5.25 4.25C4.26562 4.25 3.5 5.04297 3.5 6C3.5 6.98438 4.26562 7.75 5.25 7.75ZM5.25 0.75C8.14844 0.75 10.5 3.10156 10.5 6C10.5 8.13281 9.76172 8.73438 5.76953 14.4766C5.52344 14.8594 4.94922 14.8594 4.70312 14.4766C0.710938 8.73438 0 8.13281 0 6C0 3.10156 2.32422 0.75 5.25 0.75ZM5.25 13.7109C9.05078 8.21484 9.625 7.77734 9.625 6C9.625 4.85156 9.16016 3.75781 8.33984 2.91016C7.49219 2.08984 6.39844 1.625 5.25 1.625C4.07422 1.625 2.98047 2.08984 2.13281 2.91016C1.3125 3.75781 0.875 4.85156 0.875 6C0.875 7.77734 1.42188 8.21484 5.25 13.7109Z" fill="#CB360F"/>
                                    </svg>
                                    <?php echo pxl_print_html($location); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($price)) : ?>
                        <div class="price">
                            <?php echo pxl_print_html($price); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($show_button == 'true') : ?>
                        <a class="btn  btn-default  btn-style-2 " href="<?php if(!empty($event_external_link)) { echo esc_url($event_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none"><path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"></path></svg>
                            <?php if (!empty($settings['button_text'])) {
                                echo pxl_print_html($settings['button_text']);
                            }else {
                                echo esc_html__('Apply','stotage');
                            } ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// End Service Grid
//-------------------------------------------------

// Start Product Grid
//--------------------------------------------------
function stotage_get_product_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '557x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="woocommerce-product-inner">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = stotage_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="woocommerce-product-header">
                            <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="woocommerce-product-content">
                        <div class="woocommerce-product-meta">
                            <h5 class="woocommerce-product-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h5>
                            <div class="woocommerce-product--price">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>
                        </div>
                        <div class="woocommerce-product--buttons">
                            <div class="woocommerce-add-to-cart pxl-mr-10">
                                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
                                        esc_url( $product->add_to_cart_url() ),
                                        esc_attr( $product->get_id() ),
                                        esc_attr( $product->get_sku() ),
                                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                                        esc_attr( $product->get_type() ),
                                        esc_html( $product->add_to_cart_text() )
                                    ),
                                    $product );
                                    ?>
                                </div>
                                <?php if (class_exists('WPCleverWoosw')) { ?>
                                    <div class="woocommerce-wishlist pxl-mr-10">
                                        <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (class_exists('WPCleverWoosc')) { ?>
                                    <div class="woocommerce-compare">
                                        <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}



add_action( 'wp_ajax_stotage_load_more_post_grid', 'stotage_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_stotage_load_more_post_grid', 'stotage_load_more_post_grid' );
function stotage_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'stotage'));
        }

        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;

        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }elseif( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'select_orderby'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', (int)$settings['paged']);
        }

        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source'      => $source,
            'orderby'     => isset($settings['orderby'])?$settings['orderby']:'date',
            'order'       => isset($settings['order']) ? ($settings['orderby'] == 'title' ? 'asc' : sanitize_text_field($settings['order']) ) : 'desc',
            'limit'       => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids'    => isset($settings['post_ids'])?$settings['post_ids']: [],
            'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
        ],
        $settings['tax']
    ));

        ob_start();
        if( isset($settings['wg_type']) && $settings['wg_type'] == 'post-list'){
            stotage_get_post_list($posts, $settings);
        }else{
            stotage_get_post_grid($posts, $settings);
        }
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination' ){ 
            ob_start();
            stotage()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }

        $result_count = '';
        if( isset($settings['show_toolbar']) && $settings['show_toolbar'] == 'show' ){ 
            ob_start();
            if( (int)$settings['paged'] == 0){
                $limit_start = 1;
                $limit_end = ( (int)$settings['limit'] >= $total ) ? $total : (int)$settings['limit'];
            }else{
                $limit_start = (((int)$settings['paged'] - 1 ) * (int)$settings['limit']) + 1;
                $limit_end = (int)$settings['paged'] * (int)$settings['limit'];
                $limit_end = ( $limit_end >= $total ) ? $total : $limit_end;
            }
            if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'loadmore' ){ 
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing','stotage'),
                    '1-'.$limit_end,
                    esc_html__('of','stotage'),
                    $total,
                    esc_html__('results','stotage')
                );
            }else{
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing','stotage'),
                    $limit_start.'-'.$limit_end,
                    esc_html__('of','stotage'),
                    $total,
                    esc_html__('results','stotage')
                );
            }

            $result_count = ob_get_clean();
        }

        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'stotage'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                    'result_count' => $result_count,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

function stotage_get_post_list($posts = [], $settings = []){ 
    if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
        return;
    }
    extract($settings);

    switch ($settings['layout']) {
        case 'post-list-1':
        stotage_get_post_list_layout1($posts, $settings);
        break;

        default:
        return false;
        break;
    }
}
function stotage_get_post_list_layout1($posts = [], $settings = []){
    extract($settings); 
    foreach ($posts as $key => $post):

        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)){
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id){
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            }else{  
                $thumbnail = get_the_post_thumbnail($post->ID, $img_size);
            }
        }else{
            $thumbnail = '';
        }

        $author = get_user_by('id', $post->post_author);
        $readmore_text = !empty($readmore_text) ? $readmore_text : esc_html__('Continue Reading', 'stotage');
        $date_format = get_option('date_format');

        $data_settings = '';
        $animate_cls = '';
        if ( !empty( $item_animation ) ) {
            $animate_cls = ' pxl-animate pxl-invisible animated-'.$item_animation_duration;
            $data_animation =  json_encode([
                'animation'      => $item_animation,
                'animation_delay' => (float)$item_animation_delay
            ]);
            $data_settings = 'data-settings="'.esc_attr($data_animation).'"';
        }

        
        $flag = false;
        $post_format = get_post_format($post->ID) == false ? 'format-standard' : 'format-'.get_post_format($post->ID);
        ?>
        <div class="<?php echo esc_attr('list-item w-100 '. $post_format); ?> <?php echo esc_attr($animate_cls) ?>" <?php pxl_print_html($data_settings); ?>>
            <div class="grid-item-inner item-inner-wrap row  <?php echo esc_attr($post_format) ?>">
                <?php
                if (has_post_format('quote', $post->ID)){
                    $quote_text = get_post_meta( $post->ID, 'featured-quote-text', true );
                    $quote_cite = get_post_meta( $post->ID, 'featured-quote-cite', true );
                    ?>
                    <div class="col-12">
                        <div class="quote-wrap">
                            <div class="quote-inner-wrap">

                                <div class="link-inner ">
                                    <div class="link-icon">
                                     <span>“</span>
                                 </div>
                                 <div class="content-right">
                                    <div class="item-post-metas ">
                                        <div class="meta-inner  align-items-center">
                                            <?php if($show_date == 'true') : ?>
                                                <span class="post-date">
                                                    <?php echo get_the_date('d M', $post->ID); ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if( $show_category == 'true' ) : ?>
                                                <span class="meta-item post-category  d-flex">
                                                    <?php the_terms( $post->ID, 'category', '', ', ', '' ); ?>
                                                </span>   
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <a class="quote-text" href="<?php echo esc_url( get_permalink($post->ID)); ?>"><?php echo esc_html($quote_text);?></a>
                                </div>
                            </div>
                            <div class="quote-footer ">
                                <div class="quote-cite "><?php echo esc_html($quote_cite);?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } elseif (has_post_format('link', $post->ID)){
                $link_url = get_post_meta( $post->ID , 'featured-link-url', true );
                $link_text = get_post_meta( $post->ID , 'featured-link-text', true );
                ?>
                <div class="col-12">
                    <div class="link-wrap">
                        <div class="link-inner-wrap">
                            <div class="link-inner ">
                                <div class="link-icon">
                                    <a href="<?php echo esc_url( $link_url); ?>">
                                        <svg version="1.1" id="Glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path d="M192.5,240.5c20.7-21,56-23,79,0h0.2c6.4,6.4,11,14.2,13.8,22.6c6.7-1.1,12.6-4,17.1-8.5l22.1-21.9
                                        c-5-9.6-11.4-18.4-19-26.2c-42-41.1-106.9-40-147.2,0l-80,80c-40.6,40.9-40.6,106.3,0,147.2c40.9,40.6,106.3,40.6,147.2,0l75.4-75.4
                                        c-22,3.6-43.1,1.6-62.7-5.3l-46.7,46.6c-21.1,21.3-57.9,21.3-79.2,0c-21.8-21.8-21.8-57.3,0-79C113.9,318.9,197.8,235.1,192.5,240.5
                                        L192.5,240.5z"/>
                                        <path d="M319.5,271.5c-21,21.3-56.3,22.7-79,0c-0.2,0-0.2,0-0.2,0c-6.4-6.4-11-14.2-13.8-22.6c-6.7,1.1-12.6,4-17.1,8.5l-22.1,21.9
                                        c5,9.6,11.4,18.4,19,26.2c42,41.1,106.9,40,147.2,0l80-80c40.6-40.9,40.6-106.3,0-147.2c-40.9-40.6-106.3-40.6-147.2,0L211,153.8
                                        c22-3.6,43.1-1.6,62.7,5.3l46.7-46.6c21.1-21.3,57.9-21.3,79.2,0c21.8,21.8,21.8,57.3,0,79C398.1,193.1,314.2,276.9,319.5,271.5
                                        L319.5,271.5z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="content-right">
                                <div class="item-post-metas ">
                                    <div class="meta-inner  align-items-center">
                                        <?php if($show_date == 'true') : ?>
                                            <span class="post-date">
                                                <?php echo get_the_date('d M', $post->ID); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if( $show_category == 'true' ) : ?>
                                            <span class="meta-item post-category  d-flex">
                                                <?php the_terms( $post->ID, 'category', '', ', ', '' ); ?>
                                            </span>   
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <h3 class="link-title"><a href="<?php echo esc_url( $link_url); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title($post->ID); ?></a></h3>
                            </div>
                        </div>
                        <div class="link-footer">
                            <a class="link-text" target="_blank" href="<?php echo esc_url( $link_url); ?>"><?php echo esc_html($link_text);?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php  
        }else{
            if ( !empty( $thumbnail )){
                $flag = true;
                $featured_video = get_post_meta( $post->ID, 'featured-video-url', true );
                $audio_url = get_post_meta( $post->ID, 'featured-audio-url', true ); 
                ?>
                <div class="item-featured col-lg-5">
                    <div class="post-image <?php echo esc_attr('scale-hover') ?>">
                        <?php echo wp_kses_post($thumbnail); ?>       
                        <?php if (has_post_format('audio', $post->ID)) {  
                            $audio = get_post_meta( $post->ID, 'featured-audio-url', true );
                            ?>  
                            <a class="btn-volumn" href="<?php echo esc_url($audio); ?>" target="_blank"><i class="fas fa-volume"></i></a>
                        <?php } ?>

                        <?php if (has_post_format('video', $post->ID)) {  
                            $video = get_post_meta( $post->ID, 'featured-video-url', true );
                            ?>  
                            <a class="video-play-button pxl-action-popup" href="<?php echo esc_url($video); ?>">
                                <i class="caseicon-play1"></i>
                            </a>

                        <?php } ?>
                        <?php
                        if($show_date == 'true') : ?>
                            <div class="post-date">
                                <span class="day"><?php echo get_the_date('d', $post->ID); ?></span>
                                <span class="month"><?php echo get_the_date('M', $post->ID); ?></span>
                            </div>
                        <?php endif; ?>
                    </div> 
                </div>
                <?php
            }else{
                if (has_post_format('video', $post->ID)){
                    $flag = true;
                    global $wp_embed;
                    $featured_video = get_post_meta( $post->ID, 'featured-video-url', true );
                    if (!empty($featured_video)) {
                        echo '<div class="item-featured col-lg-5">';
                        echo '<div class="feature-video">';
                        echo do_shortcode($wp_embed->autoembed($featured_video));
                        echo '</div>';
                        echo '</div>';
                    }
                }elseif(has_post_format('audio', $post->ID)){

                    $flag = true;
                    global $wp_embed;
                    $audio_url = get_post_meta( $post->ID, 'featured-audio-url', true );
                    if (!empty($audio_url)) {
                        echo '<div class="item-featured col-lg-5">';
                        echo '<div class="feature-audio">';
                        echo do_shortcode($wp_embed->autoembed($audio_url));
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
            <?php $col_cls = ($flag = true) ? 'col-lg-7' : 'col'; ?>
            <div class="wrap-item-content <?php echo esc_attr($col_cls) ?>">
                <div class="item-content">
                    <?php
                    if ($show_author == 'true' || $show_category == 'true' || $show_comment == 'true' ){
                        ?>
                        <div class="item-post-metas">
                            <div class="meta-inner d-flex-wrap align-items-center">
                                <?php if( $show_author == 'true' ) : ?>
                                    <span class="meta-item post-author d-flex">
                                        <span class="icon-post"><i class="bi bi-person-fill"></i></span>
                                        <span>
                                            <?php esc_html_e('By','stotage')?> <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                        </span>
                                    </span>
                                <?php endif; ?>
                                <?php if( $show_category == 'true' ) : ?>
                                    <span class="meta-item post-category  d-flex">
                                        <span class="icon-post"><i class="bi bi-tag-fill"></i></span>
                                        <span><?php the_terms( $post->ID, 'category', '', ', ', '' ); ?></span>
                                    </span>   
                                </span>
                            <?php endif; ?>
                            <?php if($show_comment == 'true') : ?>
                                <span class="post-comments">
                                    <a class="meta-item post-comment-count" href="<?php echo get_comments_link($post->ID); ?>#comments">
                                        <span class="icon-post"><i class="bi bi-chat-dots-fill"></i></span>
                                        <?php
                                        echo comments_number(
                                            '<span class="cmt-count">0</span> '.esc_html__('Comments', 'stotage'),
                                            '<span class="cmt-count">1</span> '.esc_html__('Comment', 'stotage'),
                                            '<span class="cmt-count">%</span> '.esc_html__('Comments', 'stotage'),
                                            $post->ID
                                        ); 
                                    ?></a>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <h3 class="item-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h3>
                <?php if($show_excerpt == 'true'): ?>
                    <div class="item-excerpt">
                        <?php
                        if(!empty($post->post_excerpt)){
                            echo wp_trim_words( $post->post_excerpt, $num_words, null );
                        } else{
                            $content = strip_shortcodes( $post->post_content );
                            $content = apply_filters( 'the_content', $content );
                            $content = str_replace(']]>', ']]&gt;', $content);
                            echo wp_trim_words( $content, $num_words, null );
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <?php 
                if($show_readmore == 'true' || $post_share == 'true') : ?>
                    <div class="blog-post-footer  align-items-center justify-content-between">
                        <?php if( $show_readmore == 'true'): ?>
                            <div class="post-readmore ">
                                <a class="btn btn-glossy" href="<?php echo esc_url( get_permalink($post->ID)); ?>">
                                    <span class="pxl-button-text"><?php echo stotage_html($readmore_text); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="transform: scalex(-1); height:auto; fill:#fff;" id="Layer_2" height="16" viewBox="0 0 24 24" width="16" data-name="Layer 2"><path d="m22 11h-17.586l5.293-5.293a1 1 0 1 0 -1.414-1.414l-7 7a1 1 0 0 0 0 1.414l7 7a1 1 0 0 0 1.414-1.414l-5.293-5.293h17.586a1 1 0 0 0 0-2z"></path></svg>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php 
                        if(($settings['post_share'] == 'true') ):
                            ?>
                            <div class="post-shares">
                                <span class="label">
                                    <i class="fas fa-share-alt"></i>
                                    <?php echo esc_html__('Share','stotage') ?>
                                </span>
                                <div class="social-share">
                                    <div class="social ">
                                        <a class="pxl-icon icon-facebook fab fa-facebook" title="<?php echo esc_attr__('Facebook', 'stotage'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>"></a>
                                        <a class="pxl-icon icon-twitter fab fa-twitter" title="<?php echo esc_attr__('Twitter', 'stotage'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_permalink($post->ID)); ?>&text=<?php echo get_the_title($post->ID);?>%20"></a>
                                        <a class="pxl-icon icon-linkedin fab fa-linkedin-in" title="<?php echo esc_attr__('Linkedin', 'stotage'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_permalink($post->ID));?>"></a>
                                        <a href="javascript:void(0);" class="skype-share pxl-icon fab fa-skype" data-href="<?php echo urlencode(get_permalink($post->ID)); ?>" data-lang="en-US" data-text="<?php echo get_the_title($post->ID); ?>"></a> 
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>
<?php
endforeach; 
}