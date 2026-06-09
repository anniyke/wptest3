<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('BR Pricing', 'stotage'),
        'icon' => 'eicon-settings icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'stotage' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pri',
                            'label' => esc_html__('Price', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'plan_text',
                                    'label' => esc_html__('Plan', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pri_month',
                                    'label' => esc_html__('Pricing', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pri_extra',
                                    'label' => esc_html__('Pricing Extra', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ plan_text }}}',
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'extra_text',
                            'label' => esc_html__('Extra Text ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('List Feature', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Button Link', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                         array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('Box', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Content Padding', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .content-inner' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'stotage' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-pricing',
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
                                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_tlb',
                    'label' => esc_html__('Title Box', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'tlb_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--title-box',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--title-box' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_pr',
                    'label' => esc_html__('Pricing', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'pr_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price , {{WRAPPER}} .pxl-pricing .pxl-item--price span',
                        ),
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--price , {{WRAPPER}} .pxl-pricing .pxl-item--price span' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_des',
                    'label' => esc_html__('Description', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        
                        array(
                            'name' => 'ds_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-desc',
                        ),
                        array(
                            'name' => 'des_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-desc' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_feature',
                    'label' => esc_html__('Feature', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'ft_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content',
                        ),
                        array(
                            'name' => 'feature_color',
                            'label' => esc_html__('Feature Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content svg path' => 'fill: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ic_color_noactive',
                            'label' => esc_html__('Feature Color (No Active)', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active svg path' => 'fill: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active .content' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__(' Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .btn-glossy' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'button_color_hv',
                            'label' => esc_html__(' Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .btn-glossy:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bgbutton_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .btn-glossy' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bgbutton_color_hv',
                            'label' => esc_html__('Background Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .btn-glossy:hover' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),stotage_widget_animation_settings(),
            ),
        ),
    ),stotage_get_class_widget_path()
);