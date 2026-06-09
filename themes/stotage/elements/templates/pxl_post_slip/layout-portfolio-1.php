<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$img_size = $widget->get_setting('img_size');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text'); 

if ( ! empty( $settings['wg_btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['wg_btn_link']['url'] );

    if ( $settings['wg_btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['wg_btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-post-slip pxl-post-slip1">
        <?php if(!empty($settings['wg_heading']) || $settings['wg_desc']) : ?>
            <div class="pxl-post-content pxl-pr-30">
                <div class="pxl-content--inner">
                    <h3 class="pxl-widget--desc pxl-empty <?php echo pxl_print_html($settings['pxl_animate_h']); ?>">
                        <?php echo esc_attr($settings['wg_heading']); ?></h3>
                        <div class="pxl-widget--title pxl-empty"><?php echo pxl_print_html($settings['wg_desc']); ?>
                        
                    </div>
                    <?php if(!empty($settings['wg_btn_text'])) : ?>
                        <div class="pxl-widget--button">
                            <a class="btn btn-text-parallax" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                                <span class="pxl--btn-text"><?php echo pxl_print_html($settings['wg_btn_text']); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="pxl-post-image-slip">
            <div class="pxl-post-image--track">
                <?php $image_size = !empty($img_size) ? $img_size : 'full';
                foreach ($posts as $key => $post):
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                    $thumbnail    = $img['thumbnail'];
                    ?>
                    <div class="pxl-post-image--block pxl-post-block_<?php echo esc_attr($key+1); ?>">
                        <div class="pxl-post--image">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <div class="pxl-post-block--min pxl-post-min_<?php echo esc_attr($key+1); ?>">
                                <div class="pxl-post-min--inner">
                                    <h3 class="pxl-post--title pxl-empty">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" >
                                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                                        </a>
                                    </h3>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="pxl-post--readmore">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="37" viewBox="0 0 38 37" fill="none">
                                                    <path d="M37.6549 0H0V7.47475H24.8522L0.376549 31.3939L6.02478 37L30.1239 13.0808V37H37.6549V0Z" fill="#141515"/>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>