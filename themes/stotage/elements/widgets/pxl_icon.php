<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('BR Icons', 'stotage'),
        'icon' => 'eicon-alert icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
        ),
        'params' => array(
            'sections' => array(
                array( 
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'stotage' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'stotage' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'stotage' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Default',
                                'style-2' => 'Box',
                                'style-5' => 'Box & Label',
                                'style-7' => 'Box & Label 2',
                                'style-3' => 'Vertical',
                                'style-4' => 'Custom For Svg Logo',
                                'style-6' => 'Custom For Svg Logo 2',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'animate_hover',
                            'label' => esc_html__('Animation Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Style 1', 'stotage' ),
                                'ani1' => esc_html__('Style 2', 'stotage' ),
                                'ani2' => esc_html__('Style 3', 'stotage' ),
                                'ani3' => esc_html__('Style 4', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__( 'Icon Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-icon1 a svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-icon1 a svg circle' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-icon1 a svg rect' => 'fill: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__( 'Icon Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-icon1 a:hover svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__( 'Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color_hover',
                            'label' => esc_html__( 'Box Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'space_t_tl',
                            'label' => esc_html__('Space Bottom', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-icon-list i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon-list img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon-list svg' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-icon1 a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-icon1 a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-icon1 a' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon1 a svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'stotage' ),
                                'solid' => esc_html__( 'Solid', 'stotage' ),
                                'double' => esc_html__( 'Double', 'stotage' ),
                                'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                'groove' => esc_html__( 'Groove', 'stotage' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__( 'Border Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Margin', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon1' => 'margin-left: -{{LEFT}}{{UNIT}};margin-right: -{{RIGHT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name'         => 'ic_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'stotage' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-icon1 a'
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_t',
                    'label' => esc_html__('Title', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-list span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 't_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-list span',
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);