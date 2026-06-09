<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'vertical',
    'center_slide'                  => true,
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel1" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $image_logo = isset($value['image_logo']) ? $value['image_logo'] : '';
                        ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <div class="pxl-post--inner">
                                <div class="top">
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                                        </svg>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                                        </svg>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                                        </svg>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                                        </svg>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <p class="pxl-item--description"><?php echo pxl_print_html($desc); ?></p>
                                </div>
                                <div class="bottom">
                                    <div class="pxl-item--holder">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '90x90',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];?>
                                            <div class="pxl-item--avatar ">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if(!empty($image_logo['id'])) { 
                                            $img2 = pxl_get_image_by_size( array(
                                                'attach_id'  => $image_logo['id'],
                                                'thumb_size' => '90x90',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail_logo = $img2['thumbnail'];?>
                                            <div class="pxl-item--logo">
                                                <?php echo wp_kses_post($thumbnail_logo); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <span class="pxl-item--position"><?php echo pxl_print_html($position); ?></span>
                                    <h3 class="pxl-item--title">    
                                        <?php echo pxl_print_html($title); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom ">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-wrap-arrow pxl-flex-middle">
                        <div class="pxl-swiper-arrow style-3  pxl-swiper-arrow-prev"  style="transform:scalex(-1);">
                            <i class="flaticon flaticon-next"></i>
                        </div>
                        <div class="pxl-swiper-arrow style-3 pxl-swiper-arrow-next">
                            <i class="flaticon flaticon-next"></i>
                        </div>
                    </div> 
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>
