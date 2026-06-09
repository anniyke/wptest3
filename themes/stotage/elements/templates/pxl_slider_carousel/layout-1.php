<?php
$html_id = pxl_get_element_id($settings);
extract($settings);

$ids = esc_attr('grad-'.$html_id);
$ids1 = esc_attr('grad1-'.$html_id);

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
$allow_touchmove = $widget->get_setting('allow_touchmove','false');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'fade',
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
    'speed'                         => (int)$speed,
    'allow_touch_move'              => false
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['slider1']) && !empty($settings['slider1']) && count($settings['slider1'])): ?>
    <div class="pxl-swiper-slider pxl-slider-carousel pxl-slider-carousel1 pxl-drag-area pxl-parent-transition pxl-parent-cursor pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'stotage' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider1'] as $key => $value):
                        $image_light = isset($value['image1']) ? $value['image1'] : '';
                        $title = isset($value['title1']) ? $value['title1'] : '';
                        $sub_text = isset($value['sub_text1']) ? $value['sub_text1'] : '';
                        $desc = isset($value['desc1']) ? $value['desc1'] : '';
                        $btn_text = isset($value['btn_text1']) ? $value['btn_text1'] : '';
                        $link = isset($value['btn_link1']) ? $value['btn_link1'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'title1', 'value', $key );
                        if ( ! empty( $link['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                            if ( $link['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $link['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>"  data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="content--wrapper">
                                    <?php if(!empty($sub_text)) : ?>
                                        <div class="pxl-item--subtitle wow fadeInRight" data-duration="200ms" data-wow-delay="500ms"><?php echo pxl_print_html($sub_text); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($title)) : ?>
                                        <h2 class="pxl-item--title el-empty wow fadeInUp" data-duration="200ms" data-wow-delay="800ms"><?php echo pxl_print_html($title); ?></h2>
                                        <span class="line wow skewIn " data-duration="300ms" data-wow-delay="1200ms"></span>
                                    <?php endif; ?>
                                    <?php if(!empty($desc)) : ?>
                                        <p class="pxl-item--desc el-empty wow fadeInRight"  data-duration="200ms" data-wow-delay="1100ms"><?php echo pxl_print_html($desc); ?></p>
                                    <?php endif; ?>
                                    <div class="pxl-item--link  wow fadeInUp"  data-duration="200ms" data-wow-delay="1500ms">
                                        <?php if ( !empty( $link['url'] ) ) { ?>
                                            <a class="item--button btn  btn-glossy" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                <span class="btn-text">
                                                    <?php if(!empty($btn_text)) {
                                                        echo pxl_print_html($btn_text);
                                                    } else {
                                                        echo esc_html__('VIEW DETAILS', 'stotage');
                                                    } ?>
                                                </span> 
                                                <i class="flaticon flaticon-next"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php if(!empty($image_light['id'])) : ?>
                                    <div class="mask--content wow skewInRight"  data-duration="200ms" data-wow-delay="300ms" style="background-image: url(<?php echo esc_url($image_light['url']); ?>);">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap style-5 ">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon flaticon-next rtl-icon" style="transform:scaleX(-1);"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon flaticon-next rtl-icon"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
