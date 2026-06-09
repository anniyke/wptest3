<?php
/**
* The Stotage_Admin_Import class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Stotage_Admin_Import extends Stotage_Admin_Page {
	protected $id = null;
	protected $page_title = null;
	protected $menu_title = null;
	public $parent = null;
	public function __construct() {

		$this->id = 'pxlart-import-demos';
		$this->page_title = esc_html__( 'Import Demos', 'stotage' );
		$this->menu_title = esc_html__( 'Import Demos', 'stotage' );
		$this->parent = 'pxlart';
		//$this->position = '10';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-demos.php' );
	}


	public function save() {

	}
}
new Stotage_Admin_Import;