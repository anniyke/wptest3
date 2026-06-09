<?php 
$template = (int)$widget->get_setting('content_template','0');
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'stotage_hook_anchor_hidden_panel' );
	} 
}
?>
<div class="pxl-anchor-wrap">
	<div class="pxl-anchor-button pxl-cursor--cta <?php echo esc_attr($settings['pxl_animate']); ?> <?php if($template == '1') { echo 'pxl-anchor-mobile-menu'; } ?>" data-target=".pxl-hidden-template-<?php echo esc_attr($template); ?>" data-delay-hover="<?php echo esc_attr($settings['pxl_close_animate_delay']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<?php if($settings['icon_type'] == 'default') { ?>
		<div class="pxl-anchor-divider">
			<span class="pxl-icon-dot pxl-icon-dot1"></span>
			<span class="pxl-icon-dot pxl-icon-dot2"></span>
			<span class="pxl-icon-dot pxl-icon-dot3"></span>
			<span class="pxl-icon-dot pxl-icon-dot4"></span>
			<span class="pxl-icon-dot pxl-icon-dot5"></span>
			<span class="pxl-icon-dot pxl-icon-dot6"></span>
			<span class="pxl-icon-dot pxl-icon-dot7"></span>
			<span class="pxl-icon-dot pxl-icon-dot8"></span>
			<span class="pxl-icon-dot pxl-icon-dot9"></span>
		</div>
	<?php } elseif(!empty($settings['pxl_icon']['value'])) { ?>
		<span class="text-tooltip">
			<?php echo esc_html($settings['pxl_icon_text']); ?>
		</span>
		<?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
	<?php } ?>
</div>
<?php if(!empty($settings['link_doc'])) { ?>
	<a href="<?php echo esc_url($settings['link_doc']); ?>" class="button-doc" target="_blank">
		<span class="text-tooltip">
			<?php echo esc_html($settings['pxl_text_doc']); ?>
		</span>
		<?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon2'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
	</a>
<?php } ?>
</div>