<?php
/**
 * Filters hook for the theme
 *
 * @package Case-Themes
 */

/* Custom Classs - Body */
function stotage_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = stotage()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = stotage()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $pxl_body_typography = stotage()->get_theme_opt('pxl_body_typography');
	    if($pxl_body_typography != 'google-font') {
	        $classes[] = ' body-'.$pxl_body_typography.' ';
	    }

	    $pxl_heading_typography = stotage()->get_theme_opt('pxl_heading_typography');
	    if($pxl_heading_typography != 'google-font') {
	        $classes[] = ' heading-'.$pxl_heading_typography.' ';
	    }

	    $theme_default = stotage()->get_theme_opt('theme_default');
	    if(isset($theme_default['font-family']) && $theme_default['font-family'] == false && $pxl_body_typography == 'google-font') {
	        $classes[] = ' pxl-font-default';
	    }

	    $header_layout = stotage()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = stotage()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_layout = stotage()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_layout = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_layout;

		$body_custom_class = stotage()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'stotage_body_classes' );

/* Post Type Support */
function stotage_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'service', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'stotage_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'stotage_support_default_cpt' );
function stotage_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'stotage_add_post_type' );
function stotage_add_post_type( $postypes ) {
	$theme_options = get_option(stotage()->get_option_name(), []);

	$portfolio_display = stotage()->get_theme_opt('portfolio_display', true);
	$portfolio_slug = !empty( $theme_options['portfolio_slug'] ) ? $theme_options['portfolio_slug'] : 'portfolio'; 
	$portfolio_name = !empty( $theme_options['portfolio_name'] ) ? $theme_options['portfolio_name'] : esc_html__( 'Portfolio', 'stotage' );

	$service_display = stotage()->get_theme_opt('service_display', true);
	$service_slug = !empty( $theme_options['service_slug'] ) ? $theme_options['service_slug'] : 'service'; 
	$service_name = !empty( $theme_options['service_name'] ) ? $theme_options['service_name'] : esc_html__( 'Service', 'stotage' );

	$event_display = stotage()->get_theme_opt('event_display', true);
	$event_slug = !empty( $theme_options['event_slug'] ) ? $theme_options['event_slug'] : 'event'; 
	$event_name = !empty( $theme_options['event_name'] ) ? $theme_options['event_name'] : esc_html__( 'Event', 'stotage' );
	if($portfolio_display) {
		$portfolio_status = true;
	} else {
		$portfolio_status = false;
	}
	if($service_display) {
		$service_status = true;
	} else {
		$service_status = false;
	}

	if($event_display) {
		$event_status = true;
	} else {
		$event_status = false;
	}

	$postypes['portfolio'] = array(
		'status' => $portfolio_status,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
				'slug'       => $portfolio_slug,
			),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
				'slug'       => $service_slug,
			),
		),
	);

	$postypes['event'] = array(
		'status' => $event_status,
		'item_name'  => $event_name,
		'items_name' => $event_name,
		'args'       => array(
			'rewrite'             => array(
				'slug'       => $event_slug,
			),
		),
	);

	return $postypes;
}

/* Custom Archive Post Type Link */
function stotage_custom_archive_service_link() {
    if( is_post_type_archive( 'service' ) ) {
    	$archive_service_link = stotage()->get_theme_opt('archive_service_link');
        wp_redirect( get_permalink($archive_service_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'stotage_custom_archive_service_link' );

function stotage_custom_archive_portfolio_link() {
    if( is_post_type_archive( 'portfolio' ) ) {
        $archive_portfolio_link = stotage()->get_theme_opt('archive_portfolio_link');
        wp_redirect( get_permalink($archive_portfolio_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'stotage_custom_archive_portfolio_link' );

function stotage_custom_archive_event_link() {
    if( is_post_type_archive( 'event' ) ) {
        $archive_event_link = stotage()->get_theme_opt('archive_event_link');
        wp_redirect( get_permalink($archive_event_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'stotage_custom_archive_event_link' );

add_filter( 'pxl_extra_taxonomies', 'stotage_add_tax' );
function stotage_add_tax( $taxonomies ) {
	$portfolio_categorie_slug = stotage()->get_theme_opt('portfolio_categorie_slug', 'portfolio-category');
	$portfolio_categorie_name = stotage()->get_theme_opt('portfolio_categorie_name', 'Portfolio Categorie');

	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => $portfolio_categorie_name,
		'taxonomies' => $portfolio_categorie_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_categorie_slug,
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['event-category'] = array(
		'status'     => true,
		'post_type'  => array( 'event' ),
		'taxonomy'   => 'Event Categories',
		'taxonomies' => 'Event Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'event-category'
 		 	),
		),
		'labels'     => array()
	);

	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'stotage_theme_builder_post_type' );
function stotage_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'stotage_theme_builder_layout_id' );
function stotage_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)stotage()->get_opt('header_layout');
	$header_sticky_layout = (int)stotage()->get_opt('header_sticky_layout');
	$footer_layout        = (int)stotage()->get_opt('footer_layout');
	$ptitle_layout        = (int)stotage()->get_opt('ptitle_layout');
	$product_bottom_content        = (int)stotage()->get_opt('product_bottom_content');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;
	if( $product_bottom_content > 0) 
		$layout_ids[] = $product_bottom_content;

	$slider_template = stotage_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = stotage_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = stotage_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = stotage_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'stotage_wg_get_source_builder' );
function stotage_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'stotage_add_editor_preview_style' );
function stotage_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', stotage_editor_preview_inline_styles() );
}
function stotage_editor_preview_inline_styles(){
    $theme_colors = stotage_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active,.elementor-edit-area-active .e-con {';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'stotage_archive_title_remove_label' );
function stotage_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'stotage_comment_reply_text' );
function stotage_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'stotage').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'stotage_enable_pagepopup' );
function stotage_enable_pagepopup() {
	return false;
}
add_filter( 'pxl_enable_megamenu', 'stotage_enable_megamenu' );
function stotage_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'stotage_enable_onepage' );
function stotage_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'stotage_support_awesome_pro' );
function stotage_support_awesome_pro() {
	return false;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'stotage_add_icons_to_pxl_iconpicker_field' );
