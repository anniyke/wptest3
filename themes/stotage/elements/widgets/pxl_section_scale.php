<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_section_scale',
        'title' => esc_html__('BR Section Scale', 'stotage' ),
        'icon' => 'eicon-animation icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'bg_type',
                            'label' => esc_html__('Background Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'video' => 'Video',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'bg_img',
                            'label' => esc_html__('Background Image', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'bg_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'bg_video',
                            'label' => esc_html__('Video Link', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'bg_type' => ['video'],
                            ],
                            'description' => 'Video file (mp4 is recommended).'
                        ),
                    ),
                ),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);