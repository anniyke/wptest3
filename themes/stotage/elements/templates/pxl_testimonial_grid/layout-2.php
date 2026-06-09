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
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
<div class="pxl-grid pxl-testimonial-grid pxl-testimonial-grid2 " data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['testimonial'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $star = isset($value['star']) ? $value['star'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $desc = isset($value['description']) ? $value['description'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $image_logo = isset($value['image_logo']) ? $value['image_logo'] : '';
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                    <div class="top">
                        <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                            </svg>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                            </svg>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                            </svg>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                            </svg>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#CB360F" stroke-width="2"/>
                            </svg>
                        </div>
                        <p class="pxl-item--description"><?php echo pxl_print_html($desc); ?></p>
                    </div>
                    <div class="bottom">
                        <div class="pxl-item--holder">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '90x90',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--avatar ">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                            <?php if(!empty($image_logo['id'])) { 
                                $img2 = pxl_get_image_by_size( array(
                                    'attach_id'  => $image_logo['id'],
                                    'thumb_size' => '90x90',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail_logo = $img2['thumbnail'];?>
                                <div class="pxl-item--logo">
                                    <?php echo wp_kses_post($thumbnail_logo); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <span class="pxl-item--position"><?php echo pxl_print_html($position); ?></span>
                        <h3 class="pxl-item--title">    
                            <?php echo pxl_print_html($title); ?>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
