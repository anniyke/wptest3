<div class="pxl-check-box">
	
	<div class="image">
		<?php foreach ($settings['c_list'] as $key => $value):
			$image = isset($value['image']) ? $value['image'] : '';
			?>
			<?php if(!empty($image['id'])) { 
				$img = pxl_get_image_by_size( array(
					'attach_id'  => $image['id'],
					'thumb_size' => 'full',
					'class' => 'no-lazyload',
				));
				$thumbnail = $img['thumbnail'];
				echo pxl_print_html($thumbnail);
				?>
			<?php } ?>
		<?php endforeach; ?>
	</div>
	<div class="content">
		<?php if (!empty($settings['title_box'])) { ?>
			<h5 class="pxl-title-box"><?php echo pxl_print_html($settings['title_box']); ?></h5>
		<?php } ?>
		<div class="check-list">
			<?php foreach ($settings['c_list'] as $key => $value):
				$title = isset($value['title']) ? $value['title'] : '';
				?>
				<div class="check">
					<span class="icon-check">
						<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.293 0.265625C11.4297 0.15625 11.6211 0.15625 11.7578 0.265625L12.0586 0.59375C12.1953 0.703125 12.1953 0.921875 12.0586 1.05859L3.85547 9.26172C3.74609 9.37109 3.52734 9.37109 3.41797 9.26172L0.164062 6.00781C0.0273438 5.87109 0.0273438 5.65234 0.164062 5.54297L0.464844 5.21484C0.601562 5.10547 0.792969 5.10547 0.929688 5.21484L3.63672 7.92188L11.293 0.265625Z" fill="#CB360F"/>
						</svg>
					</span>
					<input type="checkbox">	
					<label ><?php echo pxl_print_html($title); ?></label>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>