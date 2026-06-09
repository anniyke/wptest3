<?php
$pt_supports = ['post'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_post_list',
        'title'      => esc_html__('BR Post List', 'stotage' ),
        'icon'       => 'eicon-post-list icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'pxl-post-grid',
        ],
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
                        stotage_get_post_list_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                        stotage_get_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        stotage_get_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        stotage_get_ids_unselected_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        array(
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__('Order By', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date'   => esc_html__('Date', 'stotage' ),
                                    'ID'     => esc_html__('ID', 'stotage' ),
                                    'author' => esc_html__('Author', 'stotage' ),
                                    'title'  => esc_html__('Title', 'stotage' ),
                                    'rand'   => esc_html__('Random', 'stotage' ),
                                ],
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__('Sort Order', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'stotage' ),
                                    'asc'  => esc_html__('Ascending', 'stotage' ),
                                ],
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__('Total items', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'show_toolbar',
                                'label'   => esc_html__('Show Toolbar', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'hide',
                                'options' => [
                                    'show' => esc_html__('Show', 'stotage' ),
                                    'hide'   => esc_html__('Hide', 'stotage' )
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-list-1' ],
                            ),
                            array(
                                'name'        => 'img_size',
                                'label'       => esc_html__('Image Size', 'stotage' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: full).', 'stotage')
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'stotage' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'stotage' ),
                                    'loadmore'   => esc_html__('Loadmore', 'stotage' ),
                                    'false'      => esc_html__('Disable', 'stotage' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'stotage' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','stotage'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'stotage' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'stotage' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'stotage' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'stotage' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ],
                                'default'      => 'start',
                                'condition' => [
                                    'pagination_type' => ['pagination', 'loadmore'],
                                ],
                            ),
                            array(
                                'name' => 'title_hover',
                                'label' => esc_html__('Title Color', 'stotage' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .layout-post-list-2 .item-content .item-title' => 'color: {{VALUE}};'
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-list-2' ],
                            ), 
                            array(
                                'name' => 'title_hover_color',
                                'label' => esc_html__('Title Hover Color', 'stotage' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .layout-post-list-2 .item-content .item-title:hover' => 'color: {{VALUE}};'
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-list-2' ],
                            ), 
                        ),
                    )
                ),
                array(
                    'name' => 'display_post_section',
                    'label' => esc_html__('Display Options', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'post_date',
                            'label'     => esc_html__('Show Date', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_author',
                            'label'     => esc_html__('Show Author', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_category',
                            'label'     => esc_html__('Show Category', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'false',
                        ),
                        array(
                            'name'      => 'post_comment',
                            'label'     => esc_html__('Show Comment', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_excerpt',
                            'label'     => esc_html__('Show Excerpt', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_num_words',
                            'label'     => esc_html__('Number of Words', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'post_excerpt' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'post_readmore',
                            'label'     => esc_html__('Show Readmore', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_readmore_text',
                            'label'     => esc_html__('Button Text', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'post_readmore' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'post_share',
                            'label'     => esc_html__('Show Social Share', 'stotage' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                    ),
                    'condition' => ['post_type' => 'post','layout_post' => 'post-list-1' ],
                ),
                 
            ),
        ),
    ),
    stotage_get_class_widget_path()
);