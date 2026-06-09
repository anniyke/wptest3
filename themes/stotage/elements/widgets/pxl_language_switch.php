<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switch',
        'title' => esc_html__('BR Language Switch', 'stotage'),
        'icon' => 'eicon-kit-parts icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text_first',
                            'label' => esc_html__('Default', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'language',
                            'label' => esc_html__('Language', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
                        ),
                    ),
                ),
                array(
                    'name'     => 'style_section_tyle',
                    'label'    => esc_html__( 'Style', 'stotage' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => [
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color Text', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .language-first,{{WRAPPER}} .language-first i' => 'color: {{VALUE}};',
                            ],
                        ),
                         array(
                            'name' => 'icolor',
                            'label' => esc_html__('Arrow Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .language-first i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgcolor_1',
                            'label' => esc_html__('Background Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .language-first' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bdcolor',
                            'label' => esc_html__('Border Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .language-first' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'tt_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .language-first',
                        ),
                    ]
                ),
                array(
                    'name'     => 'style_section_sub_tyle',
                    'label'    => esc_html__( 'Sub Style', 'stotage' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => [
                        array(
                            'name' => 'bgcolor',
                            'label' => esc_html__('Background Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch .list-language ' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bdscolor',
                            'label' => esc_html__('Border Color ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch .list-language ' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'scolor',
                            'label' => esc_html__('Color Text', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch .list-language  a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'tts_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switch .list-language  a',
                        ),
                    ]
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);