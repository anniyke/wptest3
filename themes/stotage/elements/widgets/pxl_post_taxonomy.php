<?php
$post_term_options_category = pxl_get_post_taxonomy('portfolio-category');
$post_term_options_tags = pxl_get_post_taxonomy('post_tag');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_taxonomy',
        'title' => esc_html__('BR Portfolio Taxonomy', 'stotage' ),
        'icon' => 'eicon-taxonomy-filter icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'stotage' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'taxonomy_type',
                            'label' => esc_html__('Taxonomy', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'categories' => [
                                    'title' => esc_html__('Categories', 'stotage' ),
                                    'icon' => 'eicon-single-post',
                                ],
                                'tags' => [
                                    'title' => esc_html__('Tags', 'stotage' ),
                                    'icon' => 'eicon-tags',
                                ],
                            ],
                        ),
                        array(
                            'name' => 'source_categories',
                            'label' => esc_html__('Select Categories', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options_category,
                            'condition' => [
                                'taxonomy_type' => 'categories',
                            ],
                        ),
                        array(
                            'name' => 'show_post_counts',
                            'label' => esc_html__('Show Post Counts', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'taxonomy_type' => 'categories',
                            ],
                        ),
                        array(
                            'name' => 'source_tags',
                            'label' => esc_html__('Select Tags', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options_tags,
                            'condition' => [
                                'taxonomy_type' => 'tags',
                            ],
                        ),
                    ),
                ),
                stotage_widget_animation_settings()
            ),
        ),
    ),
    stotage_get_class_widget_path()
);