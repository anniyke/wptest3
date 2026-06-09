<?php 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
?>
<div class="pxl-project-info1">
    <?php if(!empty($settings['title'])) : ?>
        <h5 class="pxl-item--title">
            <?php echo esc_attr($settings['title']); ?>
        </h5>
    <?php endif; ?>
    <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
        <?php foreach ($settings['items'] as $key => $value):
            $label = isset($value['label']) ? $value['label'] : '';
            $content = isset($value['content']) ? $value['content'] : ''; 
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] ); ?>
            <div class="pxl--item">
                <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                    <div class="pxl-item--icon pxl-mr-10">
                        <?php if ( $is_new ):
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                        elseif(!empty($value['pxl_icon'])): ?>
                            <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--meta">
                    <?php if(!empty($label)) : ?>
                        <label><?php echo pxl_print_html($label); ?></label>
                    <?php endif; ?>
                    <?php if(!empty($content)) : ?>
                        <span><?php echo pxl_print_html($content); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if($settings['btn_text']) : ?>
        <div class="pxl-item--button">
            <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="button"><?php echo pxl_print_html($settings['btn_text']); ?></a>
        </div>
    <?php endif; ?>
</div>