<?php  if ( ! empty( $settings['item_link']['url'] ) ) {
    $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

    if ( $settings['item_link']['is_external'] ) {
        $widget->add_render_attribute( 'item_link', 'target', '_blank' );
    }

    if ( $settings['item_link']['nofollow'] ) {
        $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-text-slip pxl-text-slip1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<?php  if ( ! empty( $settings['item_link']['url'] ) ) { ?>
        <a class="link-box"  <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
        </a>
    <?php } ?>
	<div class="pxl-item--container">
		<div class="pxl-item--inner  <?php echo esc_attr($settings['text_effect']); ?>" <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>>
			<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
			<?php foreach ($settings['items'] as $key => $value):
				$text = isset($value['text']) ? $value['text'] : '';
				$icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
				$widget->add_render_attribute( $icon_key, [
					'class' => $value['pxl_icon'],
					'aria-hidden' => 'true',
				] );
				$is_new = \Elementor\Icons_Manager::is_migration_allowed();
				?>
				<<?php echo esc_attr($settings['text_tag']); ?> class="pxl-item--text elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>">		
				<?php if ( $is_new ):
					\Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
				elseif(!empty($value['pxl_icon'])): ?>
					<i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>			
				<span class="pxl-text-backdrop"><?php echo pxl_print_html($text); ?></span>
				</<?php echo esc_attr($settings['text_tag']); ?>>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
</div>
