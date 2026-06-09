<div class="pxl-screen">
    <?php if(!empty($settings['image_phone']['id'])) :
        $img_phone = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image_phone']['id'],
            'thumb_size' => 'full',
        ));
        $thumbnail_url = $img_phone['thumbnail']; ?>
    <?php endif; ?>
    <div class="pxl-button-wrapper">
        <?php foreach ($settings['screen'] as $key => $value):
            $button_text = isset($value['button_text']) ? $value['button_text'] : '';
            ?>
            <div class="pxl-item--button"><?php echo pxl_print_html($button_text); ?></div>
        <?php endforeach; ?>
    </div>
    <div class="pxl-screen-wrapper">
        <span class="mockup-phone">
            <?php echo wp_kses_post($thumbnail_url); ?>
        </span>
        <div class="wrap-img">
            <?php foreach ($settings['screen'] as $key => $value):
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                ?>
                <?php if(!empty($image['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => 'full',
                        'class' => 'pre-active',
                    ));
                    $thumbnail = $img['thumbnail'];?>
                    <?php echo wp_kses_post($thumbnail); ?>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
