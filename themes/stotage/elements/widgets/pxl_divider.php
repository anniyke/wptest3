<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_divider',
        'title' => esc_html__('BR Divider', 'stotage' ),
        'icon' => 'eicon-divider icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'divider_color_from',
                            'label' => esc_html__('Background Color From', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => '--gradient-color-from: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_color_to',
                            'label' => esc_html__('Background Color To', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => '--gradient-color-to: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_width',
                            'label' => esc_html__('Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider.visible' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_height',
                            'label' => esc_html__('Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);