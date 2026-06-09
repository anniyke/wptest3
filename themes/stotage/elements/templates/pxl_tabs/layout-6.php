<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs_l6']) && !empty($settings['tabs_l6']) && count($settings['tabs_l6'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs6 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title">
            <?php foreach ($settings['tabs_l6'] as $key => $value) : 
                $icon_key = $widget->get_repeater_setting_key( 'pxl_icon_tab_6', 'icons', $key );
                ?>
                <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                    <span class="title">
                        <?php if(!empty($value['pxl_icon_tab_6'])){
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon_tab_6'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
                        } ?> 
                        <?php echo pxl_print_html($value['titlel6']); ?>
                    </span>
                    <?php if(!empty($value['desc_title_6'])){  ?> 
                        <p class="desc-title">
                            <?php echo pxl_print_html($value['desc_title_6']); ?>
                        </p>
                    <?php  } ?> 
                </span>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs_l6'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type6'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if($content['content_type6'] && !empty($content['desc6'])) {
                        echo pxl_print_html($content['desc6']); 
                    } elseif(!empty($content['content_template6'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template6']);
                        $tab_bd_ids[] = (int)$content['content_template6'];
                        pxl_print_html($tab_content);
                    } ?>        
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>
<?php endif; ?>