<?php 
$number = 1;
$html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs-slip pxl-tabs-slip1" >
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content pxl-item--content-<?php echo esc_attr($number++); ?>">
                    <?php 
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                        $tab_bd_ids[] = (int)$content['content_template'];
                        pxl_print_html($tab_content);
                    ?>        
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>