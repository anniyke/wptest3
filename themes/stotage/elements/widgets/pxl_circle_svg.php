<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_circle_svg',
        'title' => esc_html__('Circle SVG BR ', 'stotage'),
        'icon' => 'eicon-library-upload icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(  
                array(
                    'name' => 'section_path',
                    'label' => esc_html__('Path Svg', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'path_svg_text',
                            'label' => esc_html__( 'Path', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => '<path opacity="0.5" d="M-14.9456 461.346C48.5506 439.593 219.725 419.185 396.455 511.575C617.367 627.062 885.327 661.482 1047.16 455.635C1208.99 249.787 1219.85 132.538 1613.03 169.184C1695.21 175.915 1872.69 151.729 1925.22 1.13761" stroke="#9F90FF" stroke-width="3"/>',
                        ),
                        array(
                            'name' => 'color_box_shadow',
                            'label' => esc_html__( 'Box Shadow Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg svg' => 'filter: drop-shadow(0px 14px 10px {{VALUE}});',

                            ],
                        ),
                        array( 
                            'name' => 'bg_parallax_height',
                            'label' => esc_html__('SVG Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                            ],
                            'mobile_default' => [
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vh' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],                         
                        )
                    ),
                ),          
                array(
                    'name' => 'section_dot1',
                    'label' => esc_html__('Dot Left', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'dot1_color_linear',
                            'label' => esc_html__( 'Dot Left Background Linear', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'dot1_color_one',
                            'label' => esc_html__( 'Dot Left Background Color One', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .linear-dot1 .stop1' => 'stop-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'dot1_color_linear' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'dot1_color_two',
                            'label' => esc_html__( 'Dot Left Background Color Two', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .linear-dot1 .stop2' => 'stop-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'dot1_color_linear' => 'true'
                            ]
                        ),
                        array(
                            'name'         => 'dot1_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'stotage' ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .filter1 feFlood' => 'flood-color: {{VALUE}} !important;',
                            ],
                            'type' => \Elementor\Controls_Manager::COLOR,                            
                        ),
                    ),
                ),
                array(
                    'name' => 'section_dot2',
                    'label' => esc_html__('Dot Right', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'dot2_color_linear',
                            'label' => esc_html__( 'Dot Right Background Linear', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'dot2_color_one',
                            'label' => esc_html__( 'Dot Right Background Color One', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .linear-dot2 .stop1' => 'stop-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'dot2_color_linear' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'dot2_color_two',
                            'label' => esc_html__( 'Dot Right Background Color Two', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .linear-dot2 .stop2' => 'stop-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'dot2_color_linear' => 'true'
                            ]
                        ),
                        array(
                            'name'         => 'dot2_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'stotage' ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-svg .filter1 feFlood' => 'flood-color: {{VALUE}} !important;',
                            ],
                            'type' => \Elementor\Controls_Manager::COLOR,                            
                        ),
                    ),
                ),
            ),
),
),
stotage_get_class_widget_path()
);