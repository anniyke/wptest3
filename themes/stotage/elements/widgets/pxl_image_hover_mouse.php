<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
$templates_df = ['0' => esc_html__('None', 'stotage')];
$templates = $templates_df + stotage_get_templates_option('popup') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_hover_mouse',
        'title' => esc_html__('BR Image Hover Mouse', 'stotage'),
        'icon' => 'eicon-lock-user icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-scroll-trigger',
            'gsap',
        ),
        'params' => array(
            'sections' => array(

                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list_image',
                            'label' => esc_html__('Content', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                    ),
                ),
                
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);