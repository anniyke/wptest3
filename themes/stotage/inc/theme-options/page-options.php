<?php

add_action( 'pxl_post_metabox_register', 'stotage_page_options_register' );
function stotage_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'stotage' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'stotage' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'stotage' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'           => 'custom_sub_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Sub title', 'stotage' ),
								'subtitle'     => esc_html__( 'Add short description for page title', 'stotage' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							), 
						),
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						stotage_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						stotage_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'logo_m',
								'type'     => 'media',
								'title'    => esc_html__('Mobile Logo', 'stotage'),
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'stotage' ),
								'options'  => stotage_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'stotage'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'stotage'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'stotage'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'stotage'),
								),
								'default'  => '-1',
							),
						),
		
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'stotage' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'loader' => [
					'title'  => esc_html__( 'Loader', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields'     => array(
						array(
							'id'       => 'site_loader_p',
							'type'     => 'switch',
							'title'    => esc_html__('Loader', 'stotage'),
							'default'  => false
						),
						array(
							'id'       => 'loader_logo_p',
							'type'     => 'media',
							'title'    => esc_html__('Logo', 'stotage'),
							'url'      => false,
							'required' => array( 0 => 'site_loader_p', 1 => 'equals', 2 => true ),
						),
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						stotage_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'stotage'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'stotage'),
									'on' => esc_html__('On', 'stotage'),
									'off' => esc_html__('Off', 'stotage'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'stotage'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'stotage'),
									'style-round' => esc_html__('Round', 'stotage'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'content_bgp_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Body Background Color', 'stotage'),
								'subtitle' => esc_html__('Body Background color.', 'stotage'),
								'output'   => array('background-color' => 'body')
							),
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'stotage'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'secondary_color',
								'type'        => 'color',
								'title'       => esc_html__('Secondary Color', 'stotage'),
								'transparent' => false,
								'default'     => ''
							),
						)
					)
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'stotage'),
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header1' => [
					'title'  => esc_html__( 'Header', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						stotage_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						stotage_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(

							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'stotage' ),
								'options'  => stotage_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'stotage'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'stotage'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'stotage'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'stotage'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'stotage' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 

							// array(
							// 	'id'       => 'portfolio_icon_type',
							// 	'type'     => 'button_set',
							// 	'title'    => esc_html__('Icon Type', 'stotage'),
							// 	'options'  => array(
							// 		'icon'  => esc_html__('Icon', 'stotage'),
							// 		'image'  => esc_html__('Image', 'stotage'),
							// 	),
							// 	'default'  => 'icon'
							// ),
							// array(
							// 	'id'       => 'portfolio_icon_font',
							// 	'type'     => 'pxl_iconpicker',
							// 	'title'    => esc_html__('Icon', 'stotage'),
							// 	'required' => array( 0 => 'portfolio_icon_type', 1 => 'equals', 2 => 'icon' ),
							// 	'force_output' => true
							// ),
							// array(
							// 	'id'       => 'portfolio_icon_img',
							// 	'type'     => 'media',
							// 	'title'    => esc_html__('Icon Image', 'stotage'),
							// 	'default' => '',
							// 	'required' => array( 0 => 'portfolio_icon_type', 1 => 'equals', 2 => 'image' ),
							// 	'force_output' => true
							// ),
							array(
								'id'      => 'video_url',
								'type'    => 'text',
								'title'   => esc_html__('Video Url', 'stotage'),
								'default' => '',
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						stotage_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'stotage'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'stotage'),
									'on' => esc_html__('On', 'stotage'),
									'off' => esc_html__('Off', 'stotage'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'stotage'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'stotage'),
									'style-round' => esc_html__('Round', 'stotage'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header1' => [
					'title'  => esc_html__( 'Header', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						stotage_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						stotage_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'stotage' ),
								'options'  => stotage_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'stotage'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'stotage'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'stotage'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'stotage'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'stotage' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						stotage_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'stotage'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'stotage'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'stotage'),
									'image'  => esc_html__('Image', 'stotage'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'stotage'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'stotage'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__( 'Header', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						stotage_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						stotage_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'stotage' ),
								'options'  => stotage_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'stotage'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'stotage'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'stotage'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'stotage'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'stotage' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						stotage_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'stotage'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'stotage'),
									'on' => esc_html__('On', 'stotage'),
									'off' => esc_html__('Off', 'stotage'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'stotage'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'stotage'),
									'style-round' => esc_html__('Round', 'stotage'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'event' => [
			'opt_name'            => 'pxl_event_options',
			'display_name'        => esc_html__( 'Industries Options', 'stotage' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [ 
					'title'  => esc_html__( 'General', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'event_avatar',
								'type'     => 'media',
								'title'    => esc_html__('Avatar', 'stotage'),
								'default' => '',
								'force_output' => true
							),
							array(
								'id'=> 'author',
								'type' => 'text',
								'title' => esc_html__('Author', 'stotage'),
								'default' => '',
							),
							
							array(
								'id'=> 'date',
								'type' => 'text',
								'title' => esc_html__('Date', 'stotage'),
								'default' => '',
							),
							array(
								'id'=> 'location',
								'type' => 'text',
								'title' => esc_html__('Location', 'stotage'),
								'default' => '',
							),
							array(
								'id'=> 'price',
								'type' => 'text',
								'title' => esc_html__('Price', 'stotage'),
								'default' => '',
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__( 'Header', 'stotage' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						stotage_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						stotage_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'stotage' ),
								'options'  => stotage_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'stotage'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'stotage'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'stotage'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'stotage'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'stotage' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						stotage_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'stotage' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						stotage_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'stotage' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'stotage' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						stotage_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'stotage'),
								'options'  => array(
									'show' => esc_html__('Show', 'stotage'),
									'hide'  => esc_html__('Hide', 'stotage'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'stotage'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'stotage'),
									'on' => esc_html__('On', 'stotage'),
									'off' => esc_html__('Off', 'stotage'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'stotage'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'stotage'),
									'style-round' => esc_html__('Round', 'stotage'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],

		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Options', 'stotage' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'stotage' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'stotage'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'stotage'), 
							'header'       => esc_html__('Header Desktop', 'stotage'),
							'header-mobile'       => esc_html__('Header Mobile', 'stotage'),
							'footer'       => esc_html__('Footer', 'stotage'), 
							'mega-menu'    => esc_html__('Mega Menu', 'stotage'), 
							'page-title'   => esc_html__('Page Title', 'stotage'), 
							'tab' => esc_html__('Tab', 'stotage'),
							'hidden-panel' => esc_html__('Hidden Panel', 'stotage'),
							'popup' => esc_html__('Popup', 'stotage'),
							'widget' => esc_html__('Widget Sidebar', 'stotage'),
							'page' => esc_html__('Page', 'stotage'),
							'slider' => esc_html__('Slider', 'stotage'),
							'404' => esc_html__('404', 'stotage'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'stotage'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'stotage'), 
							'px-header--transparent'       => esc_html__('Transparent', 'stotage'),
							'px-header--fixed'       => esc_html__('Fixed', 'stotage'),
							'px-header--fixed no-blur'       => esc_html__('Fixed No Blur (Scroll)', 'stotage'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),

					array(
						'id'    => 'header_mobile_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'stotage'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'stotage'), 
							'px-header--transparent'       => esc_html__('Transparent', 'stotage'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
					),

					array(
						'id'    => 'hidden_panel_position',
						'type'  => 'select',
						'title' => esc_html__('Hidden Panel Position', 'stotage'),
						'options' => [
							'top'       	   => esc_html__('Top', 'stotage'),
							'right'       	   => esc_html__('Right', 'stotage'),
						],
						'default' => 'right',
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'hidden_panel_height',
						'type'        => 'text',
						'title'       => esc_html__('Hidden Panel Height', 'stotage'),
						'subtitle'       => esc_html__('Enter number.', 'stotage'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
					),
					array(
						'id'          => 'hidden_panel_boxcolor',
						'type'        => 'color',
						'title'       => esc_html__('Box Color', 'stotage'),
						'transparent' => false,
						'default'     => '',
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),

					array(
						'id'          => 'header_sidebar_width',
						'type'        => 'slider',
						'title'       => esc_html__('Header Sidebar Width', 'stotage'),
						"default"   => 300,
						"min"       => 50,
						"step"      => 1,
						"max"       => 900,
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
					),

					array(
						'id'          => 'header_sidebar_border',
						'type'        => 'border',
						'title'       => esc_html__('Header Sidebar Border', 'stotage'),
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
						'default' => '',
					),
				),

			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
