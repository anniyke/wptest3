<div class="pxl-section-scale">
	<div class="wrap-scroll-section">
		<?php if(!empty($settings['bg_img']['id'])) : 
			$img  = pxl_get_image_by_size( array(
				'attach_id'  => $settings['bg_img']['id'],
				'thumb_size' => 'full',
			) );
			$thumbnail    = $img['thumbnail']; ?>
			<?php echo wp_kses_post($thumbnail); ?>
		<?php endif; ?>
		<video  autoplay muted loop playsinline>
			<source src="<?php echo esc_url($settings['bg_video']); ?>" type="video/mp4">
			</video>
		</div>
	</div> 