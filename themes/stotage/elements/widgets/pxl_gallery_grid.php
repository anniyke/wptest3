<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_gallery_grid',
        'title' => esc_html__('BR Gallery Grid', 'stotage'),
        'icon' => 'eicon-gallery-justified icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'gallery',
                            'label' => esc_html__('Gallery', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'img',
                                    'label' => esc_html__( 'Image', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'item_width',
                                    'label' => esc_html__('Width', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'description' => 'Default: 50%',
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-gallery-grid {{CURRENT_ITEM}}' => 'max-width: {{SIZE}}%;',
                                    ],
                                ),
                                array(
                                    'name' => 'padding_top',
                                    'label' => esc_html__('Padding Top', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'description' => 'Default: 55%',
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-gallery-grid {{CURRENT_ITEM}} .pxl-item--inner' => 'padding-top: {{SIZE}}%;',
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'grid_sizer',
                            'label' => esc_html__('Grid Sizer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 50%',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-gallery-grid .grid-sizer' => 'max-width: {{SIZE}}%;flex: 0 0 {{SIZE}}%',
                            ],
                        ),
                        array(
                            'name' => 'img_size_popup',
                            'label' => esc_html__('Image Size Popup', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'item_width_all',
                            'label' => esc_html__('Items Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 50%',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-gallery-grid .pxl-grid-item' => 'max-width: {{SIZE}}%;',
                            ],
                        ),
                        array(
                            'name' => 'padding_top_all',
                            'label' => esc_html__('Items Padding Top', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 55%',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-gallery-grid .pxl-grid-item .pxl-item--inner' => 'padding-top: {{SIZE}}%;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);