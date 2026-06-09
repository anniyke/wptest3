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
$html_id = pxl_get_element_id($settings);
$tab_bd_ids = [];

if (isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])) :
    ?>
<div class="pxl-swiper-slider pxl-tab-carousel pxl-tab-carousel1 ">
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
            <div class="pxl-swiper-wrapper" >
            <?php foreach ($settings['tabs'] as $key => $content) : ?>
                <div class="pxl-swiper-slide ">
                    <div class="pxl-item--inner ">
                        <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content ">
                            <?php if(!empty($content['content_template'])) {
                                $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                                $tab_bd_ids[] = (int)$content['content_template'];
                                pxl_print_html($tab_content);
                            } ?>
                        </div>
                    </div>
                    </div><?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>
