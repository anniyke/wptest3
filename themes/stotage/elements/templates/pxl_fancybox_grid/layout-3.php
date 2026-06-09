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
<?php if(isset($settings['box3']) && !empty($settings['box3']) && count($settings['box3'])): ?>
<div class="pxl-grid pxl-box-grid pxl-box-grid3" data-layout="fitRows" data-settings='{"limit":"<?php echo esc_attr($settings['limit']); ?>"}'>
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['box3'] as $key => $value):
            $title3 = isset($value['title3']) ? $value['title3'] : '';
            $desc3 = isset($value['desc3']) ? $value['desc3'] : '';
            $position3 = isset($value['position3']) ? $value['position3'] : '';
            $image = isset($value['image3']) ? $value['image3'] : '';
            $rate = isset($value['rate']) ? $value['rate'] : '';
            $logo = isset($value['logo']) ? $value['logo'] : '';
            ?>
            <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($settings['pxl_animate']); ?> " data-wow-duration="1.2s">
                <div class="pxl-item--inner">
                    <div class="pxl-items--top">
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => 'full',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];?>
                            <div class="pxl-item--avatar ">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                            <div class="info">
                                <h5 class="pxl-item--title">
                                    <?php echo pxl_print_html($title3); ?>
                                </h5>
                                <div class="pxl-item--position">
                                    <?php echo pxl_print_html($position3); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="pxl-item--desc">
                        <?php echo pxl_print_html($desc3); ?>
                    </div>
                    <div class="pxl-item-content">
                        <?php if(!empty($logo['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $logo['id'],
                                'thumb_size' => 'full',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail_logo = $img['thumbnail'];?>
                            <div class="pxl-item--logo ">
                                <?php echo wp_kses_post($thumbnail_logo); ?>
                            </div>
                        <?php } ?>
                        <div class="pxl-item--rate">
                            <?php echo pxl_print_html($rate); ?>
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
