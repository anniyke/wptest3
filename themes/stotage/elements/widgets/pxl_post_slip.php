<?php
$pt_supports = ['portfolio'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_slip',
        'title' => esc_html__('BR Post Slip', 'stotage' ),
        'icon' => 'eicon-posts-grid icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'stotage' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'stotage' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => stotage_get_post_type_options($pt_supports),
                                'default'  => 'portfolio'
                            ) 
                        ),
                        stotage_get_post_slip_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'stotage' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'stotage' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'stotage' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        stotage_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        stotage_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'stotage' ),
                                    'ID' => esc_html__('ID', 'stotage' ),
                                    'author' => esc_html__('Author', 'stotage' ),
                                    'title' => esc_html__('Title', 'stotage' ),
                                    'rand' => esc_html__('Random', 'stotage' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'stotage' ),
                                    'asc' => esc_html__('Ascending', 'stotage' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                            array(
                                'name' => 'wg_heading',
                                'label' => esc_html__('Widget Heading', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'pxl_animate_h',
                                'label' => esc_html__('Heading Animate', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => stotage_widget_animate_v2(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'h_color',
                                'label' => esc_html__('Heading Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'h_typography',
                                'label' => esc_html__('Heading Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title',
                            ),
                            array(
                                'name' => 'wg_desc',
                                'label' => esc_html__('Widget Description', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'd_color',
                                'label' => esc_html__('Description Color', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--desc' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'd_typography',
                                'label' => esc_html__('Description Typography', 'stotage' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--desc',
                            ),
                            array(
                                'name' => 'wg_btn_text',
                                'label' => esc_html__('Widget Button Text', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'wg_btn_link',
                                'label' => esc_html__('Widget Button Link', 'stotage'),
                                'type' => \Elementor\Controls_Manager::URL,
                                'label_block' => true,
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ]
                                ],
                            ]
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sp_ct',
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
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content' => 'padding-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_b_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title',
                        ),
                        array(
                            'name' => 'title_box_color',
                            'label' => esc_html__('Box Color From', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 ' => '--gradient-color-from: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_box_color_to',
                            'label' => esc_html__('Box Color To', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 ' => '--gradient-color-to: {{VALUE}} !important;',
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
                            'name' => 'bd_title_color',
                            'label' => esc_html__('Border Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-image--block.active .pxl-post-block--min ' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_title_color',
                            'label' => esc_html__('Background Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-image--block.active .pxl-post-block--min ' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-block--min .pxl-post--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hv',
                            'label' => esc_html__('Hover Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-block--min .pxl-post--title a:hover' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-block--min .pxl-post--readmore:hover svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--button .btn' => 'color: {{VALUE}};',
                            ],
                        ), 
                        array(
                            'name' => 'bg_btn_color',
                            'label' => esc_html__('Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--button .btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),

            ),
        ),
    ),
    stotage_get_class_widget_path()
);