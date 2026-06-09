<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid2 pxl-team-layout2">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
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
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
                $link_key_2 = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                if ( ! empty( $value['btn_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key_2, 'href', $value['btn_link']['url'] );

                    if ( $value['btn_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key_2, 'target', '_blank' );
                    }

                    if ( $value['btn_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key_2, 'rel', 'nofollow' );
                    }
                }
                $link_attributes_2 = $widget->get_render_attribute_string( $link_key_2 );
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="pxl-item--image">
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if(!empty($social)): ?>
                                    <div class="pxl-social--wrap pxl-l-0">
                                        <?php  $team_social = json_decode($social, true); ?>
                                        <div class="pxl-social--button"><i class="flaticon-share"></i></div>
                                        <div class="pxl-social--icon">
                                            <?php foreach ($team_social as $value): ?>
                                                <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                        <div class="pxl-item--holder pxl-ml-34">
                            <?php if(!empty($btn_text)) : ?>
                                <div class="pxl-item--button pxl-text-right">
                                    <a <?php echo implode( ' ', [ $link_attributes_2 ] ); ?> class="btn-readmore-1">
                                        <span><?php echo pxl_print_html($btn_text); ?></span>
                                        <i class="caseicon-angle-arrow-right rtl-reverse"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item--title"><?php echo pxl_print_html($title); ?></h3>
                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                            <div class="pxl-item--link pxl-text-right"><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
