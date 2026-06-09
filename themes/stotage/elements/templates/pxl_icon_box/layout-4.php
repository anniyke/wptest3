<?php
$active = intval($settings['active']);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$step = 1;
?>
<div class="pxl-icon-box pxl-icon-box4" >
    <?php foreach ($settings['list_imb_l4'] as $key => $value):
        $is_active = ($key + 1) == $active;
        $title_l4 = isset($value['title_l4']) ? $value['title_l4'] : '';
        $desc_l4 = isset($value['desc_l4']) ? $value['desc_l4'] : '';
        $button_text = isset($value['button_text']) ? $value['button_text'] : '';
        $image4_1 = isset($value['image4_1']) ? $value['image4_1'] : '';
        $list_link = isset($value['list_link']) ? $value['list_link'] : '';
        $image4_2 = isset($value['image4_2']) ? $value['image4_2'] : '';
        $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
        if ( ! empty( $value['item_link4']['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $value['item_link4']['url'] );

            if ( $value['item_link4']['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $value['item_link4']['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        ?>
        <div class="pxl-item <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($is_active ? 'active' : ''); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
            <span class="step">
                <?php 
                if ($step < 10) {
                    echo pxl_print_html('0'.$step++.'.'); 
                }else{
                    echo pxl_print_html($step++.'.'); 
                }
                ?>
            </span>
            <span class="pxl-item-plus"></span>
            <div class="pxl-item--inner" >
                <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo pxl_print_html($title_l4); ?>
                </a>
                </<?php echo esc_attr($settings['title_tag']); ?>>
                <div class="pxl-item-content">
                    <div class="pxl-content--left">
                        <div class="pxl-list--item">
                            <?php if(!empty($list_link)):
                                $categories = json_decode($list_link, true);
                                foreach ($categories as $value): ?>
                                    <?php if(! empty($value['url'])){ ?><a href="<?php echo esc_url($value['url']); ?>" ><?php } ?><span><?php echo pxl_print_html($value['content']); ?></span><?php if(! empty($value['url'])){ ?></a><?php } ?>
                                <?php endforeach;
                            endif; ?>
                        </div>
                        <p class="pxl-item--description el-empty"><?php echo pxl_print_html($desc_l4); ?></p>
                    </div>
                    <div class="pxl-image-wrap">
                        <span >
                            <?php if(!empty($image4_1['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image4_1['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                echo pxl_print_html($thumbnail);
                                ?>
                            <?php } ?>
                        </span>
                        <span >
                            <?php if(!empty($image4_2['id'])) { 
                                $img2 = pxl_get_image_by_size( array(
                                    'attach_id'  => $image4_2['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail2 = $img2['thumbnail'];
                                echo pxl_print_html($thumbnail2);
                                ?>
                            <?php } ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>