<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'stotage')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('BR Contact Form', 'stotage'),
            'icon' => 'eicon-form-horizontal icon-brand-elementor',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'stotage'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight',
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight,{{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:before' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form ::-webkit-calendar-picker-indicator' => 'filter: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'plh_color',
                                'label' => esc_html__('Color Placeholder', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form ::placeholder' => 'color: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color',
                                'label' => esc_html__('Background Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_padding',
                                'label' => esc_html__('Padding Input', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_border_radius',
                                'label' => esc_html__('Border Radius', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'input_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'stotage' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight'
                            ),
                            array(
                                'name' => 'border_type',
                                'label' => esc_html__( 'Border Type', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'stotage' ),
                                    'solid' => esc_html__( 'Solid', 'stotage' ),
                                    'double' => esc_html__( 'Double', 'stotage' ),
                                    'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                    'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                    'groove' => esc_html__( 'Groove', 'stotage' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-acceptance), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-style: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__( 'Border Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'border_color_hv',
                                'label' => esc_html__( 'Border Color Focus', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover,{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus,{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus-visible,{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):active' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'input_height',
                                'label' => esc_html__('Input Height', 'stotage' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_bottom',
                                'label' => esc_html__('Spacer Bottom', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_left_1',
                                'label' => esc_html__('Spacer Left', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-left: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-left: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_right_1',
                                'label' => esc_html__('Spacer right', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-right: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-right: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_text_area',
                        'label' => esc_html__('Textarea', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'textarea_height',
                                'label' => esc_html__('Textarea Height', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_padding',
                                'label' => esc_html__('Padding Textarea', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'textarea_border_type',
                                'label' => esc_html__( 'Textarea Border Type', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'stotage' ),
                                    'solid' => esc_html__( 'Solid', 'stotage' ),
                                    'double' => esc_html__( 'Double', 'stotage' ),
                                    'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                    'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                    'groove' => esc_html__( 'Groove', 'stotage' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'textarea_border_width',
                                'label' => esc_html__( 'Textarea Border Width', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'textarea_border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'textarea_typography',
                                'label' => esc_html__('Textarea Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea',
                            ),
                            array(
                                'name' => 'textarea_color',
                                'label' => esc_html__('Textarea Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_bottom_1',
                                'label' => esc_html__('Spacer Bottom', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control-wrap textarea' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_left',
                                'label' => esc_html__('Spacer Left', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-left: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-left: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_right',
                                'label' => esc_html__('Spacer right', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-right: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-right: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input_hover',
                        'label' => esc_html__('Input Hover', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_color_hover',
                                'label' => esc_html__('Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover,{{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover:before, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight.active' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:focus' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):active, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:active' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form input:hover ::-webkit-calendar-picker-indicator' => 'filter: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color_hover',
                                'label' => esc_html__('Background Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):active' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover,{{WRAPPER}} .pxl-contact-form .pxl-select-higthlight.active' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'         => 'input_box_shadow_hover',
                                'label' => esc_html__( 'Box Shadow', 'stotage' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover'
                            ),
                            array(
                                'name' => 'border_type_hover',
                                'label' => esc_html__( 'Border Type', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'stotage' ),
                                    'solid' => esc_html__( 'Solid', 'stotage' ),
                                    'double' => esc_html__( 'Double', 'stotage' ),
                                    'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                    'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                    'groove' => esc_html__( 'Groove', 'stotage' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width_hover',
                                'label' => esc_html__( 'Border Width', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type_hover!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color_hover',
                                'label' => esc_html__( 'Border Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover,{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus,{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus-visible, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type_hover!' => '',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_button',
                        'label' => esc_html__('Button', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array_merge(
                            array(
                                array(
                                    'name' => 'button_typography',
                                    'label' => esc_html__('Button Typography', 'stotage' ),
                                    'type' => \Elementor\Group_Control_Typography::get_type(),
                                    'control_type' => 'group',
                                    'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button',
                                ),
                                array(
                                    'name' => 'button_color',
                                    'label' => esc_html__('Button Color', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'color: {{VALUE}};',
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit i' => 'color: {{VALUE}};',
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit svg path' => 'fill: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_color_hover',
                                    'label' => esc_html__('Button Color Hover', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'color: {{VALUE}};',
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover i, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus i' => 'color: {{VALUE}};',
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover svg path, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus svg path' => 'fill: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'bt_bg_style',
                                    'label' => esc_html__('Type Background', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'bg-default',
                                    'options' => [
                                        'bg-default' => esc_html__('Default Color', 'stotage' ),
                                        'btn-gradient' => esc_html__('Gradient Color', 'stotage' ),
                                    ],
                                ),
                                array(
                                    'name' =>'gr_color_from',
                                    'label' => esc_html__('From', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form button' => 'background-image: linear-gradient(to right, var(--gradient-color-from), var(--gradient-color-to));--gradient-color-from: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'bt_bg_style' => 'btn-gradient',
                                    ],
                                ),
                                array(
                                    'name' =>'gr_color_to',
                                    'label' => esc_html__('To', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form button' => '--gradient-color-to: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'bt_bg_style' => 'btn-gradient',
                                    ],
                                ),
                                array(
                                    'name' => 'button_bg_color',
                                    'label' => esc_html__('Button Background Color', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'background: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'bt_bg_style' => 'bg-default',
                                    ],
                                ),
                                array(
                                    'name' => 'button_bg_color_hover',
                                    'label' => esc_html__('Button Background Color Hover', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'background-color: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'bt_bg_style' => 'bg-default',
                                    ],
                                ),
                            ),
                            stotage_widget_gradient_color([
                                'prefix' => 'gr',
                                'label' => 'Button',
                                'selectors_class' => '.pxl-contact-form',
                            ]),
                            array(
                                array(
                                    'name' => 'button_padding',
                                    'label' => esc_html__('Padding', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name' => 'button_margin',
                                    'label' => esc_html__('Margin', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name' => 'button_border_radius',
                                    'label' => esc_html__('Border Radius', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name'         => 'button_box_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'stotage' ),
                                    'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                    'control_type' => 'group',
                                    'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button'
                                ),
                                array(
                                    'name' => 'button_border_type',
                                    'label' => esc_html__( 'Border Type', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        '' => esc_html__( 'None', 'stotage' ),
                                        'solid' => esc_html__( 'Solid', 'stotage' ),
                                        'double' => esc_html__( 'Double', 'stotage' ),
                                        'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                        'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                        'groove' => esc_html__( 'Groove', 'stotage' ),
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-style: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_border_width',
                                    'label' => esc_html__( 'Border Width', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'button_border_type!' => '',
                                    ],
                                    'responsive' => true,
                                ),
                                array(
                                    'name' => 'button_border_color',
                                    'label' => esc_html__( 'Border Color', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-color: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'button_border_type!' => '',
                                    ],
                                ),
                                array(
                                    'name' => 'btn_width',
                                    'label' => esc_html__( 'Width', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'btn-w-auto' => 'Auto',
                                        'btn-w-full' => '100%',
                                    ],
                                    'default' => 'btn-w-auto',
                                ),
                                array(
                                    'name' => 'btn_spacer_top',
                                    'label' => esc_html__('Spacer Top', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 3000,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'margin-top: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit + a' => 'margin-top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'extra',
                        'label' => esc_html__('Extra', 'stotage'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'bgbcolor',
                                'label' => esc_html__('Background Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wrap-form' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'box_padding',
                                'label' => esc_html__('Box Padding', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wrap-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'box_radius',
                                'label' => esc_html__('Box Border Radius', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wrap-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'ntt_padding',
                                'label' => esc_html__('Notice Margin', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-response-output' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}}  !important;',
                                    '{{WRAPPER}} .pxl-contact-form .input-filled:not(.label-text)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'notification_color',
                                'label' => esc_html__('Notification Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'label_color',
                                'label' => esc_html__('Label Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .input-filled label' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form .input-filled .wpcf7-list-item-label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'label_typography',
                                'label' => esc_html__('Label Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .input-filled  label,{{WRAPPER}} .pxl-contact-form .input-filled  .wpcf7-list-item-label',
                            ),
                            array(
                                'name' => 'label_spacer_bottom',
                                'label' => esc_html__('Label Spacer Bottom', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'separator' => 'after',
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .input-filled  label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .input-filled  .wpcf7-list-item-label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_color',
                                'label' => esc_html__('Radio Button Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-radio .wpcf7-list-item .wpcf7-list-item-label::after ' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_color_bd',
                                'label' => esc_html__('Border Radio Button Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-radio .wpcf7-list-item .wpcf7-list-item-label::before ' => 'border-color: {{VALUE}};',
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
}