<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_scroll',
        'title' => esc_html__('BR Image List ', 'stotage'),
        'icon' => 'eicon-image-before-after icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_list/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_list/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_list/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['1'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_bgr',
                            'label' => esc_html__('Overlay Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_list_1',
                            'label' => esc_html__('List 1', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_1',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_list_2',
                            'label' => esc_html__('List 2', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array( 
                                array(
                                    'name' => 'image_2',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_list_3',
                            'label' => esc_html__('List 3', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_3',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_list_4',
                            'label' => esc_html__('List 4', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_4',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ), 
                        ),
                        array(
                            'name' => 'image_list_5',
                            'label' => esc_html__('List 5', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_5',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_content_l2',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title_box',
                            'label' => esc_html__('Title', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'image_l1',
                            'label' => esc_html__('List 1', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_left',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_l2',
                            'label' => esc_html__('List 2', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array( 
                                array(
                                    'name' => 'image_right',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_l3',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'full',
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: Full (Width x Height)).',
                        ),
                        array(
                            'name' => 'image_l3',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_ll3',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),

                                array(
                                    'name' => 'transform_style',
                                    'label' => esc_html__('Transform', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title_l3',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-list-2 .image-feature .wrap-image .title-box' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-list-2 .image-feature .wrap-image .title-box',
                        ),
                    ),
                ),
            ),
),
),stotage_get_class_widget_path()
);