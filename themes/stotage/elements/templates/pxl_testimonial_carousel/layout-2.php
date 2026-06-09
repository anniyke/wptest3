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
    'slide_direction'               => 'horizontal',
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
$opts_thumb = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'fade', 
    'slides_to_show'                => 1,
    'slides_to_show_xxl'            => 1, 
    'slides_to_show_lg'             => 1, 
    'slides_to_show_md'             => 1, 
    'slides_to_show_sm'             => 1, 
    'slides_to_show_xs'             => 1, 
    'slides_to_scroll'              => 1,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];

$widget->add_render_attribute( 'thumb', [
    'class'         => 'pxl-swiper-thumbs',
    'data-settings' => wp_json_encode($opts_thumb)
]);
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel2 " <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <div class="pxl-item--inner">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '180x180',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--avatar ">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--holder">
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
                                    <p class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></p>
                                    <p class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></p>
                                    <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'thumb' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value_top):
                        $image_logo = isset($value_top['image_logo']) ? $value_top['image_logo'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <?php if(!empty($image_logo['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image_logo['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <?php echo wp_kses_post($thumbnail); ?>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>
        <?php if($arrows !== false): ?>
            <div class="pxl-wrap-arrow pxl-flex-middle">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" >
                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.28125 1.125C5.15625 0.96875 4.90625 0.96875 4.75 1.125L1.125 4.75C0.96875 4.90625 0.96875 5.125 1.125 5.28125L4.75 8.90625C4.90625 9.0625 5.15625 9.0625 5.28125 8.90625L5.53125 8.6875C5.65625 8.53125 5.65625 8.3125 5.53125 8.15625L2.90625 5.53125H14.625C14.8438 5.53125 15 5.375 15 5.15625V4.84375C15 4.65625 14.8438 4.46875 14.625 4.46875H2.90625L5.53125 1.875C5.65625 1.71875 5.65625 1.5 5.53125 1.34375L5.28125 1.125Z" fill="white"/>
                    </svg>

                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"/>
                    </svg>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
