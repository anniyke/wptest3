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
<?php if(isset($settings['box4']) && !empty($settings['box4']) && count($settings['box4'])): ?>
<div class="pxl-grid pxl-box-grid pxl-box-grid4" data-layout="fitRows" data-settings='{"limit":"<?php echo esc_attr($settings['limit']); ?>"}'>
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['box4'] as $key => $value):
            $title4 = isset($value['title4']) ? $value['title4'] : '';
            $desc4 = isset($value['desc4']) ? $value['desc4'] : '';
            $position3 = isset($value['position3']) ? $value['position3'] : '';
            $image = isset($value['image3']) ? $value['image3'] : '';
            $rate = isset($value['rate']) ? $value['rate'] : '';
            $logo = isset($value['logo']) ? $value['logo'] : '';
            ?>
            <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($settings['pxl_animate']); ?> " data-wow-duration="1.2s">
                <div class="pxl-item--inner">
                    <h5 class="pxl-item--title">
                        <?php echo pxl_print_html($title4); ?>
                    </h5>
                    <div class="pxl-item--position">
                        <?php echo pxl_print_html($position3); ?>
                    </div>
                    <p class="pxl-item--desc">
                        <?php echo pxl_print_html($desc4); ?>
                    </p>
                    <div class="icon-star">
                        <svg width="101" height="15" viewBox="0 0 101 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219ZM28.3008 1.24219C28.6289 0.585938 29.5586 0.613281 29.8594 1.24219L31.6641 4.87891L35.6562 5.45312C36.3672 5.5625 36.6406 6.4375 36.1211 6.95703L33.25 9.77344L33.9336 13.7383C34.043 14.4492 33.2773 14.9961 32.6484 14.668L29.0938 12.7812L25.5117 14.668C24.8828 14.9961 24.1172 14.4492 24.2266 13.7383L24.9102 9.77344L22.0391 6.95703C21.5195 6.4375 21.793 5.5625 22.5039 5.45312L26.5234 4.87891L28.3008 1.24219ZM49.5195 1.24219C49.8477 0.585938 50.7773 0.613281 51.0781 1.24219L52.8828 4.87891L56.875 5.45312C57.5859 5.5625 57.8594 6.4375 57.3398 6.95703L54.4688 9.77344L55.1523 13.7383C55.2617 14.4492 54.4961 14.9961 53.8672 14.668L50.3125 12.7812L46.7305 14.668C46.1016 14.9961 45.3359 14.4492 45.4453 13.7383L46.1289 9.77344L43.2578 6.95703C42.7383 6.4375 43.0117 5.5625 43.7227 5.45312L47.7422 4.87891L49.5195 1.24219ZM70.7383 1.24219C71.0664 0.585938 71.9961 0.613281 72.2969 1.24219L74.1016 4.87891L78.0938 5.45312C78.8047 5.5625 79.0781 6.4375 78.5586 6.95703L75.6875 9.77344L76.3711 13.7383C76.4805 14.4492 75.7148 14.9961 75.0859 14.668L71.5312 12.7812L67.9492 14.668C67.3203 14.9961 66.5547 14.4492 66.6641 13.7383L67.3477 9.77344L64.4766 6.95703C63.957 6.4375 64.2305 5.5625 64.9414 5.45312L68.9609 4.87891L70.7383 1.24219ZM91.957 1.24219C92.2852 0.585938 93.2148 0.613281 93.5156 1.24219L95.3203 4.87891L99.3125 5.45312C100.023 5.5625 100.297 6.4375 99.7773 6.95703L96.9062 9.77344L97.5898 13.7383C97.6992 14.4492 96.9336 14.9961 96.3047 14.668L92.75 12.7812L89.168 14.668C88.5391 14.9961 87.7734 14.4492 87.8828 13.7383L88.5664 9.77344L85.6953 6.95703C85.1758 6.4375 85.4492 5.5625 86.1602 5.45312L90.1797 4.87891L91.957 1.24219Z" fill="#FFCC00"/>
                        </svg>

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
