<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'icon_post_format',
        'title' => esc_html__('BR Icon Post Format', 'stotage' ),
        'icon' => 'eicon-cart-medium icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
              
            ),
        ),
    ),
    stotage_get_class_widget_path()
);