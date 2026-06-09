<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_info_box',
        'title' => esc_html__('BR Info Box', 'stotage' ),
        'icon' => 'eicon-info-box icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_box',
                            'label' => esc_html__('Title Box', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'c_list',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image Background', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_box',
                    'label' => esc_html__('Box', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'mh_box',
                                'label' => esc_html__('Height Box', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 700,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-check-box' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pd_box',
                                'label' => esc_html__('Padding Box', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-check-box .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__('Title', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-check-box .pxl-title-box' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-check-box .pxl-title-box',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_desc',
                    'label' => esc_html__('List ', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'lb_color',
                                'label' => esc_html__('Label', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-check-box .check-list .check label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'lb_typography',
                                'label' => esc_html__('Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-check-box .check-list .check label',
                            ),
                        )
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);