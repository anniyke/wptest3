<?php if ( ! empty( $settings['item_link']['url'] ) ) {
	$widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

	if ( $settings['item_link']['is_external'] ) {
		$widget->add_render_attribute( 'item_link', 'target', '_blank' );
	}

	if ( $settings['item_link']['nofollow'] ) {
		$widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
	} 
} 
?>
<?php if ( ! empty( $settings['phone_link']['url'] ) ) {
	$widget->add_render_attribute( 'phone_link', 'href', $settings['phone_link']['url'] );

	if ( $settings['phone_link']['is_external'] ) {
		$widget->add_render_attribute( 'phone_link', 'target', '_blank' );
	}

	if ( $settings['phone_link']['nofollow'] ) {
		$widget->add_render_attribute( 'phone_link', 'rel', 'nofollow' );
	} 
} 
if(!empty($settings['p_image']['id'])) { 
	$img  = pxl_get_image_by_size( array(
		'attach_id'  => $settings['p_image']['id'],
		'thumb_size' => 'full',
	) );
	$thumbnail    = $img['thumbnail'];
	$thumbnail_url    = $img['url'];
}
?>
<div class="pxl-banner pxl-banner1 <?php echo esc_attr($settings['style']); ?>">
	<div class="pxl-banner-inner">
		<div class="top-content">
			<div class="icon-health">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="14px" height="14px" viewBox="0 0 349.03 349.031" style="enable-background:new 0 0 349.03 349.031;" xml:space="preserve">
					<g>
						<path d="M349.03,141.226v66.579c0,5.012-4.061,9.079-9.079,9.079H216.884v123.067c0,5.019-4.067,9.079-9.079,9.079h-66.579   c-5.009,0-9.079-4.061-9.079-9.079V216.884H9.079c-5.016,0-9.079-4.067-9.079-9.079v-66.579c0-5.013,4.063-9.079,9.079-9.079   h123.068V9.079c0-5.018,4.069-9.079,9.079-9.079h66.579c5.012,0,9.079,4.061,9.079,9.079v123.068h123.067   C344.97,132.147,349.03,136.213,349.03,141.226z"/>
					</g>
				</svg>
			</div>
			<?php if ($settings['style']!='style-2'): ?>
				<div class="title-banner">
					<h5> <?php echo pxl_print_html($settings['title_banner']); ?> <i class="caseicon-angle-arrow-down"></i> </h5>
				</div>
			<?php endif ?>
		</div>
		<div class="hover-content">
			<div class="wrap--phone" style="background-image: url(<?php if(!empty($settings['p_image']['id'])){echo esc_url($thumbnail_url);}else { echo esc_url(get_template_directory_uri().'/assets/img/bg-call.png'); }?>);">
				<h6 class="subtitle-phone">
					<?php echo pxl_print_html($settings['sub_title_number']); ?>
				</h6>
				<a <?php pxl_print_html($widget->get_render_attribute_string( 'phone_link' )); ?> class="phone-number">
					<?php echo pxl_print_html($settings['phone_number']); ?>
				</a>
			</div>
			<div class="desc">
				<?php echo pxl_print_html($settings['description']); ?>
			</div>
			<a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?> class="btn btn-glossy"> <?php echo pxl_print_html($settings['button_text']); ?> </a>
		</div>
	</div>
</div>