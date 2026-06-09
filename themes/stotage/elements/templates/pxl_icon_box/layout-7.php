<div class="pxl-icon-box pxl-icon-box7" >
<div class="snap-slider-holder">
    <div class="snap-slider-thumbs">
        <div class="snap-slider-thumbs-wrapper">
    <?php 
    foreach ($settings['iconbox'] as $key => $value):
        $title2 = isset($value['title2']) ? $value['title2'] : '';
        $sub_title2 = isset($value['sub_title2']) ? $value['sub_title2'] : '';
        $image2 = isset($value['image2']) ? $value['image2'] : '';
        $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
        if ( ! empty( $value['item_link2']['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $value['item_link2']['url'] );

            if ( $value['item_link2']['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $value['item_link2']['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        ?>
        <div class="pxl-item <?php echo esc_attr($settings['pxl_animate']); ?> " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <a class="link-box"<?php echo implode( ' ', [ $link_attributes ] ); ?>>
                </a>
            <span class="tg tg1"></span>
            <span class="tg tg2"></span>
            <span class="tg tg3"></span>
            <span class="tg tg4"></span>
            <?php if(!empty($image2['id'])) { 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $image2['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
            <?php } ?>
            <div class="image img-mask">
                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo wp_kses_post($thumbnail); ?>
                </a>
            </div>
            <div class="pxl-item--inner" >
                <span class="pxl-item--subtitle el-empty"><?php echo pxl_print_html($sub_title2); ?></span>
                <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo pxl_print_html($title2); ?>
                </a>
                </<?php echo esc_attr($settings['title_tag']); ?>>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
</div>
</div>