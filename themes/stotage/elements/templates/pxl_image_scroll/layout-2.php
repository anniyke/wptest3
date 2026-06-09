<div class="pxl-image-list-2">

    <?php if(!empty( $settings['image']['url'] ) ) { 
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => 'full',
        ) );
        $thumbnail   = $img['thumbnail'];
        ?>
        <div class="image-feature">
            <div class="wrap-image">
                
                <?php echo pxl_print_html($thumbnail); ?>
                <?php if (!empty($settings['title_box'])): ?>
                    <h3 class="title-box">
                        <?php echo pxl_print_html($settings['title_box']); ?>
                    </h3> 
                <?php endif ?>
            </div>
        </div>
    <?php } ?>
    <div class="wrap-list">
        <div class="list-image col-left">
            <?php
            foreach ($settings['image_l1'] as $key => $image_l1):
                $image_left = isset($image_l1['image_left']) ? $image_l1['image_left'] : '';
                ?>
                <?php if(!empty($image_left['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image_left['id'],
                        'thumb_size' => 'full',
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    echo wp_kses_post($thumbnail);
                    ?>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="list-image col-right">
            <?php
            foreach ($settings['image_l2'] as $key => $image_l2):
                $image_right = isset($image_l2['image_right']) ? $image_l2['image_right'] : '';
                ?>
                <?php if(!empty($image_right['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image_right['id'],
                        'thumb_size' => 'full',
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    echo wp_kses_post($thumbnail);
                    ?>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
