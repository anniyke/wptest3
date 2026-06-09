<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_navigation',
        'title' => esc_html__('BR  Post Navigation', 'stotage' ),
        'icon' => 'eicon-navigation-horizontal icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'type',
                            'label' => esc_html__('Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'post',
                            'options' => [
                                'post' => esc_html__('Blog', 'stotage' ),
                                'service' => esc_html__('Service', 'stotage' ),
                                'portfolio' => esc_html__('Portfolio', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'btn_text1',
                            'label' => esc_html__('Button Text Prev', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text Next', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link_grid_page',
                            'label' => esc_html__('Link Gird Page', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('#', 'stotage'),
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'separator' => 'before',
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-navigation a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hv',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-navigation a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-navigation a',
                        ),
                        array(
                            'name' => 'bgcolor',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'separator' => 'before',
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-navigation a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgcolor_hv',
                            'label' => esc_html__('Background Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-navigation a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
)
?>