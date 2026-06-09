<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl, 
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel1 " <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner ">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $coun_p = 1;
                    $image_size = !empty($img_size) ? $img_size : '370x418';
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
                            <div class="pxl-post--inner ">
                                <span class="count_post">
                                    <?php 
                                    if ($coun_p < 10) {
                                        echo pxl_print_html('0'.$coun_p++); 
                                    } else {
                                        echo pxl_print_html($coun_p++); 
                                    }
                                    ?>
                                </span>
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
                                <h3 class="pxl-post--title">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                </h3>
                                <?php if($show_excerpt == 'true'): ?>
                                    <div class="pxl-post--content">
                                        <?php
                                        echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <a class="btn-readmore-post" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                        <span><?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Learn More', 'stotage');
                                        } ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>    
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>
            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                        <i class="flaticon flaticon-next"></i>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                        <i class="flaticon flaticon-next" style="transform:scaleX(-1);"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>