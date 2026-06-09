<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['logo_link']['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

    if ( $settings['logo_link']['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }
    if ( $settings['logo_link']['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
}
if(!empty($settings['logo']['id'])){
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['logo']['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail    = $img['thumbnail'];
}
?>
<div class="pxl-circle <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-circle-inner">
        <span class="pxl--circle-picture">
            <?php echo wp_kses_post($thumbnail); ?>
        </span>
        <?php if(!empty($settings['banner_title'])) : ?>
        <div class="pxl-item--title pxl--circle-type is-rotate">

            <svg viewBox="0 0 144.48 144.48" width="200" height="200">
                <path id="ct-banner-curve-<?php echo esc_attr($html_id) ?>" d="M242.93,123A71.74,71.74,0,1,1,171.2,51.22,71.73,71.73,0,0,1,242.93,123Z" transform="translate(-98.96 -50.72)"></path>
                <text>
                    <textPath href="#ct-banner-curve-<?php echo esc_attr($html_id) ?>">
                        <?php echo esc_attr($settings['banner_title']); ?>
                    </textPath>
                </text>
            </svg>
        </div>
    <?php endif; ?>
</div>
</div>