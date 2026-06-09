<div class="pxl-team-box pxl-team-box1 ">
    <div class="pxl-item--inner-wrap">
        <div class="pxl-list-item wow <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
            <?php foreach ($settings['team'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $social = isset($value['social']) ? $value['social'] : '';
                $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
                if ( ! empty( $value['item_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                    if ( $value['item_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $value['item_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                ?>
                <div class="pxl-item--inner " >
                    <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => "full",
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        $thumbnail_url = $img['url'];
                        ?>
                        <div class="pxl-item--image el-parallax-wrap" >
                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo pxl_print_html($thumbnail); ?></a>
                            
                        </div>
                    <?php } ?>
                    <div class="pxl-item--holder ">
                        <div class="left-content">
                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                            <h3 class="pxl-item--title">    
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo pxl_print_html($title); ?></a>
                            </h3>
                        </div>
                        <?php if(!empty($social)): ?>
                            <div class="pxl-social">
                                <?php  $team_social = json_decode($social, true); ?>
                                <?php foreach ($team_social as $value): ?>
                                    <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>