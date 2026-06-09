<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_chart',
        'title' => esc_html__('BR Chart', 'stotage' ),
        'icon' => 'eicon-accordion icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-chart',
            'chart',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_chart/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_chart/layout-image/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'chart_section',
                    'label'    => esc_html__( 'Chart Content', 'stotage' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'pxl_chart',
                                'label'   => esc_html__( 'Chart Items', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(

                                    // array(
                                    //     'name'  => 'label_line_title',
                                    //     'label' => esc_html__( 'Label Line Chart', 'stotage' ),
                                    //     'type'  => \Elementor\Controls_Manager::TEXT,
                                    // ),
                                    array(
                                        'name'  => 'chart_title',
                                        'label' => esc_html__( 'Title', 'stotage' ),
                                        'type'  => \Elementor\Controls_Manager::TEXT,
                                    ),
                                    array(
                                        'name'  => 'chart_value',
                                        'label' => esc_html__( 'Value', 'stotage' ),
                                        'type'  => \Elementor\Controls_Manager::NUMBER,
                                    ),
                                    array(
                                        'name'  => 'chart_color',
                                        'label' => esc_html__( 'Color', 'stotage' ),
                                        'type'  => \Elementor\Controls_Manager::COLOR, 
                                    ),
                                    
                                ),
                                'default' => [
                                    [
                                        'chart_title'      => 'Retail',
                                        'chart_value'      => 40,
                                        'chart_color'      => '#9bcb3b',
                                    ],
                                    [
                                        'chart_title'      => 'Sciences',
                                        'chart_value'      => 20,
                                        'chart_color'      => '#5553ce',
                                    ],
                                    [
                                        'chart_title'      => 'Industrial',
                                        'chart_value'      => 15,
                                        'chart_color'      => '#f13a30',
                                    ],
                                    [
                                        'chart_title'      => 'Power',
                                        'chart_value'      => 15,
                                        'chart_color'      => '#f8a137',
                                    ],
                                    [
                                        'chart_title'      => 'Oil & Gas',
                                        'chart_value'      => 10,
                                        'chart_color'      => '#1875f0',
                                    ]
                                ],
                                'title_field' => '{{{ chart_title }}} ({{{ chart_value }}})',
                                'separator'   => 'after',
                            ),
                            array(
                                'name' => 'h_width',
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
                                    '{{WRAPPER}} .pxl-chart ' => 'width: {{SIZE}}{{UNIT}} !important;',
                                ],
                            ),
                        )
)
),
array(
    'name'     => 'style_section',
    'label'    => esc_html__( 'Style Settings', 'stotage' ),
    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => [

        array(
            'name'  => 'chart_border_color',
            'label' => esc_html__( 'Line Color', 'stotage' ),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout' => ['1'],
            ],
        ),

        array(
            'name'         => 'pxl_chart_dimensions',
            'label'        => esc_html__( 'Chart Dimensions', 'stotage' ),
            'type'         => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => 100,
                    'max' => 1000,
                ]
            ],
            'condition' => [
                'layout' => ['2'],
            ],
            'default' => [
                'size' => 400
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-chart canvas' => 'height:{{SIZE}}px !important;',
                '{{WRAPPER}} .pxl-chart .chart-bar' => 'width:{{SIZE}}px !important;',
            ],
            'separator' => 'before'
        ),
        
        array(
            'name'         => 'chart_border_width',
            'label'        => esc_html__( 'Chart Border Width (Line Width) ', 'stotage' ),
            'description' => ' Value > 0',
            'type'         => \Elementor\Controls_Manager::NUMBER,
            'control_type' => 'responsive',
            'separator' => 'before'
        ),
        
        array(
            'name' => 'boxcolor',
            'label' => esc_html__('Box Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-chart' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'width_chart',
            'label' => esc_html__( 'Cutout', 'stotage' ),
            'type'  => \Elementor\Controls_Manager::NUMBER,
            'condition' => [
                'layout' => ['2'],
            ],
        ),
    ]
),
array(
    'name'     => 'style_section_tyle',
    'label'    => esc_html__( 'Title Style', 'stotage' ),
    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['2'],
    ],
    'controls' => [
        array(
            'name' => 'tl_typography',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-chart .list-content .title',
        ),
        array(
            'name' => 'color_tl',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-chart .list-content .title' => 'color: {{VALUE}};',
            ],
        ),
    ]
),
stotage_widget_animation_settings(),
),
),
),stotage_get_class_widget_path()
);