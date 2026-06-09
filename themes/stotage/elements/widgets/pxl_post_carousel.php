<?php
$pt_supports = ['service','post','portfolio','event'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('BR Post Carousel', 'stotage' ),
        'icon' => 'eicon-posts-carousel icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                'default'  => 'post'
                            ) 
                        ),
                        stotage_get_post_carousel_layout($pt_supports)
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
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Stotage Animate', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => stotage_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns: Screen <= 575', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns: Screen <= 767', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns: Screen <= 991', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns: Screen <= 1199', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns: Screen => 1200', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns: Screen => 1600', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides Scroll', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'style-pa',
                            'label' => esc_html__('Alignment Bullets', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'center',
                            'options' => [
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right',
                            ],
                            'conditions' => [
                                'pagination_type' => 'bullets',
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ],
                                ],
                            ],

                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'offset_left',
                            'label' => esc_html__('Offset Left', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-left: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-carousel-inner' => 'overflow: visible;',
                            ],
                        ),
                        array(
                            'name' => 'offset_right',
                            'label' => esc_html__('Offset Right', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-right: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-carousel-inner' => 'overflow: visible;',
                            ],
                        ),
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
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3','portfolio-4']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                        ],
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
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => []]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'separator' => 'after',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => []]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                                        ]
                                    ]
                                ],
                            ]
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']]
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('General', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        // array(
                        //     'name' => 'style',
                        //     'label' => esc_html__('Style', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::SELECT,
                        //     'default' => 'style-1',
                        //     'options' => [
                        //         'style-1' => 'Style 1',
                        //         'style-2' => 'Style 2',
                        //         'style-3' => 'Style 3',
                        //     ],
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        //                 ]
                        //             ],
                        //         ],
                        //     ]
                        // ),
                        // array(
                        //     'name' => 'bd_color',
                        //     'label' => esc_html__('Border Color', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::COLOR,
                        //     'selectors' => [
                        //         '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-slide ' => 'border-color: {{VALUE}} !important; ',
                        //     ],
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        //                 ]
                        //             ],
                        //         ],
                        //     ]
                        // ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-right: -{{RIGHT}}{{UNIT}} !important;  margin-left: -{{LEFT}}{{UNIT}}  !important;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                'body {{WRAPPER}} .pxl-swiper-slider .pxl-post--title  ,body {{WRAPPER}} .pxl-swiper-slider .pxl-post--title a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => 'body {{WRAPPER}} .pxl-swiper-slider .pxl-post--title , body {{WRAPPER}} .pxl-swiper-slider .pxl-post--title a',
                        ),
                    ),
                ),
                // array(
                //     'name' => 'section_style_excerpt',
                //     'label' => esc_html__('Excerpt', 'stotage'),
                //     'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                //     'controls' => array(
                //         array(
                //             'name' => 'excerpt_color',
                //             'label' => esc_html__('Color', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 '{{WRAPPER}} .pxl-swiper-slider .pxl-post--content' => 'color: {{VALUE}};',
                //             ],
                //         ),
                //         array(
                //             'name' => 'excerpt_typography',
                //             'label' => esc_html__('Typography', 'stotage' ),
                //             'type' => \Elementor\Group_Control_Typography::get_type(),
                //             'control_type' => 'group',
                //             'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--content',
                //         ),
                //     ),
                // ),
                // array(
                //     'name' => 'section_style_date',
                //     'label' => esc_html__('Date', 'stotage'),
                //     'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                //     'controls' => array(
                //         array(
                //             'name' => 'date_color',
                //             'label' => esc_html__('Color', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .pxl-post--inner .post-date  ' => 'color: {{VALUE}};',
                //             ],
                //         ),
                //         array(
                //             'name' => 'date_typography',
                //             'label' => esc_html__('Typography', 'stotage' ),
                //             'type' => \Elementor\Group_Control_Typography::get_type(),
                //             'control_type' => 'group',
                //             'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .pxl-post--inner .post-date ',
                //         ),
                //     ),
                // ),
                // array(
                //     'name' => 'section_style_button',
                //     'label' => esc_html__('Button', 'stotage'),
                //     'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                //     'controls' => array(
                //         array(
                //             'name' => 'btn_color',
                //             'label' => esc_html__('Color', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .pxl-post--inner .btn-more ' => 'color: {{VALUE}};',
                //             ],
                //         ),
                //         array(
                //             'name' => 'btn_color_hv',
                //             'label' => esc_html__('Color Hover', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .pxl-post--inner .btn-more:hover ' => 'color: {{VALUE}};',
                //             ],
                //         ),
                //         array(
                //             'name' => 'btn_typography',
                //             'label' => esc_html__('Typography', 'stotage' ),
                //             'type' => \Elementor\Group_Control_Typography::get_type(),
                //             'control_type' => 'group',
                //             'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .pxl-post--inner .btn-more',
                //         ),
                //     ),
                // ),
            ),
        ),
    ),stotage_get_class_widget_path()
);