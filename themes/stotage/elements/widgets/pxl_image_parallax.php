<?php
pxl_add_custom_widget(
    [
        'name' => 'pxl_image_parallax',
        'title' => esc_html__('BR Image Parallax', 'stotage' ),
        'icon' => 'eicon-image icon-brand-elementor',
        'categories' => ['pxltheme-core'],
        'scripts' => [
            'tilt',
            'pxl-tweenmax',
        ],
        'params' => [
            'sections' => [
                [
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Image', 'stotage' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                's_img' => 'Select Image',
                                'f_img' => 'Featured Image',
                            ],
                            'default' => 's_img',
                        ],
                        [
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'source_type' => ['f_img'],
                            ],
                        ],
                        [
                            'name' => 'image',
                            'label' => esc_html__( 'Choose Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'dynamic' => [
                                'active' => true,
                            ],
                            'condition' => [
                                'source_type' => ['s_img'],
                            ],
                            'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src()
                            ],
                        ],
                        [
                            'name' => 'image',
                            'label' => esc_html__( 'Image Size', 'stotage' ),
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',  
                            'condition' => [
                                'source_type' => ['s_img'],
                            ],
                        ],
                        [
                            'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'stotage' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'stotage' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'stotage' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                            ],
                        ],
                        [
                            'name' => 'link_to',
                            'label' => esc_html__( 'Link', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'none',
                            'options' => [
                                'none' => esc_html__( 'None', 'stotage' ),
                                'file' => esc_html__( 'Media File', 'stotage' ),
                                'custom' => esc_html__( 'Custom URL', 'stotage' ),
                            ],
                        ],
                        [
                            'name' => 'link',
                            'label' => esc_html__( 'Link', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'dynamic' => [
                                'active' => true,
                            ],
                            'placeholder' => esc_html__( 'https://your-link.com', 'stotage' ),
                            'condition' => [
                                'link_to' => 'custom',
                            ],
                            'show_label' => false,
                        ],
                        [
                            'name' => 'open_lightbox',
                            'label' => esc_html__( 'Lightbox', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__( 'Default', 'stotage' ),
                                'yes' => esc_html__( 'Yes', 'stotage' ),
                                'no' => esc_html__( 'No', 'stotage' ),
                            ],
                            'condition' => [
                                'link_to' => 'file',
                            ],
                        ]
                    ],
                ],  
                [
                    'name' => 'parallax_section',
                    'label' => esc_html__('Parallax Settings', 'stotage' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name' => 'pxl_parallax',
                            'label' => esc_html__( 'Parallax Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''        => esc_html__( 'None', 'stotage' ),
                                'x'       => esc_html__( 'Transform X', 'stotage' ),
                                'y'       => esc_html__( 'Transform Y', 'stotage' ),
                                'z'       => esc_html__( 'Transform Z', 'stotage' ),
                                'rotateX' => esc_html__( 'RotateX', 'stotage' ),
                                'rotateY' => esc_html__( 'RotateY', 'stotage' ),
                                'rotateZ' => esc_html__( 'RotateZ', 'stotage' ),
                                'scaleX'  => esc_html__( 'ScaleX', 'stotage' ),
                                'scaleY'  => esc_html__( 'ScaleY', 'stotage' ),
                                'scaleZ'  => esc_html__( 'ScaleZ', 'stotage' ),
                                'scale'   => esc_html__( 'Scale', 'stotage' ),
                            ],
                        ],
                        [
                            'name' => 'parallax_value',
                            'label' => esc_html__('Value', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [ 'pxl_parallax!' => '']  
                        ],
                        [
                            'name' => 'pxl_parallax_two',
                            'label' => esc_html__( 'Parallax Two Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''        => esc_html__( 'None', 'stotage' ),
                                'x'       => esc_html__( 'Transform X', 'stotage' ),
                                'y'       => esc_html__( 'Transform Y', 'stotage' ),
                                'z'       => esc_html__( 'Transform Z', 'stotage' ),
                                'rotateX' => esc_html__( 'RotateX', 'stotage' ),
                                'rotateY' => esc_html__( 'RotateY', 'stotage' ),
                                'rotateZ' => esc_html__( 'RotateZ', 'stotage' ),
                                'scaleX'  => esc_html__( 'ScaleX', 'stotage' ),
                                'scaleY'  => esc_html__( 'ScaleY', 'stotage' ),
                                'scaleZ'  => esc_html__( 'ScaleZ', 'stotage' ),
                                'scale'   => esc_html__( 'Scale', 'stotage' ),
                            ],
                        ],
                        [
                            'name' => 'parallax_value_two',
                            'label' => esc_html__('Value', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [ 'pxl_parallax!' => '']  
                        ],
                    ]
                ],
                [
                    'name'     => 'bg_parallax_section',
                    'label'    => esc_html__('Background Parallax', 'stotage' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name'    => 'pxl_bg_parallax',
                            'label'   => esc_html__( 'Background Parallax Type', 'stotage' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''                  => esc_html__( 'None', 'stotage' ),
                                'basic'             => esc_html__( 'Basic', 'stotage' ),
                                'rotate'            => esc_html__( 'Rotate', 'stotage' ),
                                'mouse-move'        => esc_html__( 'Mouse Move', 'stotage' ),
                                'mouse-move-rotate' => esc_html__( 'Mouse Move Rotate', 'stotage' ),
                            ],
                        ],
                        [
                            'name' => 'bg_parallax_width',
                            'label' => esc_html__('Background Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'tablet_default' => [
                                'unit' => '%',
                            ],
                            'mobile_default' => [
                                'unit' => '%',
                            ],
                            'size_units' => [ '%', 'px', 'vw' ],
                            'range' => [
                                '%' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 1,
                                    'max' => 1920,
                                ],
                                'vw' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [ 'pxl_bg_parallax!' => '']  
                        ],
                        [
                            'name' => 'bg_parallax_height',
                            'label' => esc_html__('Background Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                            ],
                            'mobile_default' => [
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vh' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [ 'pxl_bg_parallax!' => '']  
                        ],
                    ]
                ],
                [
                    'name'     => 'style_section',
                    'label'    => esc_html__( 'Style', 'stotage' ),
                    'tab'      => 'style',
                    'controls' => [
                       [
                        'name' => 'overflow_check',
                        'label' => esc_html__('Overflow', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'default' => 'true',            
                    ],
                    [
                        'name'        => 'width',
                        'label' => esc_html__( 'Width', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'default' => [
                            'unit' => '%',
                        ],
                        'tablet_default' => [
                            'unit' => '%',
                        ],
                        'mobile_default' => [
                            'unit' => '%',
                        ],
                        'size_units' => [ '%', 'px', 'vw' ],
                        'range' => [
                            '%' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                            ],
                            'vw' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image--inner' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'        => 'space',
                        'label' => esc_html__( 'Max Width', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'default' => [
                            'unit' => '%',
                        ],
                        'tablet_default' => [
                            'unit' => '%',
                        ],
                        'mobile_default' => [
                            'unit' => '%',
                        ],
                        'size_units' => [ '%', 'px', 'vw' ],
                        'range' => [
                            '%' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                            ],
                            'vw' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'        => 'height',
                        'label' => esc_html__( 'Height', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'default' => [
                            'unit' => 'px',
                        ],
                        'tablet_default' => [
                            'unit' => 'px',
                        ],
                        'mobile_default' => [
                            'unit' => 'px',
                        ],
                        'size_units' => ['px', 'vh' ],
                        'range' => [
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                            ],                        
                            'vh' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image--inner' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'        => 'max-height',
                        'label' => esc_html__( 'Height Img', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'default' => [
                            'unit' => '%',
                        ],
                        'tablet_default' => [
                            'unit' => '%',
                        ],
                        'mobile_default' => [
                            'unit' => '%',
                        ],
                        'size_units' => [ '%', 'px', 'vh' ],
                        'range' => [
                            '%' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                            ],                        
                            'vh' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image--inner .pxl-image-wg' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'        => 'maxx-height',
                        'label' => esc_html__( 'Max Height', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'default' => [
                            'unit' => '%',
                        ],
                        'tablet_default' => [
                            'unit' => '%',
                        ],
                        'mobile_default' => [
                            'unit' => '%',
                        ],
                        'size_units' => [ '%', 'px', 'vh' ],
                        'range' => [
                            '%' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                            ],                        
                            'vh' => [
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image--inner .pxl-image-wg img' => 'max-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'        => 'object-fit',
                        'label' => esc_html__( 'Object Fit', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'control_type' => 'responsive',
                        'condition' => [
                            'height[size]!' => '',
                        ],
                        'options' => [
                            '' => esc_html__( 'Default', 'stotage' ),
                            'fill' => esc_html__( 'Fill', 'stotage' ),
                            'cover' => esc_html__( 'Cover', 'stotage' ),
                            'contain' => esc_html__( 'Contain', 'stotage' ),
                        ],
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
                        ],
                    ],
                    [
                        'name'        => 'separator_panel_style',
                        'type' => \Elementor\Controls_Manager::DIVIDER,
                        'style' => 'thick',
                    ],
                    [
                        'name' => 'image_effects',
                        'control_type' => 'tab',
                        'tabs' => [
                            [
                                'name' => 'normal',
                                'label' => esc_html__('Normal', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::TAB,
                                'controls' => [
                                    [
                                        'name'        => 'opacity',
                                        'label' => esc_html__( 'Opacity', 'stotage' ),
                                        'type' => \Elementor\Controls_Manager::SLIDER,
                                        'range' => [
                                            'px' => [
                                                'max' => 1,
                                                'min' => 0.10,
                                                'step' => 0.01,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} img' => 'opacity: {{SIZE}};',
                                        ],
                                    ],
                                    [
                                        'name' => 'css_filters',
                                        'label' => esc_html__('CSS Filters', 'stotage' ),
                                        'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                        'control_type' => 'group',
                                        'selector' => '{{WRAPPER}} img',
                                    ],       
                                ],
                            ],
                            [
                                'name' => 'hover',
                                'label' => esc_html__('Hover', 'stotage' ),
                                'type' => \Elementor\Controls_Manager::TAB,
                                'controls' => [
                                    [
                                        'name'        => 'opacity_hover',
                                        'label' => esc_html__( 'Opacity Hover', 'stotage' ),
                                        'type' => \Elementor\Controls_Manager::SLIDER,
                                        'range' => [
                                            'px' => [
                                                'max' => 1,
                                                'min' => 0.10,
                                                'step' => 0.01,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}}:hover img' => 'opacity: {{SIZE}};',
                                        ],
                                    ],
                                    [
                                        'name' => 'css_filters_hover',
                                        'label' => esc_html__('CSS Filters Hover', 'stotage' ),
                                        'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                        'control_type' => 'group',
                                        'selector' => '{{WRAPPER}}:hover img',
                                    ],  
                                    [
                                        'name' => 'background_hover_transition',
                                        'label' => esc_html__( 'Transition Duration', 'stotage' ),
                                        'type' => \Elementor\Controls_Manager::SLIDER,
                                        'range' => [
                                            'px' => [
                                                'max' => 3,
                                                'step' => 0.1,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
                                        ],
                                    ],
                                    [
                                        'name' => 'hover_animation',
                                        'label' => esc_html__( 'Hover Animation', 'stotage' ),
                                        'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                    ]     
                                ]
                            ]
                        ],

                    ], 
                    [
                        'name' => 'image_border',
                        'type' => \Elementor\Group_Control_Border::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} img, {{WRAPPER}} .pxl-bg-parallax',
                        'separator' => 'before',
                    ],
                    [
                        'name'         => 'image_border_radius',
                        'label'        => esc_html__( 'Border Radius', 'stotage' ),
                        'type'         => \Elementor\Controls_Manager::DIMENSIONS,
                        'control_type' => 'responsive',
                        'size_units'   => [ 'px', '%' ],
                        'selectors'    => [
                            '{{WRAPPER}} img, {{WRAPPER}} .pxl-image--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .pxl-bg-parallax' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ],
                    [
                        'name'         => 'image_box_shadow',
                        'label'        => esc_html__( 'Box Shadow', 'stotage' ),
                        'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                        'control_type' => 'group',
                        'exclude' => [
                            'box_shadow_position',
                        ],
                        'selector' => '{{WRAPPER}} img',
                    ]   
                ],
            ],  
            [
                'name' => 'custom_style_section',
                'label' => esc_html__('Custom Style', 'stotage' ),
                'tab'      => 'style',
                'controls' => [
                    [
                        'name' => 'custom_style',
                        'label' => esc_html__( 'Style', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => [
                            ''           => esc_html__( 'None', 'stotage' ),
                            'pxl-image-effect1' => esc_html__('Zigzag', 'stotage' ),
                            'pxl-image-tilt' => esc_html__('Tilt', 'stotage' ),
                            'slide-top-to-bottom' => esc_html__('Slide Top To Bottom ', 'stotage' ),
                            'pxl-image-effect2' => esc_html__('Slide Bottom To Top ', 'stotage' ),
                            'slide-right-to-left' => esc_html__('Slide Right To Left ', 'stotage' ),
                            'slide-left-to-right' => esc_html__('Slide Left To Right ', 'stotage' ),
                            'skew-in' => esc_html__( 'Skew In', 'stotage' ),
                        ],
                    ],
                    [
                        'name' => 'parallax_valuee',
                        'label' => esc_html__('Parallax Value', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'custom_style' => 'pxl-image-parallax',
                        ],
                        'default' => '40',
                        'description' => esc_html__('Enter number.', 'stotage' ),
                    ],
                    [
                        'name' => 'max_tilt',
                        'label' => esc_html__('Max Tilt', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'custom_style' => 'pxl-image-tilt',
                        ],
                        'default' => '10',
                        'description' => esc_html__('Enter number.', 'stotage' ),
                    ],
                    [
                        'name' => 'speed_tilt',
                        'label' => esc_html__('Speed Tilt', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'custom_style' => 'pxl-image-tilt',
                        ],
                        'default' => '400',
                        'description' => esc_html__('Enter number.', 'stotage' ),
                    ],
                    [
                        'name' => 'perspective_tilt',
                        'label' => esc_html__('Perspective Tilt', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'custom_style' => 'pxl-image-tilt',
                        ],
                        'default' => '1000',
                        'description' => esc_html__('Enter number.', 'stotage' ),
                    ],
                    [
                        'name' => 'speed_effect',
                        'label' => esc_html__('Speed', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'control_type' => 'responsive',
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100000,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-image-single' => 'animation-duration: {{SIZE}}ms;',
                        ],
                        'condition' => [
                            'custom_style!' => ['pxl-image-tilt','pxl-hover1'],
                        ],
                        'description' => 'Enter number, unit is ms.',
                    ],
                ]
            ],
            stotage_widget_animation_settings(),    
        ], 
    ],
],
stotage_get_class_widget_path()
);