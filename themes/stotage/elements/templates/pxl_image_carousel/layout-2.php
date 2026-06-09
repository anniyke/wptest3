 <?php
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
if(isset($settings['list2']) && !empty($settings['list2']) && count($settings['list2'])): ?>
    <div class=" pxl-image-carousel pxl-image-carousel2 ">
                    <?php foreach ($settings['list2'] as $key => $value):
                        $image = isset($value['image2']) ? $value['image2'] : '';
                        ?>
                        <div class="pxl-card-slide">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                <?php } ?>
                                <div class="pxl-item--image">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                        </div>
                    <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if($settings['arrows'] !== false): ?>
    <div class="pxl-swiper-arrow-wrap style-2 nav-wrapper">
        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev nav left" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d" >
            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.28125 1.125C5.15625 0.96875 4.90625 0.96875 4.75 1.125L1.125 4.75C0.96875 4.90625 0.96875 5.125 1.125 5.28125L4.75 8.90625C4.90625 9.0625 5.15625 9.0625 5.28125 8.90625L5.53125 8.6875C5.65625 8.53125 5.65625 8.3125 5.53125 8.15625L2.90625 5.53125H14.625C14.8438 5.53125 15 5.375 15 5.15625V4.84375C15 4.65625 14.8438 4.46875 14.625 4.46875H2.90625L5.53125 1.875C5.65625 1.71875 5.65625 1.5 5.53125 1.34375L5.28125 1.125Z" fill="white"/>
            </svg>
        </div>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-next nav right" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d" >
            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"/>
            </svg>
        </div>
    </div>
<?php endif; ?>