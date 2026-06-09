<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$tax = ['portfolio-category'];
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
    'tax'=> $tax,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false); 
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$show_category = $widget->get_setting('show_category');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'center_slide'                  => true, 
    'slides_to_show'                => (int)$col_xl, 
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-portfolio-carousel1 pxl-portfolio-style1 ">
        <div class="pxl-carousel-inner" >
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $post):
                        $client = get_post_meta($post->ID, 'client', true);
                        $last_withdraw = get_post_meta($post->ID, 'last_withdraw', true);
                        $portfolio_icon_type = get_post_meta($post->ID, 'portfolio_icon_type', true);
                        $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
                        $portfolio_icon_img = get_post_meta($post->ID, 'portfolio_icon_img', true);
                        $image_size = !empty($img_size) ? $img_size : 'full';
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)){
                            $img_id       = get_post_thumbnail_id( $post->ID );
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail']; 
                            $thumbnail_url    = $img['url']; 
                        }
                        $filter_class = '';
                        if ($select_post_by === 'term_selected' )
                            $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                        ?>
                        <div class="pxl-swiper-slide" data-filter="<?php echo esc_attr($filter_class); ?>" <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_html('Drag.', 'stotage'); ?>"<?php endif; ?>>
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
                                <div class="pxl-post--featured ">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </a>    
                                </div>
                                <?php if($settings['show_category'] == 'true'): ?>
                                    <div class="pxl-post--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                                    </div>
                                <?php endif; ?>
                                <h5 class="pxl-post--title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                </h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> 
        </div>
        <div class="container wrap-arrow <?php echo esc_attr($settings['style-pa']) ?>">
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>
            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-3">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.25 8.90625C5.125 9.0625 4.875 9.0625 4.75 8.90625L1.09375 5.28125C0.9375 5.125 0.9375 4.90625 1.09375 4.75L4.75 1.125C4.875 0.96875 5.125 0.96875 5.25 1.125L5.5 1.34375C5.625 1.5 5.625 1.71875 5.5 1.875L2.875 4.46875H14.625C14.8125 4.46875 15 4.65625 15 4.84375V5.15625C15 5.375 14.8125 5.53125 14.625 5.53125H2.875L5.5 8.15625C5.625 8.3125 5.625 8.53125 5.5 8.6875L5.25 8.90625Z" fill="white"/>
                </svg>
            </div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"/>
                </svg>
            </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>