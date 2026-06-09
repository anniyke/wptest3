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
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['text4']) && !empty($settings['text4']) && count($settings['text4'])): ?>
    <div class="pxl-swiper-slider pxl-text-carousel pxl-text-carousel4 <?php echo esc_attr($settings['style']); ?>" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['text4'] as $key => $value):
                        $title4 = isset($value['title4']) ? $value['title4'] : '';
                        $sub_title4 = isset($value['sub_title4']) ? $value['sub_title4'] : '';
                        $number_4 = isset($value['number_4']) ? $value['number_4'] : '';
                        $desc4 = isset($value['desc4']) ? $value['desc4'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $image_hv = isset($value['image_hv']) ? $value['image_hv'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if (!empty($image['id'])): ?>
                                    <div class="pxl-item-image">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '600x600',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];
                                            ?>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        <?php } ?>
                                        <?php if(!empty($image_hv['id'])) { 
                                            $img2 = pxl_get_image_by_size( array(
                                                'attach_id'  => $image_hv['id'],
                                                'thumb_size' => '600x600',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail_hv = $img2['thumbnail'];
                                            ?>
                                            <?php echo wp_kses_post($thumbnail_hv); ?>
                                        <?php } ?>
                                    </div>
                                <?php endif ?>
                                <span class="pxl-item--number el-empty"><?php echo pxl_print_html($number_4); ?></span>
                                <span class="pxl-diviver"></span>
                                <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title4); ?></h3>
                                <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc4); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-wrap-arrow pxl-flex-middle">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon flaticon-right-arrow11 rtl-icon" style="transform:scalex(-1);"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon flaticon-right-arrow11 rtl-icon"></i></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
