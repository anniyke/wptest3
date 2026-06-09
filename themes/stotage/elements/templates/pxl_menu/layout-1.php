<?php
$p_menu = stotage()->get_page_opt('p_menu');
if(!empty($p_menu)) {
    $settings['menu'] = $p_menu;
}
$menu_item_icon = '';
if(!empty($settings['pxl_icon']['value'])) {
    $menu_item_icon = $settings['pxl_icon']['value'];
}

if(!empty($settings['menu'])) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($settings['menu_mega_type'].' '.'pxl-nav-'.$settings['menu_type'].' '.$settings['hover_active_style'].' '.$settings['sub_show_effect'].' '.$settings['pxl_animate']); ?> <?php echo esc_attr($settings['hover_active_style_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'walker'     => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
            'link_before'     => '<span class="pxl-menu-item-text">',
            'link_after'      => '<i class="bootstrap-icons bi-plus pxl-hide"></i><span class="pxl-item-menu-icon pxl-hide '.$menu_item_icon.'"></span></span>',
            'menu'        => wp_get_nav_menu_object($settings['menu']))
        ); ?>
        <?php if($settings['hover_active_style'] == 'fr-style-box' || $settings['hover_active_style'] == 'fr-style-box box-2') : ?>
            <div class="pxl-divider-move"></div>
        <?php endif; ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($settings['menu_mega_type'].' '.'pxl-nav-'.$settings['menu_type'].' '.$settings['hover_active_style'].' '.$settings['sub_show_effect']); ?> <?php echo esc_attr($settings['hover_active_style_sub']); ?>">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'link_before'     => '<span class="pxl-menu-item-text">',
            'link_after'      => '<i class="bootstrap-icons bi-plus pxl-hide"></i></span><span class="pxl-item-menu-icon pxl-hide '.$menu_item_icon.'"></span></span>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
        <?php if($settings['hover_active_style'] == 'fr-style-box' || $settings['hover_active_style'] == 'fr-style-box box-2') : ?>
            <div class="pxl-divider-move"></div>
        <?php endif; ?>
    </div>
<?php } ?>