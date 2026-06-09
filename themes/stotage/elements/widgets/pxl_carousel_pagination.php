<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_carousel_pagination',
        'title' => esc_html__('BR Carousel Pagination', 'stotage'),
        'icon' => 'eicon-animation icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_alignment_section',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);