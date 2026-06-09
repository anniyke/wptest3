<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_line_scroll',
        'title' => esc_html__('BR Line Scroll', 'stotage'),
        'icon' => 'eicon-editor-link icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'dot',
                            'label' => esc_html__('Dot', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pos',
                                    'label' => esc_html__('Top', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px','%' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl_line_scroll .line {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);