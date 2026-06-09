<?php
$html_id = pxl_get_element_id($settings);
$tax = ['event-category'];
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
extract(pxl_get_posts_of_grid(
    'event', 
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    $tax
));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / floatval($widget->get_setting('col_xl', 4));
}

$col_lg = 12 / floatval($widget->get_setting('col_lg', 4));
$col_md = 12 / floatval($widget->get_setting('col_md', 3));
$col_sm = 12 / floatval($widget->get_setting('col_sm', 2));
$col_xs = 12 / floatval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$grid_class = '';
$grid_class = 'pxl-grid-inner pxl-grid-masonry row';

$filter = $widget->get_setting('filter', 'false');
$filter_type = $widget->get_setting('filter_type', 'normal');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');

$post_type = $widget->get_setting('post_type', 'event');
$layout = $widget->get_setting('layout_'.$post_type, 'event-1');
$num_words = $widget->get_setting('num_words');
$show_category = $widget->get_setting('show_category');
$show_excerpt = $widget->get_setting('show_excerpt');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');

$load_more = array(
    'tax'             => $tax,
    'post_type'       => $post_type,   
    'layout'          => $layout,
    'startPage'       => $paged,
    'maxPages'        => $max,
    'total'           => $total,
    'filter'          => $filter,
    'filter_type'     => $filter_type,
    'perpage'         => $limit,
    'nextLink'        => $next_link,
    'source'          => $source,
    'orderby'         => $orderby,
    'order'           => $order,
    'num_words'       => $num_words,
    'limit'           => $limit,
    'post_ids'        => $post_ids,
    'col_xl'          => $col_xl,
    'col_lg'          => $col_lg,
    'col_md'          => $col_md,
    'col_sm'          => $col_sm,
    'col_xs'          => $col_xs,
    'pagination_type' => $pagination_type,
    'show_excerpt'     => $show_excerpt,
    'show_button'     => $show_button,
    'button_text'     => $button_text,
    'show_category'     => $show_category,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'    => $pxl_animate,
);

$wrap_attrs = [
    'id'               => $html_id,
    'class'            => trim('pxl-grid pxl-event-grid pxl-event-grid-layout1 pxl-event-style1'),
    'data-start-page'  => $paged,
    'data-max-pages'   => $max,
    'data-total'       => $total,
    'data-perpage'     => $limit,
    'data-next-link'   => $next_link
];

if ($pagination_type != 'false'){
    $wrap_attrs['data-loadmore'] = json_encode($load_more);
}

$widget->add_render_attribute( 'wrapper', $wrap_attrs );

if( count($posts) <= 0){
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'stotage' ). '</div>';
    return;
} ?>

<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?> data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
    <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
        <div class="wrap-filter">
            <div class="pxl-grid-filter">
                <span class="label-text-fillter" ><?php echo esc_html($filter_default_title); ?></span>
                <div class="pxl--filter-inner">
                    <span class="filter-item active" data-filter="*">
                        <?php echo esc_html($filter_default_title); ?>
                    </span>
                    <?php foreach ($categories as $category):
                        $category_arr = explode('|', $category);
                        $term = get_term_by('slug',$category_arr[0], $category_arr[1]);
                        $tax_count = 0;
                        foreach ($posts as $key => $post){
                            $this_terms = get_the_terms( $post->ID, 'event-category' );
                            $term_list = [];
                            foreach ($this_terms as $t) {
                                $term_list[] = $t->slug;
                            } 
                            if(in_array($term->slug,$term_list))
                                $tax_count++;
                        } 
                        if($tax_count > 0): ?>
                            <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                                <?php echo esc_html($term->name); ?>
                            </span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
            <?php if($settings['search'] == 'true') { ?>
                <div class="pxl-grid--search">
                    <input type="text" class="grid-search-input" placeholder="Search...">
                    <i class="bi bi-search"></i>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php stotage_get_post_grid($posts, $load_more); ?>
    </div>
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination">
            <?php stotage()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more">
            <span class="btn-grid-loadmore btn btn-style-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none"><path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"></path></svg>
                <span class="pxl-loadmore-text" data-text="Learn More Services">
                    <?php if (!empty($settings['button_text_load_more'])) {
                        echo pxl_print_html($settings['button_text_load_more']);
                    }else {
                        echo esc_html__('Load More Projects', 'stotage'); 
                    }?>
                </span>
            </span>
        </div>
    <?php } ?>
</div>