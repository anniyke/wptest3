<?php
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
if(isset($settings['list2']) && !empty($settings['list2']) && count($settings['list2'])): ?>
    <div class=" pxl-image-carousel pxl-image-carousel4 " <?php if($settings['drap'] !== false) : ?>data-cursor-drap="<?php echo esc_html('CLICK', 'stotage'); ?>"<?php endif; ?>>
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