function stotage_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "stotage_add_icons_to_megamenu");
function stotage_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'stotage_comment_field_to_bottom' );
function stotage_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'stotage_export_wp_settings' );
function stotage_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'stotage_add_server_info');
function stotage_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.casethemes.net/',
    'docs_url' => 'https://doc.casethemes.net/stotage/',
    'plugin_url' => 'https://api.casethemes.net/plugins/',
    'demo_url' => 'https://stotage.casethemes.net/',
    'support_url' => 'https://casethemes.ticksy.com/',
    'help_url' => 'https://doc.casethemes.net/stotage',
    'email_support' => 'casethemesagency@gmail.com',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'stotage_template_type_support' );
function stotage_template_type_support($type) {
	$extra_type = [
		'header'       => esc_html__('Header Desktop', 'stotage'),
		'header-mobile'          => esc_html__('Header Mobile', 'stotage'),
		'widget'          => esc_html__('Widget Sidebar', 'stotage'),
        'footer'       => esc_html__('Footer', 'stotage'), 
        'mega-menu'    => esc_html__('Mega Menu', 'stotage') ,
		'page-title'          => esc_html__('Page Title', 'stotage'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'stotage'), 
		'tab'          => esc_html__('Tab', 'stotage'), 
		'popup'          => esc_html__('Popup', 'stotage'),
		'page'          => esc_html__('Page', 'stotage'),
		'slider'          => esc_html__('Slider', 'stotage'),
	];
	return $extra_type;
}

/* Taxonomy Meta Register */ 
add_action( 'pxl_taxonomy_meta_register', 'stotage_tax_options_register' );
function stotage_tax_options_register( $metabox ) {
   
	$panels = [
		'category' => [
			'opt_name'            => 'tax_post_option',
			'display_name'        => esc_html__( 'Stotage Settings', 'stotage' ),
			'show_options_object' => false,
			'sections'  => [
				'tax_post_settings' => [
					'title'  => esc_html__( 'Stotage Settings', 'stotage' ),
					'icon'   => 'el el-refresh',
					'fields' => array(

						array(
				            'id'       => 'bg_category',
				            'type'     => 'media',
				            'title'    => esc_html__('Select Banner', 'stotage'),
				            'default'  => '',
				            'url'      => false,
				        ),

					)
				]
			]
		],
		    
	];
 
	$metabox->add_meta_data( $panels );
}

/* Switch Swiper Version  */
add_filter( 'pxl-swiper-version-active', 'stotage_set_swiper_version_active' );
function stotage_set_swiper_version_active($version){
  $version = '8.4.5'; //5.3.6, 8.4.5, 10.1.0
  return $version;
}

/* Search Result  */
function stotage_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'stotage_custom_post_types_in_search_results' );

/* Add Custom Font Face */
add_filter( 'elementor/fonts/groups', 'stotage_update_elementor_font_groups_control' );
function stotage_update_elementor_font_groups_control($font_groups){
  $pxlfonts_group = array( 'pxlfonts' => esc_html__( 'Sakira Fonts', 'stotage' ) );
  return array_merge( $pxlfonts_group, $font_groups );
}

add_filter( 'elementor/fonts/additional_fonts', 'stotage_update_elementor_font_control' );
function stotage_update_elementor_font_control($additional_fonts){
  $additional_fonts['Burgundia'] = 'pxlfonts';
  $additional_fonts['Satoshi'] = 'pxlfonts';
  return $additional_fonts;
}
// add custom font to redux
add_filter( 'redux/'.stotage()->get_option_name().'/field/typography/custom_fonts', 'casethemes_add_redux_option_typo_customfont', 10, 1 ); 
function casethemes_add_redux_option_typo_customfont($fonts){
	$fonts = [
		'Theme Custom Fonts' => [
			'Burgundia'          => 'Burgundia',
			'Satoshi'          => 'Satoshi'
		]
	];
	return $fonts;
}