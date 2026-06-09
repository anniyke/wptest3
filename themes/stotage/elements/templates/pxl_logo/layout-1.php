<?php
$logo_m = stotage()->get_opt( 'logo_m');

if ( ! empty( $settings['logo_link']['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

    if ( $settings['logo_link']['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }

    if ( $settings['logo_link']['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-logo <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>><?php } ?>
    <?php if(!empty($settings['logo']['id'])) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['logo']['id'],
            'thumb_size' => 'full',
        ) );
        $thumbnail    = $img['thumbnail'];
        echo wp_kses_post($thumbnail);
    } ?>
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?></a><?php } ?>

    <?php if (! empty( $settings['logo_link']['url'] ) && empty($settings['logo']['id']) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>><?php } ?>
    <?php
    if (empty($settings['logo']['id']) ) {
        printf(
            '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_m['url'] )
        );
    }
    ?>
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?></a><?php } ?>
</div>
