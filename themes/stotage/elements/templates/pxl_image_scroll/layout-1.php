<div class="pxl-image-list pre-load">
    <?php if(!empty( $settings['image_bgr']['url'] ) ) { 
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image_bgr']['id'],
            'thumb_size' => 'full',
        ) );
        $thumbnail_url    = $img['url'];
        ?>
        <div class="overlay" style="background-image:url(<?php echo esc_url($thumbnail_url); ?>);"></div>
    <?php } ?>
    <div class="pxl-image-list-content">
        <div class="list-image list-odd">
            <div class="wrap-image">
                <?php
                foreach ($settings['image_list_1'] as $key => $image_list_1):
                    $image_1 = isset($image_list_1['image_1']) ? $image_list_1['image_1'] : '';
                    ?>
                    <?php if(!empty($image_1['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_1['id'],
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
        <div class="list-image list-even">
            <div class="wrap-image">
                <?php
                foreach ($settings['image_list_2'] as $key => $image_list_2):
                    $image_2 = isset($image_list_2['image_2']) ? $image_list_2['image_2'] : '';
                    ?>
                    <?php if(!empty($image_2['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_2['id'],
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
        <div class="list-image list-odd">
            <div class="wrap-image">
                <?php
                foreach ($settings['image_list_3'] as $key => $image_list_3):
                    $image_3 = isset($image_list_3['image_3']) ? $image_list_3['image_3'] : '';
                    ?>
                    <?php if(!empty($image_3['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_3['id'],
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
        <div class="list-image list-even">
            <div class="wrap-image">
                <?php
                foreach ($settings['image_list_4'] as $key => $image_list_4):
                    $image_4 = isset($image_list_4['image_4']) ? $image_list_4['image_4'] : '';
                    ?>
                    <?php if(!empty($image_4['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_4['id'],
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
        <div class="list-image list-odd">
            <div class="wrap-image">
                <?php
                foreach ($settings['image_list_5'] as $key => $image_list_5):
                    $image_5 = isset($image_list_5['image_5']) ? $image_list_5['image_5'] : '';
                    ?>
                    <?php if(!empty($image_5['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_5['id'],
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
</div>
