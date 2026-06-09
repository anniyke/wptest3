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
<?php if(isset($settings['box']) && !empty($settings['box']) && count($settings['box'])): ?>
<div class="pxl-grid pxl-box-grid pxl-box-grid1" data-layout="fitRows">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="bgr-list">
        <?php foreach ($settings['box'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : '';
            ?>
            <span class="image-item" style="background-image: url(<?php echo esc_attr($value['image']['url']); ?>);">
            </span>
        <?php endforeach; ?>
        </div>
        <div class="wrap-item">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['box'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $button_text = isset($value['button_text']) ? $value['button_text'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $link = isset($value['link']) ? $value['link'] : '';
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
            <div id="<?php echo esc_attr($html_id.$key); ?>" class="<?php echo esc_attr($item_class); ?>">
                <div class="pxl-item--holder">
                    <div class="pxl-item--title">
                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                        <?php echo pxl_print_html($title); ?>
                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        
                    </div>
                    <div class="pxl-item--desc">
                        <?php echo pxl_print_html($desc); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
