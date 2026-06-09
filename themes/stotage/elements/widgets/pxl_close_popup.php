<?php
$templates_df = ['0' => esc_html__('None', 'stotage')];
$templates = $templates_df + stotage_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_close_popup',
        'title' => esc_html__('BR Close Popup', 'stotage' ),
        'icon' => 'eicon-editor-close icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Close', 'stotage' ),
                        ),
                        array(
                            'name' => 'fs',
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
                                '{{WRAPPER}} .pxl-close-popup' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_coloraa',
                            'label' => esc_html__('Icon Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgicon_color',
                            'label' => esc_html__('Background Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup:hover' => 'background-color: {{VALUE}};',
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