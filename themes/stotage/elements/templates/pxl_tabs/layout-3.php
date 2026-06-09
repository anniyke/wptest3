<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs_l2']) && !empty($settings['tabs_l2']) && count($settings['tabs_l2'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs3 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title">
            <?php foreach ($settings['tabs_l2'] as $key => $value) : ?>
                <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                    <?php echo pxl_print_html($value['titlel2']); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs_l2'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type2'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if($content['content_type2'] && !empty($content['desc2'])) {
                        echo pxl_print_html($content['desc2']); 
                    } elseif(!empty($content['content_template2'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template2']);
                        $tab_bd_ids[] = (int)$content['content_template2'];
                        pxl_print_html($tab_content);
                    } ?>        
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>
<?php endif; ?>