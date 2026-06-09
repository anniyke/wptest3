<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_carousel',
        'title' => esc_html__('BR Image Carousel', 'stotage'),
        'icon' => 'eicon-testimonial icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'stotage' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout4.jpg'
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
                            'name' => 'list',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'url_video',
                                    'label' => esc_html__('Video URL', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_contentl2',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2','4'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'list2',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_contentl3',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'list3',
                            'label' => esc_html__('List', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image3',
                                    'label' => esc_html__('Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sub_title3',
                                    'label' => esc_html__('Sub Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title3',
                                    'label' => esc_html__('Title', 'stotage'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'height_img',
                            'label' => esc_html__('Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],

                            'condition' => [
                                'style_img' => ['bgr'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image ' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-image-carousel .pxl-swiper-slide' => 'padding: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} !important;',
                                '{{WRAPPER}} .pxl-image-carousel .pxl-swiper-container' => 'margin: 0 -{{SIZE}}{{UNIT}} 0 -{{SIZE}}{{UNIT}}  !important;',
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),

                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'stotage' ),
                                'solid' => esc_html__( 'Solid', 'stotage' ),
                                'double' => esc_html__( 'Double', 'stotage' ),
                                'dotted' => esc_html__( 'Dotted', 'stotage' ),
                                'dashed' => esc_html__( 'Dashed', 'stotage' ),
                                'groove' => esc_html__( 'Groove', 'stotage' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--inner' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--inner' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'img_radius',
                            'label' => esc_html__('Image Border Radius', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image , {{WRAPPER}} .pxl-image-carousel .pxl-item--image img' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--title',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Description Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--description' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'label' => esc_html__('Position Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--description',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                                'auto' => 'Auto',
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
                                'auto' => 'Auto',
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
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
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
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
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
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'stotage' ),
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
                        ),
                        array(
                            'name' => 'sizeb',
                            'label' => esc_html__('Size Button', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-swiper-arrow' => 'width: {{SIZE}}{{UNIT}} !important;height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'arrows' => ['true'],
                            ],
                        ),
                        array(
                            'name' => 'sizei',
                            'label' => esc_html__('Size Icon', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-swiper-arrow i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'arrows' => ['true'],
                            ],
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
                            'name' => 'dot_progressbar_color',
                            'label' => esc_html__('Progressbar Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar'
                            ]
                        ),

                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'stotage'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
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
                    ),
),
stotage_widget_animation_settings(),
),
),
),
stotage_get_class_widget_path()
);