<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'stotage_register_required_plugins' );
function stotage_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.casethemes.net/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins'; 
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'stotage'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'stotage' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'stotage'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'stotage' ),
        ),  

        array(
            'name'               => esc_html__('Case Addons', 'stotage'),
            'slug'               => 'case-addons',
            'source'             => 'case-addons.zip',
            'required'           => true,
            'logo'        => $images . '/case-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Farmas WordPress Theme.', 'stotage' ),
        ),
        array(
            'name'               => esc_html__('Contact Form 7', 'stotage'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'stotage' ),
        ),
        // array(
        //     'name'               => esc_html__('Contact Form 7 Cost Calculator', 'stotage'),
        //     'slug'               => 'cf7-cost-calculator-price-calculation',
        //     'required'           => true,
        //     'logo'        => $images . '/price.png',
        //     'description' => esc_html__( 'Contact Form 7 Calculator', 'stotage' ),
        // ),
        // array(
        //     'name'               => esc_html__('Ultimate Addons for Contact Form 7', 'stotage'),
        //     'slug'               => 'ultimate-addons-for-contact-form-7',
        //     'required'           => true,
        //     'logo'        => $images . '/addons-ctf7.png',
        //     'description' => esc_html__( 'Addons for Contact Form 7 ', 'stotage' ),
        // ),
        // array(
        //     'name'               => esc_html__('WooCommerce', 'stotage'),
        //     'slug'               => "woocommerce",
        //     'required'           => true,
        //     'logo'        => $images . '/woo.png',
        //     'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'stotage' ),
        // ),

        // array(
        //     'name'               => esc_html__('WooCommerce Compare', 'stotage'),
        //     'slug'               => "woo-smart-compare",
        //     'required'           => true, 
        //     'logo'        => $images . '/woo-smart-compare.png',
        //     'description' => esc_html__( 'WPC Smart Compare allows users to get a quick look of products without opening the product page.', 'stotage' ),
        // ),
        // array(
        //     'name'               => esc_html__('WooCommerce Wishlist', 'stotage'),
        //     'slug'               => "woo-smart-wishlist",
        //     'required'           => true,
        //     'logo'        => $images . '/woo-smart-wishlist.png',
        //     'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'stotage' ),
        // ),
    );
    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );
}