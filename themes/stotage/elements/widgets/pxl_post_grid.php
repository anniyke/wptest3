<?php
$pt_supports = ['post','portfolio','event'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('BR Post Grid', 'stotage' ),
        'icon' => 'eicon-posts-grid icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                        stotage_get_post_grid_layout($pt_supports)
                    ),
                ),
                 
                array(
                    'name' => 'tab_source',
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
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'style_portfolio',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1', 'stotage' ),
                                'style2' => esc_html__('Style 2', 'stotage' ),
                                'style3' => esc_html__('Style 3', 'stotage' ),
                            ],
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
                            'name' => 'mt_custom',
                            'label' => esc_html__('Custom Space Top', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(3),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(4),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(7),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(8),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(11),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(12),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(8),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(15),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(16),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(19),{{WRAPPER}} .pxl-grid.style2 .pxl-grid-item:nth-child(20),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(3),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(6),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(9),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(12),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(15),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(18),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(21),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(24),{{WRAPPER}} .pxl-grid.style3 .pxl-grid-item:nth-child(27)' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style_portfolio!' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'masonry',
                            'options' => [
                                'masonry' => esc_html__('Masonry', 'stotage' ),
                                'fitRows' => esc_html__('Fit Rows', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR  Animate', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => stotage_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'stotage' ),
                                'false' => esc_html__('Disable', 'stotage' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'stotage' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'stotage' ),
                                'loadmore' => esc_html__('Loadmore', 'stotage' ),
                                'false' => esc_html__('Disable', 'stotage' ),
                            ],
                        ),
                        array(
                            'name' => 'p_pdt',
                            'label' => esc_html__('Pagination Space Top', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-grid .pxl-pagination-links' => 'margin-top: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid .btn-grid-loadmore' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'pagination_type!' => ['false'],
                            ],
                        ),
                        array(
                            'name' => 'button_text_load_more',
                            'label' => esc_html__('Button Loadmore', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('', 'stotage'),
                            'condition' => [
                                'pagination_type' => 'loadmore',
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
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
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                '{{WRAPPER}} .pxl-grid .pxl-grid-masonry' => 'margin: 0 -{{RIGHT}}{{UNIT}} 0 -{{LEFT}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ct_padding',
                            'label' => esc_html__('Content Padding', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-inner .pxl-grid-item .pxl-post--inner ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'ct_inner_padding',
                            'label' => esc_html__('Content Inner Padding', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-inner .pxl-grid-item .pxl-post--inner:hover .pxl-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-4']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns: Screen <= 575', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '1',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns: Screen <= 767', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns: Screen <= 991', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns: Screen <= 1199', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns: Screen => 1200', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_display',
                    'label' => esc_html__('Display', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'bgr_ct',
                            'label' => esc_html__('Background Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-4']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        // array(
                        //     'name' => 'show_date',
                        //     'label' => esc_html__('Show Date', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::SWITCHER,
                        //     'default' => 'true',
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        //                 ]
                        //             ]
                        //         ],
                        //     ]
                        // ),
                        // array(
                        //     'name' => 'show_author',
                        //     'label' => esc_html__('Show Author', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::SWITCHER,
                        //     'default' => 'true',
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        //                 ]
                        //             ]
                        //         ],
                        //     ]
                        // ),
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-4']]
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                                        ]
                                    ],
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        
                        array(
                            'name' => 'tilt',
                            'label' => esc_html__('Tilt', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-4']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_video',
                            'label' => esc_html__('Show Video', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        // array(
                        //     'name' => 'show_excerpt',
                        //     'label' => esc_html__('Show Excerpt', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::SWITCHER,
                        //     'default' => 'true',
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                        //                     ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        //                 ]
                        //             ],
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                        //                     ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']],
                        //                 ]
                        //             ],
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                        //                     ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3']]
                        //                 ]
                        //             ]
                        //         ],
                        //     ]
                        // ),
                        // array(
                        //     'name' => 'num_words',
                        //     'label' => esc_html__('Number of Words', 'stotage' ),
                        //     'type' => \Elementor\Controls_Manager::NUMBER,
                        //     'default' => 25,
                        //     'separator' => 'after',
                        //     'conditions' => [
                        //         'relation' => 'or',
                        //         'terms' => [
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                        //                     ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']],
                        //                 ]
                        //             ],
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                        //                     ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']],
                        //                 ]
                        //             ],
                        //             [
                        //                 'terms' => [
                        //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                        //                     ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3']],
                        //                     ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        //                 ]
                        //             ]
                        //         ],
                        //     ],
                        // ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                'body {{WRAPPER}} .pxl-grid .pxl-post--title ,body {{WRAPPER}} .pxl-grid .pxl-post--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hv',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                'body {{WRAPPER}} .pxl-grid .pxl-post--title:hover ,body {{WRAPPER}} .pxl-grid .pxl-post--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => 'body {{WRAPPER}} .pxl-grid .pxl-post--title ,body {{WRAPPER}} .pxl-grid .pxl-post--title a',
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Margin', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                'body {{WRAPPER}} .pxl-grid .pxl-post--title' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px !important;',
                            ],
                        ),
                    ),
                ),
                // array(
                //     'name' => 'section_style_btn',
                //     'label' => esc_html__('Button', 'stotage'),
                //     'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                //     'conditions' => [
                //         'relation' => 'or',
                //         'terms' => [
                //             [
                //                 'terms' => [
                //                     ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                //                     ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']],
                //                     ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                //                 ]
                //             ],
                //         ],
                //     ],
                //     'controls' => array(
                //         array(
                //             'name' => 'btn_hv_color',
                //             'label' => esc_html__('Color Hover Box', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 'body {{WRAPPER}} .pxl-grid .pxl-grid-item:hover .btn-readmore svg path' => 'fill: {{VALUE}} !important;',
                //             ],
                //         ),
                //         array(
                //             'name' => 'bg_btn_hv_color',
                //             'label' => esc_html__('Background Color Hover Box', 'stotage' ),
                //             'type' => \Elementor\Controls_Manager::COLOR,
                //             'selectors' => [
                //                 'body {{WRAPPER}} .pxl-grid .pxl-grid-item:hover .btn-readmore' => 'background-color: {{VALUE}} !important;',
                //             ],
                //         ),
                //         array(
                //             'name' => 'btn_typography',
                //             'label' => esc_html__('Typography', 'stotage' ),
                //             'type' => \Elementor\Group_Control_Typography::get_type(),
                //             'control_type' => 'group',
                //             'selector' => 'body {{WRAPPER}} .pxl-grid .pxl-post--title ,body {{WRAPPER}} .pxl-grid .pxl-post--title a',
                //         ),
                //     ),
                // ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);