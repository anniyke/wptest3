<?php
$templates_df = ['0' => esc_html__('None', 'stotage')];
$templates = $templates_df + stotage_get_templates_option('popup') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'stotage' ),
        'icon' => 'eicon-button icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'stotage' ),
                                'full' => esc_html__('Full Width', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'stotage'),
                        ),
                        array(
                            'name' => 'btn_action',
                            'label' => esc_html__('Action', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-atc-link',
                            'options' => [
                                'pxl-atc-link' => esc_html__('Link', 'stotage' ),
                                'pxl-atc-popup' => esc_html__('Popup', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'btn_action' => ['pxl-atc-link'],
                            ],
                        ),

                        array(
                            'name' => 'popup_template',
                            'label' => esc_html__('Select Popup Template', 'stotage'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                            'condition' => [
                                'btn_action' => ['pxl-atc-popup'],
                            ],
                        ),

                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'stotage' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'stotage' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'stotage' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'stotage' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'stotage' ),
                                'right' => esc_html__('After', 'stotage' ),
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'bt_style',
                                'label' => esc_html__('Style', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'btn-style-2',
                                'options' => [
                                    'bg-default' => esc_html__('Style 1', 'stotage' ),
                                    'btn-style-2' => esc_html__('Style 2', 'stotage' ),
                                ],
                            ),
                            array(
                                'name' => 'color',
                                'label' => esc_html__('Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color',
                                'label' => esc_html__('Background Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_typography',
                                'label' => esc_html__('Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-button .btn',
                            ),
                            array(
                                'name'         => 'btn_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'stotage' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-button .btn',
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
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                        ),

                        array(
                            array(
                                'name' => 'btn_border_radius',
                                'label' => esc_html__('Border Radius', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_text_effect',
                            'label' => esc_html__('Text Effect', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'stotage' ),
                                'no-ef' => esc_html__('No Effect', 'stotage' ),
                                'btn-text-nina' => esc_html__('Nina', 'stotage' ),
                                'btn-text-nanuk' => esc_html__('Nanuk', 'stotage' ),
                                'btn-text-smoke' => esc_html__('Smoke', 'stotage' ),
                                'btn-text-reverse' => esc_html__('Reverse', 'stotage' ),
                                'btn-text-parallax' => esc_html__('Text Parallax', 'stotage' ),
                                'btn-hide-icon' => esc_html__('Hide Icon', 'stotage' ),
                                'btn-glossy' => esc_html__('Glossy', 'stotage' ),
                                'btn-underline' => esc_html__('Underline', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'transition_duration',
                            'label' => esc_html__('Transition Duration', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .btn.btn-text-reverse .pxl-text--inner span' => 'transition-duration: {{SIZE}}ms;',
                            ],
                            'condition' => [
                                'btn_text_effect' => ['btn-text-reverse'],
                            ],
                            'description' => 'Enter number, unit is ms.',
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn:hover pc' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-hide-icon .pxl--btn-text:before' => 'background-color: {{VALUE}} !important;',
                            ],
                                
                        ),
                        array(
                            'name' => 'bd_color_hover',
                            'label' => esc_html__('Border Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => ' border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'stotage' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_hv_color',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn:hover svg path' => 'fill: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-button .btn-svg:hover svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'width_box_icon',
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height_box_icon',
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color_hv',
                            'label' => esc_html__('Box Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover i' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--left:hover  svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--right:hover svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
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