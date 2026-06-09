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
$html_id = pxl_get_element_id($settings);
?>
<?php if(isset($settings['box2']) && !empty($settings['box2']) && count($settings['box2'])): ?>
<div class="pxl-grid pxl-box-grid pxl-box-grid2" data-layout="masonry" data-settings='{"limit":"<?php echo esc_attr($settings['limit']); ?>"}'>
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['box2'] as $key => $value):
            $title2 = isset($value['title2']) ? $value['title2'] : '';
            $desc2 = isset($value['desc2']) ? $value['desc2'] : '';
            $image = isset($value['image2']) ? $value['image2'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'icon2', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['icon2'],
                'aria-hidden' => 'true',
            ] );
            $link = isset($value['link2']) ? $value['link2'] : '';
            $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
            if ( ! empty( $link['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                if ( $link['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $link['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key );
            ?>
            <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($settings['pxl_animate']); ?> " data-wow-duration="1.2s">
                <div class="pxl-item--inner">
                    <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => 'full',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];?>
                        <div class="pxl-item--img ">
                            <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        </div>
                    <?php } ?>
                    <div class="pxl-item-content">
                        <?php if(!empty($value['icon2'])){ ?>
                            <div class="icb">
                                <?php \Elementor\Icons_Manager::render_icon( $value['icon2'], [ 'aria-hidden' => 'true' ], 'i' );  ?>
                            </div>
                        <?php } ?>
                        <div class="pxl-item--title">
                            <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                            <?php echo pxl_print_html($title2); ?>
                            <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        </div>
                        <div class="pxl-item--desc">
                            <?php echo pxl_print_html($desc2); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (!empty($settings['btn_view_more'])): ?>
        <div class="btn-view-more">
            <span class="btn" id="loadMoreButton">
                <?php echo pxl_print_html($settings['btn_view_more']); ?>
            </span>
        </div>
    <?php endif ?>
</div>
<?php endif; ?>
