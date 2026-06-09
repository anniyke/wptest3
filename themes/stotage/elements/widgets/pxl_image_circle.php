<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_circle',
        'title' => esc_html__('BR Image Circle', 'stotage'),
        'icon' => 'eicon-lock-user icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
            'tilt',
            'pxl-tweenmax',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list',
                            'label' => esc_html__('List (Add Max 8 Items)', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image 1', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__('Image 2', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'list2',
                            'label' => esc_html__('List2 (Add Max 4 Items)', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image2_1',
                                    'label' => esc_html__('Image 1', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image2_2',
                                    'label' => esc_html__('Image 2', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(

                        array(
                            'name' => 'size_image',
                            'label' => esc_html__('Size Image', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-circle img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_line1',
                            'label' => esc_html__('Border List 1', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'border1-off',
                            'separator' => 'before',
                            'options' => [
                                'border1-off' => esc_html__('Off', 'stotage' ),
                                'border1-on' => esc_html__('On', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'border_space_size',
                            'label' => esc_html__('Size', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-circle .list-1' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_line1_color',
                            'label' => esc_html__('Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-circle .list-1:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_line1' => ['border1-on'],
                            ],
                        ),
                        array(
                            'name' => 'border_space_1',
                            'label' => esc_html__('Broder Space', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-circle .list-1:before' => 'top: {{SIZE}}{{UNIT}};right: {{SIZE}}{{UNIT}};bottom: {{SIZE}}{{UNIT}};left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_line1' => ['border1-on'],
                            ],
                        ),
                        array(
                            'name' => 'border_line2',
                            'label' => esc_html__('Border List 2', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'border2-off',
                            'separator' => 'before',
                            'options' => [
                                'border2-off' => esc_html__('Off', 'stotage' ),
                                'border2-on' => esc_html__('On', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'border_space_size_2',
                            'label' => esc_html__('Size', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-circle .list-2' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_line2_color',
                            'label' => esc_html__('Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-circle .list-2:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_line2' => ['border2-on'],
                            ],
                        ),

                        array(
                            'name' => 'border_space_2',
                            'label' => esc_html__('Broder Space', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-circle .list-2:before' => 'top: {{SIZE}}{{UNIT}};right: {{SIZE}}{{UNIT}};bottom: {{SIZE}}{{UNIT}};left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_line2' => ['border2-on'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);