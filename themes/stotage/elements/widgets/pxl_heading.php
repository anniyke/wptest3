<?php
// 'pxl-splitting',
// 'pxl-typography-animation',
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('BR Heading', 'stotage' ),
        'icon' => 'eicon-heading icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"] and Highlight text with shortcode: [highlight text="Text"]',
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
                            '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                        ],
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
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
                            'name' => 'title_color_type',
                            'label' => esc_html__('Title Color Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'color' => 'Default',
                                'gradient' => 'Gradient',
                            ],
                            'default' => 'color',

                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['color'],
                            ],
                        ),
                        array(
                            'name' => 'title_color_from',
                            'label' => esc_html__('Title Color From', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'title_color_to',
                            'label' => esc_html__('Title Color To', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'custom_font',
                            'label' => esc_html__('Custom Font Family', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                'ft-gt' => 'Inter',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'stotage' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_transform',
                            'label' => esc_html__('Transform Rotate', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 360,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'transform:rotate( {{SIZE}}deg);',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'no-wrap' => 'No Wrap',
                                'style-outline' => 'Outline',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR  Animate', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => stotage_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
),
array(
    'name' => 'section_style_title_sub',
    'label' => esc_html__('Sub Title', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name' => 'sub_title_style',
                'label' => esc_html__('Style', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'px-sub-title-default' => 'Default',
                    'px-sub-title-2' => 'Style 2',
                ],
                'default' => 'px-sub-title-default',
            ),

            array(
                'name' => 'sub_title_color',
                'label' => esc_html__('Color', 'stotage' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                ],
            ),
            
            array(
                'name' => 'sub_title_typography',
                'label' => esc_html__('Typography', 'stotage' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle',
            ),

            array(
                'name' => 'sub_title_space_top',
                'label' => esc_html__('Top Spacer', 'stotage' ),
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
                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'sub_title_space_bottom',
                'label' => esc_html__('Bottom Spacer', 'stotage' ),
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
                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'pxl_animate_sub',
                'label' => esc_html__('BR  Animate', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stotage_widget_animate_v2(),
                'default' => '',
            ),
            array(
                'name' => 'pxl_animate_delay_sub',
                'label' => esc_html__('Animate Delay', 'stotage' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0',
                'description' => 'Enter number. Default 0ms',
            ),
        )
),
),
array(
    'name' => 'section_style_highlight',
    'label' => esc_html__('Highlight', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name' => 'highlight_style',
                'label' => esc_html__('Style', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'highlight-default' => 'Default',
                    'highlight-text-gradient' => 'Text Gradient',
                ],
                'default' => 'highlight-default',
            ),
            array(
                'name' => 'highlight_color',
                'label' => esc_html__('Color', 'stotage' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'highlight_style' => ['highlight-default'],
                ],
            ),
            array(
                'name' => 'highlight_color_from',
                'label' => esc_html__('Color From', 'stotage' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    'highlight_style' => ['highlight-text-gradient'],
                ],
            ),
            array(
                'name' => 'highlight_color_to',
                'label' => esc_html__('Color To', 'stotage' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    'highlight_style' => ['highlight-text-gradient'],
                ],
            ),
            array(
                'name' => 'highlight_typography',
                'label' => esc_html__('Typography', 'stotage' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
            ),
            array(
                'name' => 'highlight_text_image',
                'label' => esc_html__( 'Text Image', 'stotage' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-image: url( {{URL}} );',
                ],  
            ),
            array(
                'name' => 'highlight_image_position',
                'label' => esc_html__( 'Text Image Position', 'stotage' ),
                'type'         => \Elementor\Controls_Manager::SELECT,
                'options'      => array(
                    ''              => esc_html__( 'Default', 'stotage' ),
                    'center center' => esc_html__( 'Center Center', 'stotage' ),
                    'center left'   => esc_html__( 'Center Left', 'stotage' ),
                    'center right'  => esc_html__( 'Center Right', 'stotage' ),
                    'top center'    => esc_html__( 'Top Center', 'stotage' ),
                    'top left'      => esc_html__( 'Top Left', 'stotage' ),
                    'top right'     => esc_html__( 'Top Right', 'stotage' ),
                    'bottom center' => esc_html__( 'Bottom Center', 'stotage' ),
                    'bottom left'   => esc_html__( 'Bottom Left', 'stotage' ),
                    'bottom right'  => esc_html__( 'Bottom Right', 'stotage' ),
                    'initial'       =>  esc_html__( 'Custom', 'stotage' ),
                ),
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-position: {{VALUE}};',
                ],
                'condition' => [
                    'highlight_text_image[url]!' => ''
                ]        
            ),
            array(
                'name' => 'highlight_image_size',
                'label' => esc_html__( 'Text Image Size', 'stotage' ),
                'type'         => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''              => esc_html__( 'Default', 'stotage' ),
                    'auto' => esc_html__( 'Auto', 'stotage' ),
                    'cover'   => esc_html__( 'Cover', 'stotage' ),
                    'contain'  => esc_html__( 'Contain', 'stotage' ),
                    'initial'    => esc_html__( 'Custom', 'stotage' ),
                ),
                'default'      => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-size: {{VALUE}};',
                ],
                'condition' => [
                    'highlight_text_image[url]!' => ''
                ]        
            ),
        )
),
),

array(
    'name' => 'section_style_typewriter',
    'label' => esc_html__('Typewriter', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name' => 'typewriter_color',
                'label' => esc_html__('Color', 'stotage' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-title--typewriter' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'typewriter_typography',
                'label' => esc_html__('Typography', 'stotage' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--typewriter',
            ),
        )
    ),
),
),
),
),
stotage_get_class_widget_path()
);