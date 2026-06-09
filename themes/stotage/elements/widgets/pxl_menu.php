<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'stotage')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('BR Nav Menu', 'stotage'),
        'icon' => 'eicon-nav-menu icon-brand-elementor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'stotage'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'menu_type',
                            'label' => esc_html__('Menu Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'horizontal' => 'Horizontal',
                                'vertical' => 'Vertical',
                            ],
                            'default' => 'horizontal',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'float: none;',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__('Text Alignment', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-nav-vertical' => 'text-align: {{VALUE}};',
                            ],
                            'condition' => [
                                'menu_type' => 'vertical',
                            ],
                        ),
                        array(
                            'name' => 'max_height',
                            'label' => esc_html__('Max Height', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-nav-vertical' => 'max-height: {{SIZE}}{{UNIT}};overflow-y: auto; scrollbar-width: none;',
                            ],
                            'condition' => [
                                'menu_type' => 'vertical',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('First Level', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'hover_active_style',
                            'label' => esc_html__('Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'fr-style-default' => 'Default',
                                'fr-style-divider' => 'Divider Top',
                                'fr-style-box' => 'Box',
                                'fr-style-box box-2' => 'Box 2',
                                'fr-style-scroll' => 'Show when scrolling up',
                            ],
                            'default' => 'fr-style-default',
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-box .pxl-divider-move' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['fr-style-box','fr-style-box box-2'],
                            ],
                        ),
                        array(
                            'name' => 'dot_color_from',
                            'label' => esc_html__('Dot Color From', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-box .pxl-menu-primary > li > a .pxl-menu-item-text:before ' => '--gradient-color-from: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['fr-style-box'],
                            ],
                        ),
                        array(
                            'name' => 'dot_color_to',
                            'label' => esc_html__('Dot Color To', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-box .pxl-menu-primary > li > a .pxl-menu-item-text:before ' => '--gradient-color-to:{{VALUE}} !important;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['fr-style-box'],
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'dcolor',
                            'label' => esc_html__('Divider Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-divider1 .pxl-menu-primary > li > a:before' => 'background-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-divider3 .pxl-menu-primary > li > a:before' => 'background-color: {{VALUE}} !important;',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'hover_active_style' => ['fr-style-divider'],
                            ],
                        ),
                        array(
                            'name' => 'p_d',
                            'label' => esc_html__('Divider Position', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-divider1 .pxl-menu-primary > li > a:before' => 'bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-divider3 .pxl-menu-primary > li > a:before' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            
                            'condition' => [
                                'hover_active_style' => ['fr-style-divider1'],
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-divider2 .pxl-menu-primary > li > a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor > a:not(.is-one-page),{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a:not(.is-one-page), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a:not(.is-one-page), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a.pxl-onepage-active' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'arrow_color',
                            'label' => esc_html__('Arrow Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a .bi-plus' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a',
                        ),
                        array(
                            'name' => 'arrow_children_font_size',
                            'label' => esc_html__('Arrow Has Children - Font Size', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .bi-plus' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_space1',
                            'label' => esc_html__('Extra Space Bottom', 'stotage' ),
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
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'item_space_vertical',
                            'label' => esc_html__('Item Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_type' => 'vertical',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'stotage' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'stotage' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'menu_mega_type',
                            'label' => esc_html__('Menu Mega Type', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl-mega-full-width' => 'Full Width',
                                'pxl-mega-boxed' => 'Boxed',
                            ],
                            'default' => 'pxl-mega-full-width',
                        ),
                        array(
                            'name' => 'mega_space_left',
                            'label' => esc_html__('Mega Menu Spacer Left', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-mega-full-width .sub-menu.pxl-mega-menu' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_mega_type' => 'pxl-mega-full-width',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'mega_space_right',
                            'label' => esc_html__('Mega Menu Spacer Right', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-mega-full-width .sub-menu.pxl-mega-menu' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_mega_type' => 'pxl-mega-full-width',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'container_max_width',
                            'label' => esc_html__('Mega Menu Container Max Width', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-mega-boxed .pxl-megamenu > .sub-menu' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_mega_type' => 'pxl-mega-boxed',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Level', 'stotage'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a > span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a,{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a span, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a,{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a span, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-nav-menu.sub-style-default .sub-menu > li .pxl-menu-item-text::before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'sub_bg_color',
                            'label' => esc_html__('Box Background Color', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'stotage' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'sub_item_space',
                            'label' => esc_html__('Item Spacer', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_active_style_sub',
                            'label' => esc_html__('Hover/Active Style', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-style-default' => 'Default',
                            ],
                            'default' => 'sub-style-default',
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'sub_show_effect',
                            'label' => esc_html__('Show Effect', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-effect-fade' => 'Fade',
                                'show-effect-slideup' => 'Slide Up',
                                'show-effect-dropdown' => 'Dropdown',
                                'show-effect-slidedown' => 'Slide Down 3D',
                            ],
                            'default' => 'show-effect-slideup',
                            'condition' => [
                                'menu_type' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'sub_hover_space_top',
                            'label' => esc_html__('Box Spacer Top', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_hover_space_top_mega',
                            'label' => esc_html__('Box Spacer Top - Mega', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu.pxl-mega-menu' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_border_radius',
                            'label' => esc_html__('Border Radius', 'stotage' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-menu-primary .children' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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