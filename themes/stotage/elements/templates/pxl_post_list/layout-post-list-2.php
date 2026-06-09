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
     
    'img_size'            => $widget->get_setting('img_size','thumbnail'),
    'show_date'           => $widget->get_setting('post_date'),
    'show_author'         => $widget->get_setting('post_author'),
    'show_category'       => $widget->get_setting('post_category'),
    'show_tags'           => $widget->get_setting('post_tags'),
    'show_comment'        => $widget->get_setting('post_comment'),
    'show_view'           => $widget->get_setting('post_view'),
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
     
    <div class="pxl-list-inner d-flex-wrap relative"> 
        <?php stotage_get_post_list($posts, $load_more); ?>
    </div>
     
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination pagin-post d-flex">
            <?php stotage()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore'): 
        $icon_pos = ( !empty($settings['loadmore_icon']) && !empty($settings['icon_align'])) ? $settings['icon_align'] : ''; 
        ?>
        <div class="pxl-load-more d-flex" data-loading-text="<?php echo esc_attr__('Loading', 'stotage') ?>" data-loadmore-text="<?php echo esc_html($settings['loadmore_text']); ?>">
            <span class="btn btn-grid-loadmore <?php echo esc_attr($icon_pos)?>">
                <?php 
                if(!empty($settings['loadmore_icon']))   
                    \Elementor\Icons_Manager::render_icon( $settings['loadmore_icon'], [ 'aria-hidden' => 'true', 'class' => 'btn-icon '.$icon_pos ], 'span' ); 
                ?>
                <span class="btn-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
                <span class="pxl-btn-icon pxli-spinner"></span>
            </span>
        </div>
    <?php endif; ?>
</div>