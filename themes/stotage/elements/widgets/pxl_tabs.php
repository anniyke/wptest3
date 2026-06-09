<?php
$templates = stotage_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs',
        'title' => esc_html__( 'BR Tabs', 'stotage' ),
        'icon' => 'eicon-tabs icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'stotage-tabs'
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs/layout-image/layout7.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Tabs', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_active',
                            'label' => esc_html__( 'Active Tab', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'extra_html',
                            'label' => esc_html__( 'Suffix HTML', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Content', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'separator' => 'before',
                            'condition' => ['layout' => '1'],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc_title',
                                    'label' => esc_html__( 'Description', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'price',
                                    'label' => esc_html__( 'Price', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'stotage'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'stotage' ),
                                        'template' => esc_html__( 'From Template Builder', 'stotage' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__( 'Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'stotage'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'tabs_l2',
                            'label' => esc_html__( 'Content', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'separator' => 'before',
                            'condition' => [
                                'layout' => ['2','3']
                            ], 
                            'controls' => array(
                                array(
                                    'name' => 'titlel2',
                                    'label' => esc_html__( 'Title', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type2',
                                    'label' => esc_html__('Content Type', 'stotage'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'stotage' ),
                                        'template' => esc_html__( 'From Template Builder', 'stotage' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc2',
                                    'label' => esc_html__( 'Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type2' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template2',
                                    'label' => esc_html__('Select Templates', 'stotage'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type2' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ titlel2 }}}',
                        ),
                        array(
                            'name' => 'tabs_l4',
                            'label' => esc_html__( 'Content', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'separator' => 'before',
                            'condition' => [
                                'layout' => ['4','5','7']
                            ], 
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon_tab',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'titlel4',
                                    'label' => esc_html__( 'Title', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type4',
                                    'label' => esc_html__('Content Type', 'stotage'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'stotage' ),
                                        'template' => esc_html__( 'From Template Builder', 'stotage' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc4',
                                    'label' => esc_html__( 'Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type4' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template4',
                                    'label' => esc_html__('Select Templates', 'stotage'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type4' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ titlel4 }}}',
                        ),
                        array(
                            'name' => 'tabs_l6',
                            'label' => esc_html__( 'Content', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'separator' => 'before',
                            'condition' => [
                                'layout' => ['6']
                            ], 
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon_tab_6',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'titlel6',
                                    'label' => esc_html__( 'Title', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc_title_6',
                                    'label' => esc_html__( 'Description', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type6',
                                    'label' => esc_html__('Content Type', 'stotage'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'stotage' ),
                                        'template' => esc_html__( 'From Template Builder', 'stotage' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc6',
                                    'label' => esc_html__( 'Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type6' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template6',
                                    'label' => esc_html__('Select Templates', 'stotage'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type6' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ titlel6 }}}',
                        ),
                    ),
),
array(
    'name' => 'tab_style',
    'label' => esc_html__( 'Style', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 't_style',
            'label' => esc_html__('Style', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
            'condition' => [
                'layout' => ['2']
            ], 
            'options' => [
                'style-1' => esc_html__('Style 1', 'stotage' ),
                'style-2' => esc_html__('Style 2', 'stotage' ),
            ],
        ),
        array(
            'name' => 'top_space',
            'label' => esc_html__('Space Top Content', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs--content ' => 'margin-top: {{SIZE}}{{UNIT}} ;',
            ],
        ),
        array(
            'name' => 'tab_effect',
            'label' => esc_html__('Effect', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'tab-effect-slide' => 'Slide',
                'tab-effect-fade' => 'Fade',
            ],
            'default' => 'tab-effect-slide',
        ),
        array(
            'name' => 'align',
            'label' => esc_html__('Alignment', 'stotage' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'condition' => [
                'layout' => ['3']
            ], 
            'options' => [
                'left'    => [
                    'title' => esc_html__('Left', 'stotage' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', 'stotage' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', 'stotage' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => '',
            'selectors'         => [
                '{{WRAPPER}} .pxl-tabs3 .pxl-tabs--title' => 'justify-content: {{VALUE}}',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array( 
            'name' => 'title_active_color',
            'label' => esc_html__('Title Active Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title',
        ),
        array(
            'name' => 'bd_box_color_w',
            'label' => esc_html__('Border Button Color', 'stotage' ),
            'separator' => 'before',
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bd_color',
            'label' => esc_html__('Border Button Color Active', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'separator' => 'after',
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_box_color_w',
            'label' => esc_html__('Background Button Color', 'stotage' ),
            'separator' => 'before',
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'btn_color',
            'label' => esc_html__('Background Button Color Active', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'separator' => 'after',
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'ic_color',
            'label' => esc_html__('Icon Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title .pxl-item--title i,{{WRAPPER}} .pxl-tabs .pxl-tabs--title .pxl-item--title svg path' => 'color: {{VALUE}}; fill: {{VALUE}}; opacity:1;',
            ],
        ),
        array(
            'name' => 'ic_color_at',
            'label' => esc_html__('Icon Active', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'separator' => 'after',
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title .pxl-item--title.active i,{{WRAPPER}} .pxl-tabs .pxl-tabs--title .pxl-item--title.active svg path' => 'color: {{VALUE}}; fill: {{VALUE}}; opacity:1;',
            ],
        ),
        array(
            'name' => 'content_color',
            'label' => esc_html__('Content Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-item--content' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'content_typography',
            'label' => esc_html__('Content Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-item--content',
        ),
    ),
),
stotage_widget_animation_settings(),
),
),
),
stotage_get_class_widget_path()
);