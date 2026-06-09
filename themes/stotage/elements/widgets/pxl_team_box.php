<?php
// Register Team Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_box',
        'title' => esc_html__('BR Team Box', 'stotage' ),
        'icon' => 'eicon-user-preferences icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Team', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'description' => esc_html__('Add Max 5 Item.', 'stotage'),
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'stotage' ),
                                    'type' => 'pxl_icons',
                                ), 
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link Details', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_cl1',
                    'label' => esc_html__('Content Style ', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-box .box-title .pxl-item--title,{{WRAPPER}} .pxl-team-box .box-title .pxl-item--title a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-box .box-title .pxl-item--title,{{WRAPPER}} .pxl-team-box .box-title .pxl-item--title a',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-box .box-title .pxl-item--position' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-box .box-title .pxl-item--position',
                            'separator' => 'after',
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);