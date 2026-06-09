<?php
/**
 * @package Case-Themes
 */

get_header();
$custom_class = stotage()->get_theme_opt('custom_class'); 
$stotage_sidebar = stotage()->get_sidebar_args(['type' => 'blog', 'content_col'=> '9']); ?>
<div class="container <?php echo esc_attr($custom_class); ?>">
    <div class="row <?php echo esc_attr($stotage_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($stotage_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/archive/standard' );
                    }
                    stotage()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </div>
        <?php if ($stotage_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($stotage_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
