<?php if(isset($settings['language']) && !empty($settings['language']) && count($settings['language'])): ?>
<div class="pxl-language-switch <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="language">
        <div class="language-first"> 
                <?php if ($settings['text_first']!='') {
                    echo pxl_print_html($settings['text_first']);
                }else {
                    echo pxl_print_html('Eng','stotage');
                } ?> <i class="caseicon-angle-arrow-down"></i></div>
        </div>
        <div class="list-language">
            <?php foreach ($settings['language'] as $key => $value):
                $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $value['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                    if ( $value['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $value['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                if(!empty($value['name'])) : ?>
                    <div class="pxl--item">
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo esc_attr($value['name']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>