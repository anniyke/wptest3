<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('BR Counter', 'stotage'),
        'icon' => 'eicon-counter-circle icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'stotage-counter',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
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
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ',' => 'Comma',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'style-2' => 'Style 2',
                            ],
                            'condition' => [
                                'layout' => '1'
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'effect',
                            'label' => esc_html__('Effect', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'effect-default' => 'Default',
                                'effect-slide' => 'Slide',
                            ],
                            'default' => 'effect-default',
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
                            '{{WRAPPER}} .pxl-counter' => 'text-align: {{VALUE}};',
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
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_number',
                    'label' => esc_html__('Number', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_long',
                            'label' => esc_html__('Border Line Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' =>esc_html__('From 0 to 927', 'stotage' ),
                            'px' => [
                                'min' => 0,
                                'max' => 927,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter svg path' => 'stroke-dashoffset: {{SIZE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width_outline_gradient',
                            'label' => esc_html__('Border Rotate', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 360,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter svg ' => 'transform: rotate({{SIZE}}deg);',
                            ],
                        ),

                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number,{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--value' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--value',
                        ),
                        array(
                            'name' => 'prefix_suffix_color',
                            'label' => esc_html__('Prefix/Suffix Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix, {{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'number_color_type' => ['color'],
                            ],
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Animation Duration', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min' => 100,
                            'step' => 100,
                        ),
                        array(
                            'name' => 'number_space_top',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'number_space_l',
                            'label' => esc_html__('Left Spacer', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'number_space_r',
                            'label' => esc_html__('Right Spacer', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'number_space_bottom',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_number_suf',
    'label' => esc_html__('Suffix', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'suf_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'suf_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix',
        ),
        array(
            'name' => 'number_space_tb',
            'label' => esc_html__('Transform Y', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'transform: translatey({{SIZE}}{{UNIT}});',
            ],
        ),
        array(
            'name' => 'number_space_lr',
            'label' => esc_html__('Padding Left/Right', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'margin-left:{{SIZE}}{{UNIT}};',
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