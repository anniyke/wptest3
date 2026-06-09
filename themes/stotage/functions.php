<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Case-Themes
 * @since Stotage 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}

 function set_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function get_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    return $count; 
}

function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_view($post_id);
}
add_action('wp_head', 'track_post_views');
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
stotage()->require_folder('inc');
stotage()->require_folder('inc/classes');
stotage()->require_folder('inc/theme-options');
stotage()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    stotage()->require_folder('woocommerce');
}
add_filter('wpcf7_autop_or_not', '__return_false');
// Elementor Preview CSS / JS
add_action( 'elementor/preview/enqueue_styles', function() {

    wp_enqueue_script(
        'theme-editor',
        get_template_directory_uri() . '/assets/js/custom-elementor-button.js',
        ['elementor-frontend'],
        null, // Phiên bản (có thể sửa thành phiên bản cụ thể nếu cần)
        true  // Đặt script vào footer
    );

    wp_enqueue_script( 'tsparticles' );
} );
