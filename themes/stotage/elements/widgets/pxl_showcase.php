<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('BR Showcase', 'stotage'),
        'icon' => 'eicon-parallax icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                                'name' => 'box_padding',
                                'label' => esc_html__('Box Padding', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-showcase .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};width:auto !important;height:auto !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title a',
                            
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Button Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--readmore a',
                          
                        ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding Button', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-showcase .pxl-item--readmore a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};width:auto !important;height:auto !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'stotage'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Button Link 2', 'stotage'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => '',
                        ),
                    ),
                ),
stotage_widget_animation_settings(),
            ), 
        ),
    ),
    stotage_get_class_widget_path()
);