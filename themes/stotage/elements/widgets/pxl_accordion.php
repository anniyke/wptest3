<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('BR Accordion', 'stotage' ),
        'icon' => 'eicon-accordion icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'stotage-accordion'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                'style-3' => 'Style 3',
                                'style-4' => 'Style 4',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'step',
                                    'label' => esc_html__('Step', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT, 
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT, 
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding ', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_padding_at',
                            'label' => esc_html__('Item Padding Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space Bottom', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_space_top',
                            'label' => esc_html__('Item Space Top', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'l1_cl',
                            'label' => esc_html__('Line 1 Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1.style-4 .pxl--item:before' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['style-4'],
                            ],
                        ),
                        array(
                            'name' => 'l2_cl',
                            'label' => esc_html__('Line 2 Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1.style-4 .pxl-accordion--title::after' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['style-4'],
                            ],
                        ),
                        array(
                            'name' => 'item_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item ' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'item_color_at',
                            'label' => esc_html__('Background Color Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item.active' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_ic',
    'label' => esc_html__('Icon', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'ic_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-icon--plus:before,{{WRAPPER}} .pxl-accordion .pxl--item .pxl-icon--plus:after' => 'background-color: {{VALUE}} ;',
            ],
        ),
        array(
            'name' => 'ic_color_at',
            'label' => esc_html__('Color Active', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-icon--plus:before,{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-icon--plus:after' => 'background-color: {{VALUE}} ;',
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
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-title--text' => 'color: {{VALUE}} ;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-title--text',
        ),
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
            'default' => 'h5',
        ),
    ),
),
array(
    'name' => 'section_style_title_at',
    'label' => esc_html__('Title Active', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color_to_at',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-title--text' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography2',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-title--text',
        ),
    ),
),
array(
    'name' => 'section_style_content',
    'label' => esc_html__('Content', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'content_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion--content',
        ),
        array(
            'name' => 'ct_space_top',
            'label' => esc_html__('Space Top', 'stotage' ),
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
                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'ct_space_bottom',
            'label' => esc_html__('Space Bottom', 'stotage' ),
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
                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'padding-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'ct_space_mw',
            'label' => esc_html__('Max Width', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'max-width: {{SIZE}}{{UNIT}};',
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