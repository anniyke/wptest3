<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('BR Image/Icon Box', 'stotage' ),
        'icon' => 'eicon-icon-box icon-brand-elementor',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout8.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['1','3','5','8'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                        ),

                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Link', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                                'video' => 'Video Auto Play',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'video_url',
                            'label' => esc_html__('Video Url', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'icon_type' => 'video',
                            ],
                        ),
                        array(
                            'name' => 'wg_max_width',
                            'label' => esc_html__('Widget Max Width', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-icon-box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_2',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2','6','7'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'bgr_ct',
                            'label' => esc_html__('Background Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'iconbox',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sub_title2',
                                    'label' => esc_html__('Sub Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title2',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'item_link2',
                                    'label' => esc_html__('Link', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                            'title_field' => '{{{ title2 }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_4',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['4'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '2',
                        ),
                        array(
                            'name' => 'list_imb_l4',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title_l4',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ), 
                                array(
                                    'name' => 'desc_l4',
                                    'label' => esc_html__('Description', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ), 
                                array(
                                    'name' => 'list_link',
                                    'label' => esc_html__( 'Category', 'stotage' ),
                                    'type' => 'pxl_links',
                                ),
                                array(
                                    'name' => 'image4_1',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image4_2',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'item_link4',
                                    'label' => esc_html__('Link', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                            'title_field' => '{{{ title_l4 }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_l4',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Style 1', 'stotage' ),
                                'style-2' => esc_html__('Style 2', 'stotage' ),
                            ],
                            'condition' => [
                                'layout' => '4',
                            ],
                        ),
                        array(
                            'name' => 'box_mh',
                            'label' => esc_html__('Max Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 700,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => '4',
                            ],
                        ),

                        array(
                            'name' => 'bd_color',
                            'label' => esc_html__('Box Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box4 .pxl-item:before' => 'border-color: {{VALUE}} !important;opacity:1;',
                            ],

                            'condition' => [
                                'layout' => '4',
                            ],
                        ),

                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Link Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box4 .pxl-item .btn-readmore' => 'color: {{VALUE}} !important;',
                            ],

                            'condition' => [
                                'layout' => '4',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_hv',
                            'label' => esc_html__('Box Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Box Padding', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_bd_radius',
                            'label' => esc_html__('Box Border Radius', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'stotage'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'animate_hover',
            'label' => esc_html__('Animation Icon', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ani3',
            'options' => [
                'ani1' => esc_html__('Style 1', 'stotage' ),
                'ani2' => esc_html__('Style 2', 'stotage' ),
                'ani3' => esc_html__('Off', 'stotage' ),
            ],
            'condition' => [
                'layout' => '2',
            ],
        ),
        array(
            'name'         => 'ic_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'stotage' ),
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
        ),
        array(
            'name' => 'roate_icon',
            'label' => esc_html__('Icon Rotate', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'deg' => [
                    'min' => -360,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--icon i ,{{WRAPPER}} .pxl-item--icon svg ,{{WRAPPER}} .pxl-item--icon img' => 'transform:rotate({{SIZE}}deg);',
            ],
        ),
        array(
            'name' => 'space_pd',
            'label' => esc_html__('Icon Space', 'stotage' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'icrd_pd',
            'label' => esc_html__('Icon Border Radius', 'stotage' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'rdspace_pd',
            'label' => esc_html__('Border Radius', 'stotage' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],

            'condition' => [
                'style' => 'style-2',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'style_icon_cl',
            'label' => esc_html__('Style Icon', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'ic' => 'Icon',
                'svg' => 'Svg',
            ],
            'default' => 'ic',
        ),
        array(
            'name' => 'style_svg_cl',
            'label' => esc_html__('Style SVG', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'fill' => 'Fill',
                'stroke' => 'Stroke',
            ],
            'condition' => [
                'style_icon_cl' => 'svg',
            ],
        ),
        array(
            'name' => 'bgicolor',
            'label' => esc_html__('Background Icon Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
        ),

        array(
            'name' => 'bdicolor',
            'label' => esc_html__('Border Box Icon Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'border-color:{{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box5 .pxl-item--inner .pxl-item--icon' => 'border:1px solid {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box6 .pxl-item--inner .pxl-item--icon' => 'border:1px solid {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box8 .pxl-item--inner .pxl-item--icon' => 'border:1px solid {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bgicolor_hv',
            'label' => esc_html__('Background Icon Color (Hover)', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon' => 'background-color: {{VALUE}};border-color:{{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg path,{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
                'style_icon_cl' => 'ic',
            ],
        ),
        array(
            'name' => 'icon_color_hover',
            'label' => esc_html__('Color Hover', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon svg path,{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
                'style_icon_cl' => 'ic',
            ],
        ),
        array(
            'name' => 'icon_fill_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg path' => 'fill: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg polygon' => 'fill: {{VALUE}} ;',
            ],
            'condition' => [
                'style_svg_cl' => 'fill',
                'style_icon_cl' => 'svg',
            ],
        ),
        array(
            'name' => 'icon_fill_color_hv',
            'label' => esc_html__('Color Hover', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon svg path' => 'fill: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon svg polygon' => 'fill: {{VALUE}} ;',
            ],
            'condition' => [
                'style_svg_cl' => 'fill',
                'style_icon_cl' => 'svg',
            ],
        ),
        array(
            'name' => 'icon_stroke_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg' => 'stroke: {{VALUE}} ;',
            ],
            'condition' => [
                'style_svg_cl' => 'stroke',
                'style_icon_cl' => 'svg',
            ],
        ),
        array(
            'name' => 'icon_stroke_color_hv',
            'label' => esc_html__('Color Hover', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon svg' => 'stroke: {{VALUE}} ;',
            ],
            'condition' => [
                'style_svg_cl' => 'stroke',
                'style_icon_cl' => 'svg',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Size', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),

        array(
            'name' => 'space_r',
            'label' => esc_html__('Space Right ', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'column-gap: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'layout' => ['1'],
                'style' => ['style-2'],
            ],
        ),

        array(
            'name' => 'space_t',
            'label' => esc_html__('Space Top ', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon i,{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon svg,{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon img' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'layout' => ['1'],
                'style' => ['style-2'],
            ],
        ),
        array(
            'name' => 'box_wh',
            'label' => esc_html__('Box Width/Height', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'layout' => ['1','8'],
                'style' => ['style-2'],
            ],
        ),
        array(
            'name' => 'icon_box_color',
            'label' => esc_html__('Box Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => '1',
            ],
        ),
        array(
            'name' => 'icon_box_min_width',
            'label' => esc_html__('Box Width', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_box_min_height',
            'label' => esc_html__('Box Height', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'min-height: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_img_max_height',
            'label' => esc_html__('Image Max Height', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'image',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'stotage'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_tag',
            'label' => esc_html__('HTML Tag', 'stotage' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h5',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title,{{WRAPPER}} .pxl-icon-box .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color_hv',
            'label' => esc_html__('Color Hover', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title:hover,{{WRAPPER}} .pxl-icon-box .pxl-item--title a:hover' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--title,{{WRAPPER}} .pxl-icon-box .pxl-item--title a',
        ),
        array(
            'name' => 'title_top_spacer',
            'label' => esc_html__('Top Spacer', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'title_bottom_spacer',
            'label' => esc_html__('Bottom Spacer', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'stotage'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'stotage' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),

        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'stotage' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--description',
        ),
        array(
            'name' => 'des_mw',
            'label' => esc_html__('Max Width', 'stotage' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),stotage_widget_animation_settings(),
),
),
),stotage_get_class_widget_path()
);