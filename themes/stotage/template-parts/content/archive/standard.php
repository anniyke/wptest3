<?php
/**
 * @package Stotage
 */

$post_social_share = stotage()->get_theme_opt( 'post_social_share', false );
$featured_img_size = stotage()->get_theme_opt('featured_img_size', '900x550');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-archive-post'); ?>>
    <div class="content-inner-post">
        <?php if (has_post_thumbnail()) {?>
            <div class="pxl-item-image">
                <a href="<?php echo esc_url( get_permalink()); ?>">
        <?php if (has_post_thumbnail()) {
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $featured_img_size,
            ) );
            $thumbnail    = $img['thumbnail']; ?>
            <div class="pxl-item-image">
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php } ?>
                        
                    </a>
            </div>
        <?php } ?>
        <div class="post-featured">
            <div class="post-content">
                <?php stotage()->blog->get_archive_meta_2(); ?>
                <h2 class="post-title">
                    <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                        <?php if(is_sticky()) { ?>
                            <i class="caseicon-check"></i>
                        <?php } ?>
                        <?php the_title(); ?>
                    </a>
                </h2>
            </div>
        </div>
    </div>
</article>