<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */

if(has_post_thumbnail()){
    $content_inner_cls = 'single-post-inner has-post-thumbnail';
    $meta_class    = ''; 
} else {
    $content_inner_cls = 'single-post-inner  no-post-thumbnail';
    $meta_class = '';
}

if(class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor()){
    $post_content_classes = 'single-elementor-content';
} else {
    $post_content_classes = '';
}
$sg_featured_img_size = stotage()->get_theme_opt('sg_featured_img_size', '960x545');
$feature_image_display = stotage()->get_theme_opt('feature_image_display', 'hide');
$title_post = stotage()->get_theme_opt('title_post', 'hide');
$box_info = stotage()->get_theme_opt( 'box_info', false );
$post_author_position = stotage()->get_theme_opt( 'post_author_position' );
$post_author_description = stotage()->get_theme_opt( 'post_author_description' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-single-post'); ?>>
    <div class="<?php echo esc_attr($content_inner_cls);?>">
        <?php if (has_post_thumbnail() && ($feature_image_display == 'show')) {
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $sg_featured_img_size,
            ) );
            $thumbnail    = $img['thumbnail']; ?>
            <div class="pxl-item-image">
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php } 
        stotage()->blog->get_post_metas();
        ?>
        <?php if ($title_post == 'show') { ?>
            <h2 class="pxl-item--title">
                <?php the_title(); ?>
            </h2>
        <?php } ?>
        
        <div class="post-content overflow-hidden">
            <div class="content-inner clearfix <?php echo esc_attr($post_content_classes);?>">
                <?php the_content(); ?>
            </div>
            <div class="<?php echo trim(implode(' ', ['navigation page-links clearfix empty-none'])); ?>">
                <?php wp_link_pages();  ?>
            </div>
        </div>
        <?php
        $post_social_share = stotage()->get_theme_opt( 'post_social_share', true );
        $post_tag = stotage()->get_theme_opt( 'post_tag', true );
        if ($post_social_share == '1'){ ?>
            <div class="post-tags-share ">
                <?php
                if ($post_tag == '1'){
                    ?><div class="post-tags-wrap "><?php stotage()->blog->get_post_tags(); ?></div><?php
                }
                if ($post_social_share == '1'){ ?>
                    <div class="post-share-wrap ">
                        <?php stotage()->blog->get_post_share(); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if($box_info) : ?>
            <div class="pxl-author--info">
                <div class="entry-author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                </div>
                <div class="entry-author-meta">
                    <span class="author-position">
                        <?php echo esc_html($post_author_position); ?>
                    </span>
                    <h5 class="author-name">
                        <?php the_author_posts_link(); ?>
                    </h5>
                    <?php if(!empty($post_author_description)) : ?>
                     <div class="author-description">
                        <?php echo esc_html( $post_author_description ); ?>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    <?php endif; ?>
    <?php stotage()->blog->get_post_nav(); ?>
</div>
</article>