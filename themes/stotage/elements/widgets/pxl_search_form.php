<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_search_form',
        'title' => esc_html__('BR Search Form', 'stotage' ),
        'icon' => 'eicon-site-search icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'email_placefolder',
                            'label' => esc_html__('Email Placefolder', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);