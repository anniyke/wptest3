<?php
use Elementor\Embed;
$html_id = pxl_get_element_id($settings);
$tax = ['category'];
$select_post_by = $widget->get_setting('select_post_by', 'term_selected');
$source = $post_ids = $post_ids_unselected = [];

if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    $post_ids_unselected  = $widget->get_setting('source_'.$settings['post_type'].'_post_ids_unselected', '');
}
 
$orderby   = $widget->get_setting('orderby', 'date');
$order     = $widget->get_setting('order', 'desc');
$limit     = $widget->get_setting('limit', 6);

$query_result = pxl_get_posts_of_grid('post', ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids, 'post_not_in' => $post_ids_unselected ], $tax);

extract($query_result);
 
$post_type            = $widget->get_setting('post_type','post');
$layout               = $widget->get_setting('layout_'.$post_type, 'post-list-1');
$layout_mode          = $widget->get_setting('layout_mode', 'fitRows');
$pagination_type      = $widget->get_setting('pagination_type', 'pagination');
$load_more = array(
    'tax'                 => $tax,
    'post_type'           => $post_type,   
    'layout'              => $layout,
    'select_post_by'      => $select_post_by,
    'layout_mode'         => $layout_mode,
    'startPage'           => $paged,
    'maxPages'            => $max,
    'total'               => $total,
    'perpage'             => $limit,
    'nextLink'            => $next_link,
    'source'              => $source,
    'post_ids'            => $post_ids,
    'orderby'             => $orderby,
    'order'               => $order,
    'limit'               => $limit,
     
    'item_animation'          => $widget->get_setting('item_animation', ''),  
    'item_animation_duration' => $widget->get_setting('item_animation_duration', 'normal'),  
    'item_animation_delay'    => $widget->get_setting('item_animation_delay', '150'),  
     
    'img_size'            => $widget->get_setting('img_size','700x540'),
    'show_date'           => $widget->get_setting('post_date'),
    'show_author'         => $widget->get_setting('post_author'),
    'show_category'       => $widget->get_setting('post_category'),
    'show_comment'        => $widget->get_setting('post_comment'),
    'show_excerpt'        => $widget->get_setting('post_excerpt'),
    'num_words'           => $widget->get_setting('post_num_words', 36),
    'show_readmore'       => $widget->get_setting('post_readmore'),
    'readmore_text'       => $widget->get_setting('post_readmore_text'),
    'post_share'          => $widget->get_setting('post_share'),

    'pagination_type'     => $pagination_type,
    'show_toolbar'        => $widget->get_setting('show_toolbar','hide'),
    'wg_type'             => 'post-list',
);

$wrap_attrs = [
    'id'               => $html_id,
    'class'            => trim('pxl-grid pxl-post-list layout-'.$layout),
    'data-layout-mode' => $layout_mode,
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
    echo '<div class="pxl-no-post-list">'.esc_html__( 'No Post Found', 'stotage' ). '</div>';
    return;
}
?>

<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?>>
    <?php if($settings['show_toolbar'] == 'show'): ?>
        <div class="post-list-toolbar row align-items-center justify-content-between">
            <div class="col col-sm-auto">
                <?php 
                    $limitpage = ($limit >= $total) ? $total : $limit;
                    printf(
                        '<span class="result-count"> %1$s %2$s %3$s %4$s %5$s </span>',
                        esc_html__('Showing','stotage'),
                        '1-'.$limitpage,
                        esc_html__('of','stotage'),
                        $total,
                        esc_html__('results','stotage')
                    );
                ?>
            </div>
            <div class="col col-sm-auto">
                <select name="orderby" class="orderby nice-select">
                    <option value="date"><?php esc_html_e('Lastest Posts','stotage') ?></option>
                    <option value="author"><?php esc_html_e('Posts Author','stotage') ?></option>
                    <option value="title"><?php esc_html_e('Posts Title','stotage') ?></option>
                    <option value="rand"><?php esc_html_e('Posts Random','stotage') ?></option>
                    <option value="comment_count"><?php esc_html_e('Comment Count','stotage') ?></option>
                </select>
            </div>
        </div>
    <?php endif; ?>
    <div class="pxl-list-inner d-flex-wrap relative"> 
        <?php stotage_get_post_list($posts, $load_more); ?>
    </div>
     
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination pagin-post">
            <?php stotage()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore'): 
        $icon_pos = ( !empty($settings['loadmore_icon']) && !empty($settings['icon_align'])) ? $settings['icon_align'] : ''; 
        ?>
        <div class="pxl-load-more " data-loading-text="<?php echo esc_attr__('Loading', 'stotage') ?>" data-loadmore-text="<?php echo esc_html($settings['loadmore_text']); ?>">
            <span class="btn btn-grid-loadmore">
                <span class="btn-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
            </span>
        </div>
    <?php endif; ?>
</div>