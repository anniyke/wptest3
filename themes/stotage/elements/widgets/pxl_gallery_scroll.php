<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_gallery_scroll',
        'title' => esc_html__('BR Image Scroll', 'stotage'),
        'icon' => 'eicon-image-before-after icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(        
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list_image',
                            'label' => esc_html__('Content', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'description' => esc_html__('Add 5 Items', 'stotage'),
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Button Link', 'stotage'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-img-scroll .wrap-content .content .title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-img-scroll .wrap-content .content .title',
                        ),
                        array(
                            'name' => 'title_i_typography',
                            'label' => esc_html__('Tag i Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-img-scroll .wrap-content .content .title i',
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);