<div class="pxl-rate">
	<div class="rate">
		<?php foreach ($settings['rate_time'] as $key => $value):
			$rate = isset($value['rate']) ? $value['rate'] : '';
			?>
			<div class="value"><?php echo pxl_print_html($rate); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="time">
		<div class="time-first"><?php echo pxl_print_html($settings['time_default']); ?><svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25391 4.69141L1.08203 1.49219C0.945312 1.35547 0.945312 1.13672 1.08203 1.02734L1.27344 0.808594C1.41016 0.699219 1.60156 0.699219 1.73828 0.808594L4.5 3.625L7.23438 0.835938C7.37109 0.699219 7.5625 0.699219 7.69922 0.835938L7.89062 1.02734C8.02734 1.13672 8.02734 1.35547 7.89062 1.49219L4.71875 4.69141C4.58203 4.82812 4.39062 4.82812 4.25391 4.69141Z" fill="#010101"/>
</svg>
</div>
		<div class="list-time">
			<?php foreach ($settings['rate_time'] as $key => $value):
				$time = isset($value['time']) ? $value['time'] : '';
				?>
				<div class="time"><?php echo pxl_print_html($time); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
</div>