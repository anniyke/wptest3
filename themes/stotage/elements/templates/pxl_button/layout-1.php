<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$template = (int)$widget->get_setting('popup_template','0');
if($template > 0 ){
    if ( !has_action( 'pxl_anchor_target_page_popup_'.$template) ){
        add_action( 'pxl_anchor_target_page_popup_'.$template, 'stotage_hook_anchor_page_popup' );
    } 
}

?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-button <?php echo esc_attr($settings['btn_action'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="btn <?php echo esc_attr($settings['btn_text_effect'].' '.$settings['btn_style'].' '.$settings['pxl_animate'].' '.$settings['bt_style'].' '.' pxl-icon--'.$settings['icon_align']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-target=".pxl-page-popup-template-<?php echo esc_attr($template); ?>">
        <?php if ($settings['btn_style'] != 'btn-2-icons'): ?>
            <?php if(!empty($settings['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
        <?php endif ?>
        <?php if ($settings['btn_style'] == 'btn-2-icons'): ?>
            <?php if(!empty($settings['btn_icon_2'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon_2'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
        <?php endif ?>
        <span class="pxl--btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
            <?php if ($settings['btn_style'] == 'btn-2-icons'): ?>
                <?php if(!empty($settings['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
            <?php endif ?>
            <?php 
            if($settings['btn_text_effect'] == 'btn-text-nina' || $settings['btn_text_effect'] == 'btn-text-nanuk') {
                $chars = str_split($settings['text']);
                foreach ($chars as $value) {
                    if($value == ' ') {
                        echo '<span class="spacer">&nbsp;</span>';
                    } else {
                        echo '<span>'.$value.'</span>';
                    }
                }
            } elseif($settings['btn_text_effect'] == 'btn-text-smoke' || $settings['btn_text_effect'] == 'btn-text-reverse') { ?>
                <span class="pxl-text--front">
                    <span class="pxl-text--inner">
                        <?php $chars = str_split($settings['text']);
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.$value.'</span>';
                            }
                        } ?>
                    </span>
                </span>
                <span class="pxl-text--back">
                    <span class="pxl-text--inner">
                        <?php $chars = str_split($settings['text']);
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.$value.'</span>';
                            }
                        } ?>
                    </span>
                </span>
            <?php } else {
                echo pxl_print_html($settings['text']);
            }
            ?>
        </span>
    </a>
</div>