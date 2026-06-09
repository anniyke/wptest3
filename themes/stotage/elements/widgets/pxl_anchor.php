<?php
$templates_df = ['0' => esc_html__('None', 'stotage')];
$templates_lv1 = ['1' => esc_html__('Hidden Panel Mobile', 'stotage')];
$templates = $templates_df + $templates_lv1 + stotage_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_anchor',
        'title' => esc_html__('BR Anchor', 'stotage' ),
        'icon' => 'eicon-anchor icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT, 
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'stotage'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'icon' => 'Icon',
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Select Icon', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon_text',
                            'label' => esc_html__('Text Icon', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon2',
                            'label' => esc_html__('Select Icon doc', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_text_doc',
                            'label' => esc_html__('Text Doc', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'link_doc',
                            'label' => esc_html__('Link Doc', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button .pxl-icon-dot' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bd_icon_color',
                            'label' => esc_html__('Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-anchor-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_close_animate_delay',
                            'label' => esc_html__('Close Popup - Animation Delay', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'padding_active',
                            'label' => esc_html__('Padding Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'color_text_tooltip',
                            'label' => esc_html__('Color Text Tooltip', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .text-tooltip' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'width: {{SIZE}}{{UNIT}}; align-items: center; justify-content: center; display: inline-flex;',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__( 'Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'background-color: {{VALUE}};',
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