<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_link',
        'title' => esc_html__('BR Links', 'stotage'),
        'icon' => 'eicon-editor-link icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'l_width',
                            'label' => esc_html__('Max Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Link', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'type',
                            'label' => esc_html__('Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'type-vertical' => 'Vertical',
                                'type-horizontal' => 'Horizontal',
                            ],
                            'default' => 'type-vertical',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-divider' => 'Style 2 - Divider',
                                'style-3' => 'Style 3',
                                'style-underline' => 'Underline',
                            ],
                            'default' => 'style-default',
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'stotage' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:not(:hover)' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_divider',
                            'label' => esc_html__('Color Divider', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:before, {{WRAPPER}} .pxl-link a:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-divider'],
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link a',
                        ),
                        array(
                            'name' => 'link_typography_hover',
                            'label' => esc_html__('Typography Hover', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link a:hover',
                        ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__('Vertical Spacer', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-link.type-vertical li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-vertical'],
                            ],
                        ),
                        array(
                            'name' => 'left_spacer',
                            'label' => esc_html__('Horizontal Spacer Left', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                        array(
                            'name' => 'right_spacer',
                            'label' => esc_html__('Horizontal Spacer Right', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-right: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}} ',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__( 'Flex Start', 'stotage' ),
                                    'icon' => 'far fa-arrow-alt-to-top',
                                ],
                                'Center' => [
                                    'title' => esc_html__( 'Center', 'stotage' ),
                                    'icon' => 'far fa-arrows-alt-v',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__( 'Flex End', 'stotage' ),
                                    'icon' => 'far fa-arrow-alt-to-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li a' => 'align-items: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        stotage_widget_color_type([
                            'prefix' => 'icon',
                            'selectors_class' => '.pxl-link a i',
                        ]),
                        array(
                            array(
                                'name' => 'icon_color_hv',
                                'label' => esc_html__( 'Color Hover', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a:hover i' => 'color: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'icon_color_svg',
                                'label' => esc_html__( 'Color Svg', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a svg path' => 'fill: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'box_color',
                                'label' => esc_html__( 'Box Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a i' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space_top',
                                'label' => esc_html__('Top Spacer', 'stotage' ),
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
                                    '{{WRAPPER}} .pxl-link a i' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space_left',
                                'label' => esc_html__('Left Spacer', 'stotage' ),
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
                                    '{{WRAPPER}} .pxl-link a i, {{WRAPPER}} .pxl-link a svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space_right',
                                'label' => esc_html__('Right Spacer', 'stotage' ),
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
                                    '{{WRAPPER}} .pxl-link a i, {{WRAPPER}} .pxl-link a svg' => 'margin-right: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .pxl-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-link a svg' => 'height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-link.style-3 a:hover i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'icon_width',
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
                                    '{{WRAPPER}} .pxl-link a i' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_box_width',
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
                                    '{{WRAPPER}} .pxl-link a i' => 'height: {{SIZE}}{{UNIT}};justify-content: center; align-items: center;',
                                ],
                            ),
                            array(
                                'name' => 'icon_border_radius',
                                'label' => esc_html__('Box Border Radius', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);