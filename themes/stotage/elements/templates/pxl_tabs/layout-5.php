<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs_l4']) && !empty($settings['tabs_l4']) && count($settings['tabs_l4'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs5 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title">
            <?php foreach ($settings['tabs_l4'] as $key => $value) : 
                $icon_key = $widget->get_repeater_setting_key( 'pxl_icon_tab', 'icons', $key );
                ?>
                <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                    <?php if(!empty($value['pxl_icon_tab'])){
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon_tab'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
                        } ?> 
                    <?php echo pxl_print_html($value['titlel4']); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs_l4'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type4'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if($content['content_type4'] && !empty($content['desc4'])) {
                        echo pxl_print_html($content['desc4']); 
                    } elseif(!empty($content['content_template4'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template4']);
                        $tab_bd_ids[] = (int)$content['content_template4'];
                        pxl_print_html($tab_content);
                    } ?>        
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>
<?php endif; ?>