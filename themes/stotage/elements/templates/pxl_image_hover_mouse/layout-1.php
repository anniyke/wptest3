<div class="pxl-image-cover--mouse">
    <div class="content">
        <?php
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
        foreach ($settings['list_image'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : '';
            $img_size = isset($value['img_size']) ? $value['img_size'] : '';
        ?>
            <div class="pxl-image-cover--mouse-inner">
                <div class="pxl-item">
                    <?php if (!empty($image['id'])) { 
                        $img_classes = 'pxl-img-mouse'; 
                        $img = pxl_get_image_by_size(array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class'      => $img_classes,
                        ));
                        echo wp_kses_post($img['thumbnail']);
                    } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
