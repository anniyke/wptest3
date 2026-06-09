<?php
/**
 * @package case-themes
 */
$subtitle_404 = stotage()->get_theme_opt('subtitle_404');
$title_404 = stotage()->get_theme_opt('title_404');
$des_404 = stotage()->get_theme_opt('des_404');
$button_404 = stotage()->get_theme_opt('button_404');
$background_404 = stotage()->get_opt( 'background_404', ['url' => get_template_directory_uri().'/assets/img/404.webp', 'id' => '' ] );
$img_404 = stotage()->get_opt( 'img_404', ['url' => get_template_directory_uri().'/assets/img/404-image.webp', 'id' => '' ] );
$layout_404 = stotage()->get_theme_opt('404_layout');
$layout_404_count = (int)stotage()->get_theme_opt('404_layout');
$display_404 = stotage()->get_theme_opt('404_display');
get_header(); ?>
<?php if ($display_404 == 'df') { ?>
    <div class="wrap-content-404" style="background-image:url(<?php echo esc_url($background_404['url']); ?>);" >
        <div class="content-404">
            <span class="pxl-error-image">
                <img src="<?php echo esc_url($img_404['url']); ?>" alt="404">
            </span>
            <h3 class="pxl-error-title">
                <?php if (!empty($title_404)) {
                    echo pxl_print_html($title_404);
                } else{
                    echo esc_html__('Looks like here is nothing', 'stotage'); 
                } ?>

            </h3>
            <a class="btn  btn-default  btn-style-2  pxl-icon--left" href="<?php echo esc_url(home_url('/')); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none"><path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"></path></svg>
                <span> 
                    <?php if (!empty($button_404)) {
                        echo pxl_print_html($button_404);
                    } else{
                        echo esc_html__('Go Back Home', 'stotage'); 
                    } ?>
                </span>
            </a>
        </div>
    </div>
    <?php } else { ?>
        <div class="wrap-content-404" >
            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $layout_404 ); ?>
        </div>
    <?php } ?>
<?php get_footer();
