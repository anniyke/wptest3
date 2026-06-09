<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('BR Nav Carousel', 'stotage'),
        'icon' => 'eicon-animation icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow:hover svg path ' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Type Background', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'stotage' ),
                                'gradient' => esc_html__('Gradient', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow ' => 'background-color: {{VALUE}} !important; border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['default'],
                            ],
                        ),
                        array(
                            'name' => 'bg_color_hv',
                            'label' => esc_html__('Background Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow:hover ' => 'background-color: {{VALUE}} !important;border-color: transparent !important;',
                            ],
                            'condition' => [
                                'style' => ['default'],
                            ],
                        ),
                        array(
                            'name' => 'bd_color',
                            'label' => esc_html__('Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow ' => 'border-color: {{VALUE}} ; ',
                            ],
                        ),
                        array(
                            'name' => 'fs_ic',
                            'label' => esc_html__('Font Size Icon', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-navigation-arrow svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bs_ic',
                            'label' => esc_html__('Box Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);