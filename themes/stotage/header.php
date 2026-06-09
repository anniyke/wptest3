<?php
/**
 * @package Case-Themes
 */
$display_404 = stotage()->get_opt('404_display');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="pxl-wapper" class="pxl-wapper">
        <?php 
        stotage()->page->get_site_loader();
        if (is_404() && $display_404 != 'df') {
        } else {
            stotage()->header->getHeader();
        }

        if (!is_404()) {
            stotage()->page->get_page_title();
        }
        ?>
        <div id="pxl-main">
