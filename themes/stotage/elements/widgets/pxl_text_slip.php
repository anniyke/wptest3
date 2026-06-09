<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_slip',
        'title' => esc_html__('BR Title Slip', 'stotage' ),
        'icon' => 'eicon-heading icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'color_item',
                                    'label' => esc_html__( 'Color', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-text-slip1 {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'title_typography',
                                    'label' => esc_html__('Typography', 'stotage' ),
                                    'type' => \Elementor\Group_Control_Typography::get_type(),
                                    'control_type' => 'group',
                                    'selector' => '{{WRAPPER}} .pxl-text-slip1 {{CURRENT_ITEM}}',
                                ),
                                
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Link Box', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Text', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_tag',
                            'label' => esc_html__('HTML Tag', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-slip .pxl-item--container' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'i_color',
                            'label' => esc_html__('Icon Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-slip svg path' => 'fill: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-text-slip i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'i_fsize',
                            'label' => esc_html__('Icon Size', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-text-slip svg ' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-text-slip i ' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-text-slip1 .pxl-item--inner' => 'column-gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-slip .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-text-slip .pxl-item--text svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-text-slip .pxl-item--text i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-slip .pxl-item--text',
                        ),
                        array(
                            'name' => 'text_effect',
                            'label' => esc_html__('Effect', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-effect' => 'None',
                                'pxl-slide-to-left' => 'Slide Right To Left',
                                'pxl-slide-to-right' => 'Slide Left To Right',
                            ],
                            'default' => 'no-effect',
                        ),
                        array(
                            'name' => 'effect_speed',
                            'label' => esc_html__('Effect Speed', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Default: 10000 - Unit: ms',
                            'condition' => [
                                'text_effect' => ['pxl-slide-to-left', 'pxl-slide-to-right'],
                            ],
                        ),
                    ),
),stotage_widget_animation_settings(),
),
),
),stotage_get_class_widget_path()
);