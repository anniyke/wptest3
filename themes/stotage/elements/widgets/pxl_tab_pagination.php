<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tab_pagination',
        'title' => esc_html__('BR Tab Pagination', 'stotage'),
        'icon' => 'eicon-animation icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_alignment_section',
                    'label' => esc_html__('Content Alignment', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-tab .pxl-tabs--title .pxl-item--title.active' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'tl_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-navigation-tab .pxl-tabs--title .pxl-item--title',
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);