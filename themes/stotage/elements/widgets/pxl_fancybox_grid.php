<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_fancybox_grid',
        'title' => esc_html__('BR Fancybox Grid', 'stotage'),
        'icon' => 'eicon-blockquote icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_fancybox_grid/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_fancybox_grid/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_fancybox_grid/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_fancybox_grid/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(

                        array(
                            'name' => 'box',
                            'label' => esc_html__('Item', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image Background Hover', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'box2',
                            'label' => esc_html__('Item', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'icon2',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'label_block' => true,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'title2',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc2',
                                    'label' => esc_html__('Description', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link2',
                                    'label' => esc_html__('Link', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title2 }}}',
                        ),
                        array(
                            'name' => 'box3',
                            'label' => esc_html__('Item', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image3',
                                    'label' => esc_html__('Avatar', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'logo',
                                    'label' => esc_html__('Logo', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title3',
                                    'label' => esc_html__('Name', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position3',
                                    'label' => esc_html__('Position', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc3',
                                    'label' => esc_html__('Description', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'rate',
                                    'label' => esc_html__('Rate', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title3 }}}',
                        ),
                        array(
                            'name' => 'box4',
                            'label' => esc_html__('Item', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'title4',
                                    'label' => esc_html__('Name', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position4',
                                    'label' => esc_html__('Position', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc4',
                                    'label' => esc_html__('Description', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title4 }}}',
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '9',
                            'condition' => [
                                'layout' => ['2','3','4'],
                            ],
                        ),
                        array(
                            'name' => 'btn_view_more',
                            'label' => esc_html__('Button Text', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' =>'More Store',
                            'description' => 'Leave field blank to hide button.',
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2','3','4'],
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_settings',
    'label' => esc_html__('Grid', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'pxl_animate',
            'label' => esc_html__('Case Animate', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => stotage_widget_animate(),
            'default' => '',
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
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
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
            'default' => '4',
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
            'default' => '4',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'stotage' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'h_box',
            'label' => esc_html__('Min Height', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-box-grid .pxl-grid-item' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-box-grid .pxl-item--title,{{WRAPPER}} .pxl-box-grid .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-box-grid .pxl-item--title,{{WRAPPER}} .pxl-box-grid .pxl-item--title a',
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Description Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-box-grid .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-box-grid .pxl-item--description',
        ),
    ),
),
),
),
),
stotage_get_class_widget_path()
);