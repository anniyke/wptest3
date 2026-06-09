<?php
// Register Text Editor
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_editor',
        'title' => esc_html__('BR Text Editor', 'stotage'),
        'icon' => 'eicon-text icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Text Editor', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text_ed',
                            'label' => '',
                            'type' => Controls_Manager::WYSIWYG,
                            'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'stotage' ),
                            'description' => 'Create Highlight text width shortcode: [pxl_highlight text="Text Demo"]',
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'stotage' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'stotage' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'stotage' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'stotage' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 't_width',
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
                                '{{WRAPPER}} .pxl-text-editor .pxl-item--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__( 'Text', 'stotage' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                'image-hv' => 'Hover Image',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__( 'Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor , {{WRAPPER}} .pxl-text-editor p' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_cl_stroke',
                            'label' => esc_html__( 'Color Stroke', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'condition' => [
                                'style' => ['image-hv'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor a, {{WRAPPER}} .pxl-text-editor p' => '-webkit-text-stroke-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'stotage' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor , {{WRAPPER}} .pxl-text-editor p',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_quote',
                    'label' => esc_html__( 'Block Quote', 'stotage' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'textb_color',
                            'label' => esc_html__( 'Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor blockquote, {{WRAPPER}} .pxl-text-editor blockquote p' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'textb_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'stotage' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor blockquote, {{WRAPPER}} .pxl-text-editor blockquote p',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__( 'Link', 'stotage' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_hv',
                            'label' => esc_html__('Style Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'stotage' ),
                                'underline' => esc_html__('Underline', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__( 'Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__( 'Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor a:hover' => 'color: {{VALUE}};-webkit-text-stroke-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-text-editor.underline a:hover' => 'text-decoration: underline 2px {{VALUE}} !important; -webkit-text-stroke-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'stotage' ),
                            'selector' => '{{WRAPPER}} .pxl-text-editor a',
                            'control_type' => 'group',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_highlight',
                    'label' => esc_html__('Highlight', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'highlight_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_box_color',
                            'label' => esc_html__('Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight',
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);