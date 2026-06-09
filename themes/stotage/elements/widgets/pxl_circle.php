<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_circle',
        'title' => esc_html__('BR Circle', 'stotage'),
        'icon' => 'eicon-image-box icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Title Circle', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'logo',
                            'label' => esc_html__('Logo', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'banner_title',
                            'label' => esc_html__('Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_particle_style',
                    'label' => esc_html__('Particle Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'width_circle',
                            'label' => esc_html__('Circle Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'width: {{SIZE}}{{UNIT}};max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height_circle',
                            'label' => esc_html__('Circle Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'height: {{SIZE}}{{UNIT}};max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'width_particle',
                            'label' => esc_html__('Particle Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height_particle',
                            'label' => esc_html__('Particle Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'width_height_particle',
                            'label' => esc_html__('Center Circle Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle .pxl--circle-picture' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-circle .pxl-item--title',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'bd_color',
                            'label' => esc_html__('Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle ' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle .pxl-item--title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-circle .pxl-item--title svg text' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_circle_box_out',
                            'label' => esc_html__('Background Circle Box', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle ' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgggg_circle_box_out',
                            'label' => esc_html__('Background Box', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle ' => 'background-color: {{VALUE}};border-radius:1000px;',
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