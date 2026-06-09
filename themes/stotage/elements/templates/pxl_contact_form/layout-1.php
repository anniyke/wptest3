<?php
if(class_exists('WPCF7') && !empty($settings['form_id'])) : ?>
    <div class="pxl-contact-form pxl-contact-form1 <?php echo esc_attr($settings['btn_width'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $settings['form_id'] ).'"]'); ?>
    </div>
<?php endif; ?>
