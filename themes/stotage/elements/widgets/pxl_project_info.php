<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_project_info',
        'title' => esc_html__('BR Project Info', 'stotage'),
        'icon' => 'eicon-library-upload icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'stotage'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'stotage' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'stotage'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'stotage'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                    ),
                ),
                stotage_widget_animation_settings(),
            ),
        ),
    ),
    stotage_get_class_widget_path()
);