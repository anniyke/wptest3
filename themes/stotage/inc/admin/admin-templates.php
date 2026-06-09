<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Stotage_Admin_Templates extends Stotage_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'stotage' ),
		    esc_html__( 'Templates', 'stotage' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Stotage_Admin_Templates;
