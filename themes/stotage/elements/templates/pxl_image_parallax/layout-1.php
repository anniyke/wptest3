<?php 
$widget->add_render_attribute( 'pxl_img_wrap', 'id', pxl_get_element_id($settings));
$widget->add_render_attribute( 'pxl_img_wrap', 'class', 'pxl-image-wg '.$settings['pxl_animate']);
if ($settings['source_type'] == 'f_img' && has_post_thumbnail()) {
    $widget->add_render_attribute('pxl_img_wrap', 'class', 'pxl-image-featured');
}

if(!empty($settings['custom_style']))
    $widget->add_render_attribute( 'pxl_img_wrap', 'class', $settings['custom_style']);

if(!empty($settings['pxl_parallax'])){
    $parallax_settings = json_encode([
        $settings['pxl_parallax'] => $settings['parallax_value'],
        $settings['pxl_parallax_two'] => $settings['parallax_value_two']
    ]);
    $widget->add_render_attribute( 'pxl_img_wrap', 'data-parallax', $parallax_settings );
}
if(!empty($settings['pxl_bg_parallax'])){
    $widget->add_render_attribute( 'pxl_img_wrap', 'class', 'pxl-bg-parallax pxl-pll-'.$settings['pxl_bg_parallax']); 
}
$link = stotage_get_img_link_url( $settings );

if ( $link ) {
    $widget->add_link_attributes( 'link', $link );

    if ( \elementor\plugin::instance()->editor->is_edit_mode() ) {
        $widget->add_render_attribute( 'link', [
            'class' => 'elementor-clickable',
        ] );
    }
    if ( 'file' === $settings['link_to'] ) {
        $widget->add_lightbox_data_attributes( 'link', $settings['image']['id'], $settings['open_lightbox'] );
    }
}   

?>
<div class="pxl-image-prl pxl-image--inner <?php if ($settings['overflow_check'] == 'true') {
    echo 'overflow-hidden';
} ?> <?php if ($settings['source_type'] == 'f_img' && has_post_thumbnail()) {
    echo 'f-featured';
} ?>">
<div <?php pxl_print_html($widget->get_render_attribute_string( 'pxl_img_wrap' )); ?> data-maxtilt="<?php echo esc_attr($settings['max_tilt']); ?>" data-speedtilt="<?php echo esc_attr($settings['speed_tilt']); ?>" data-perspectivetilt="<?php echo esc_attr($settings['perspective_tilt']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if($settings['source_type'] == 'f_img' && has_post_thumbnail()) : 
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
        $img_id = get_post_thumbnail_id(get_the_id());
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $img_id,
            'thumb_size' => $image_size,
            'class' => 'no-lazyload'
        ) );
        $thumbnail    = $img['thumbnail'];
        $thumbnail_url    = $img['url']; ?>
        <div class="pxl-item--image">
            <?php if ( ! empty( $img_id ) ) { echo wp_kses_post($thumbnail); } ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($settings['image']['id'])) : ?>
        <?php if ( $link ) : ?>
            <a <?php $widget->print_render_attribute_string( 'link' ); ?>>
            <?php endif; ?>
            <?php 
            if(!empty($settings['pxl_bg_parallax'])): 
                $image_src = \elementor\group_control_image_size::get_attachment_image_src( $settings['image']['id'], 'image', $settings );
                ?>
                <div class="parallax-inner" style="background-image: url(<?php echo esc_url($image_src) ?>)"></div>
            <?php else: ?>
                <?php \elementor\group_control_image_size::print_attachment_image_html( $settings ); ?>
            <?php endif; ?>
            <?php if ( $link ) : ?>
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>    
</div>
