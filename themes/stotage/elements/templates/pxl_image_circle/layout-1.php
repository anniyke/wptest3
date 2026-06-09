<div class="pxl-image-circle <?php echo esc_attr($settings['border_line2'].' '.$settings['border_line1']) ?>">
    <div class="pxl-image-inner list-1">
        <?php foreach ($settings['list'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : '';
            $image2 = isset($value['image2']) ? $value['image2'] : '';
            if(!empty($image['id'])) { 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $image['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } 
            if(!empty($image2['id'])) { 
                $img2 = pxl_get_image_by_size( array(
                    'attach_id'  => $image2['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload',
                ));
                $thumbnail_2 = $img2['thumbnail'];
            } 
            ?>
            <div class="pxl-item--image " >
                <?php echo pxl_print_html($thumbnail); ?>
                <?php echo pxl_print_html($thumbnail_2); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pxl-image-inner list-2">
        <?php foreach ($settings['list2'] as $key => $value):
            $image2_1 = isset($value['image2_1']) ? $value['image2_1'] : '';
            $image2_2 = isset($value['image2_2']) ? $value['image2_2'] : '';
            if(!empty($image2_1['id'])) { 
                $img2_1 = pxl_get_image_by_size( array(
                    'attach_id'  => $image2_1['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload',
                ));
                $thumbnail2_1 = $img2_1['thumbnail'];
            } 
            if(!empty($image2_2['id'])) { 
                $img2_2 = pxl_get_image_by_size( array(
                    'attach_id'  => $image2_2['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload',
                ));
                $thumbnail2_2 = $img2_2['thumbnail'];
            } 
            ?>
            <div class="pxl-item--image " >
                <?php echo pxl_print_html($thumbnail2_1); ?>
                <?php echo pxl_print_html($thumbnail2_2); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
