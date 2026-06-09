<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$img_size = $widget->get_setting('img_size');
$show_date = $widget->get_setting('show_date');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button'); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-post-modern pxl-post-modern1 pxl-flex <?php echo esc_attr($settings['style']); ?>">
        <div class="pxl-post--images">
            <div class="pxl-images--inner">
                <?php $image_size = !empty($img_size) ? $img_size : '553x533';
                    foreach ($posts as $key => $post):
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        $thumbnail_url    = $img['url'];
                        ?>
                        <div id="<?php echo esc_attr($html_id.'-'.$key); ?>" class="pxl-post--featured bg-image <?php if($key == '0') { echo 'pxl-post--first active'; } ?>" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
                            <a class="pxl-post--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
        <div class="pxl-post--content pxl-flex">
            <div class="pxl-post--items pxl-flex">
                <?php foreach ($posts as $key => $post): 
                    $img_id       = get_post_thumbnail_id( $post->ID ); 
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail']; ?>
                        <div class="pxl-post--item">
                            <div class="pxl-content--inner" data-image="#<?php echo esc_attr($html_id.'-'.$key); ?>">
                                <div class="pxl-post--featuredRight">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                </div>
                                <div class="pxl-post--line pxl-line--top wow skewIn"></div>
                                <h3 class="pxl-post--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h3>
                                <div class="pxl-post--holder pxl-flex-middle">
                                    <div class="pxl-post--meta pxl-mr-10">
                                        <div class="pxl-meta--inner pxl-flex-middle">
                                            <?php if($show_date == 'true'): ?>
                                                <div class="pxl-post--date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></div>
                                            <?php endif; ?>
                                            <div class="pxl-post--divider"></div>
                                            <?php if($show_category == 'true'): ?>
                                                <div class="pxl-post--category"><?php the_terms( $post->ID, 'category', '', ' ' ); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="pxl-post--button">
                                            <a class="pxl-flex-center" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="flaticon flaticon-down-right-arrow"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="pxl-post--line pxl-line--bottom wow skewIn"></div>
                            </div>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>