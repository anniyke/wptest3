<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pie_chart',
        'title' => esc_html__('BR Pie Chart', 'stotage'),
        'icon' => 'far fa-chart-pie-alt icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-pie-chart',
            'stotage-pie-chart',
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'stotage-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pie_chart/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pie_chart/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'percentage_value',
                            'label' => esc_html__('Percentage Value', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 100,
                            'step' => 1,
                            'default' => 50,
                        ),
                        array(
                            'name' => 'chart_size',
                            'label' => esc_html__('Chart Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 178,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1170,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'counter_number',
                            'label' => esc_html__('Counter Number', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'counter_suffix',
                            'label' => esc_html__('Counter Suffix', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Title', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-title span' => 'text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-item-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__('Percentage', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Bar Color From', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'bar_color_to',
                            'label' => esc_html__('Bar Color To', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item--divider' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'chart_line_width',
                            'label' => esc_html__('Chart Line Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 10,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'chart_line_cap',
                            'label' => esc_html__('Chart Line Cap', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'square' => 'Square',
                                'round' => 'Round',
                            ],
                            'default' => 'square',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_counter',
                    'label' => esc_html__('Counter', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'counter_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl--counter-number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl--counter-number',
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);