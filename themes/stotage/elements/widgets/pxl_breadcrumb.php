<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_breadcrumb',
        'title' => esc_html__('BR Breadcrumb', 'stotage' ),
        'icon' => 'eicon-yoast icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb,{{WRAPPER}} .pxl-breadcrumb a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-breadcrumb li + li a svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ic_color',
                            'label' => esc_html__('Icon Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'active_color',
                            'label' => esc_html__('Active Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb span.breadcrumb-entry' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_color',
                            'label' => esc_html__('Hover Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-breadcrumb',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                              'flex-start' => [
                                  'title' => esc_html__( 'Left', 'stotage' ),
                                  'icon' => 'eicon-text-align-left',
                              ],
                              'center' => [
                                  'title' => esc_html__( 'Center', 'stotage' ),
                                  'icon' => 'eicon-text-align-center',
                              ],
                              'flex-end' => [
                                  'title' => esc_html__( 'Right', 'stotage' ),
                                  'icon' => 'eicon-text-align-right',
                              ],
                          ],
                          'selectors' => [
                              '{{WRAPPER}} .pxl-breadcrumb' => 'justify-content: {{VALUE}};',
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