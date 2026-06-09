<?php
$featured_video = get_post_meta( get_the_ID(), 'featured-video-url', true );
$link_url = get_post_meta( get_the_ID(), 'featured-link-url', true );
$audio_url = get_post_meta( get_the_ID(), 'featured-audio-url', true );
?>
<div class="pxl-icon-postformat">
	<?php if (has_post_format('quote')){ ?>
		<div class="format-wrap">
			<div class="link-icon">
				<a><span>“</span></a>
			</div>
		</div>
		<?php
	}elseif (has_post_format('link')){ ?>
		<div class="format-wrap">
			<div class="link-icon">
				<a href="<?php echo esc_url( $link_url); ?>">
					<svg version="1.1" id="Glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
					<path d="M192.5,240.5c20.7-21,56-23,79,0h0.2c6.4,6.4,11,14.2,13.8,22.6c6.7-1.1,12.6-4,17.1-8.5l22.1-21.9
					c-5-9.6-11.4-18.4-19-26.2c-42-41.1-106.9-40-147.2,0l-80,80c-40.6,40.9-40.6,106.3,0,147.2c40.9,40.6,106.3,40.6,147.2,0l75.4-75.4
					c-22,3.6-43.1,1.6-62.7-5.3l-46.7,46.6c-21.1,21.3-57.9,21.3-79.2,0c-21.8-21.8-21.8-57.3,0-79C113.9,318.9,197.8,235.1,192.5,240.5
					L192.5,240.5z"/>
					<path d="M319.5,271.5c-21,21.3-56.3,22.7-79,0c-0.2,0-0.2,0-0.2,0c-6.4-6.4-11-14.2-13.8-22.6c-6.7,1.1-12.6,4-17.1,8.5l-22.1,21.9
					c5,9.6,11.4,18.4,19,26.2c42,41.1,106.9,40,147.2,0l80-80c40.6-40.9,40.6-106.3,0-147.2c-40.9-40.6-106.3-40.6-147.2,0L211,153.8
					c22-3.6,43.1-1.6,62.7,5.3l46.7-46.6c21.1-21.3,57.9-21.3,79.2,0c21.8,21.8,21.8,57.3,0,79C398.1,193.1,314.2,276.9,319.5,271.5
					L319.5,271.5z"/>
				</svg>
			</a>
		</div>
	</div>
<?php }elseif (has_post_format('video')){ ?>
	<div class="format-wrap">
		<?php
		if (!empty($featured_video)){
			?>
			<div class="link-icon">
				<div class="pxl-video-popup">
					<div class="content-inner">
						<a class="video-play-button pxl-action-popup" href="<?php echo esc_url($featured_video); ?>">
							<i class="bi bi-play-fill"></i>
						</a>
					</div>
				</div>
			</div>
			<?php
		}?>
	</div>
	<?php
}elseif ( !empty($audio_url) && has_post_format('audio')) { ?>

	<div class="format-wrap">
		<div class="link-icon">
			<a href="<?php echo esc_url($audio_url) ?>" target='blank'>
				<i class="bi bi-volume-up-fill"></i>
			</a>
		</div>
	</div>
<?php }else { ?>
	<!-- <div class="format-wrap">
		<div class="link-icon">
			<a>
				<svg fill="none" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m16.0497 2.29289c-.3906-.39052-1.0237-.39052-1.4142 0-.3906.39053-.3906 1.02369 0 1.41422l.7071.70713-6.07257 4.58576h-4.44823c-.44545 0-.66853.60968-.35355.92466l9.60665 9.60664c.3149.3149.9251.0919.9251-.3536v-4.4477l4.5852-6.07311.7071.70707c.3905.39052 1.0237.39052 1.4142 0s.3905-1.02369 0-1.41421zm-8.07094 15.14221-1.41421-1.4142-3.97913 3.9791-.57548 1.74c-.04442.1517.09837.2945.25008.25l1.74007-.5762z" fill="rgb(0,0,0)" fill-rule="evenodd"/></svg>
			</a>
		</div>
	</div> -->
<?php } ?>
</div>
