<div class="pxl-image-list-3">
    <div class="pxl-items-inner">
        <?php
        $img_size = $widget->get_setting('img_size');
        $image_size = !empty($img_size) ? $img_size : 'full';
        foreach ($settings['image_l3'] as $key => $image_l3):
            $image_ll3 = isset($image_l3['image_ll3']) ? $image_l3['image_ll3'] : '';
            $transform_style = isset($image_l3['transform_style']) ? $image_l3['transform_style'] : '';
            $title_l3 = isset($image_l3['title_l3']) ? $image_l3['title_l3'] : '';
            $sub_title = isset($image_l3['sub_title']) ? $image_l3['sub_title'] : '';
            $link_key = $widget->get_repeater_setting_key( 'item_link', 'image_l3', $key );
                    if ( ! empty( $image_l3['item_link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $image_l3['item_link']['url'] );

                        if ( $image_l3['item_link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $image_l3['item_link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
            ?>
            <div class="pxl-item" <?php if (!empty($transform_style)){ ?> style="transform:<?php echo esc_attr($transform_style); ?>"<?php } ?> >
                <span class="corner r1"></span>
                <span class="corner r2"></span>
                <span class="corner r3"></span>
                <span class="corner r4"></span>
                <a class="link-box" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                <div class="pxl-item-image">
                    <?php if(!empty($image_ll3['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image_ll3['id'],
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        echo wp_kses_post($thumbnail);
                        ?>
                    <?php } ?>
                </div>
                <div class="pxl-item-content">
                    <?php if (!empty($sub_title)){ ?>
                        <div class="subtitle"> <?php echo pxl_print_html($sub_title); ?></div>
                    <?php } ?>
                    <?php if (!empty($title_l3)){ ?>
                        <h4 class="title-box"> <?php echo pxl_print_html($title_l3); ?></h4>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
