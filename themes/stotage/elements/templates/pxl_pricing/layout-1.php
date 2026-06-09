<?php
if ( ! empty( $settings['button_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

    if ( $settings['button_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['button_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="content-inner-left">
        <?php if(isset($settings['pri']) && !empty($settings['pri']) && count($settings['pri'])): ?>
        <div class="pxl-item--plan ">
            <div class="plan-active"></div>
            <div class="list-plan">
                <?php foreach ($settings['pri'] as $key => $value): ?>
                    <span class="plan"><?php echo pxl_print_html($value['plan_text'])?></span>
                <?php endforeach; ?>
            </div>
            <span class="icon-arrow">
                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.71875 5.875L1.09375 1.28125C0.9375 1.15625 0.9375 0.90625 1.09375 0.75L1.71875 0.15625C1.875 0 2.09375 0 2.25 0.15625L6 3.84375L9.71875 0.15625C9.875 0 10.125 0 10.25 0.15625L10.875 0.75C11.0312 0.90625 11.0312 1.15625 10.875 1.28125L6.25 5.875C6.09375 6.03125 5.875 6.03125 5.71875 5.875Z" fill="white"/>
                </svg>
            </span>
        </div>
    <?php endif; ?>
    <?php if(!empty($settings['desc'])) : ?>
        <p class="pxl-desc">
            <?php echo pxl_print_html($settings['desc']); ?>
        </p>
    <?php endif; ?>
    <?php if(!empty($settings['extra_text'])) : ?>
        <p class="extra-text">
            <?php echo pxl_print_html($settings['extra_text']); ?>
        </p>
    <?php endif; ?>
    <?php if(isset($settings['pri']) && !empty($settings['pri']) && count($settings['pri'])): ?>
    <div class="pxl-item--price-list ">
        <?php foreach ($settings['pri'] as $key => $value): ?>
            <div class="pxl-item--price">
                <span class="price-month active"><?php echo pxl_print_html($value['pri_month'])?></span>
                <span class="price-month extra"><?php echo pxl_print_html($value['pri_extra'])?></span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>
<div class="content-inner-right">
    <div class="content-inner">
        <div class="left">
            <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <div class="pxl-item--feature">
                <?php foreach ($settings['feature'] as $key => $value): ?>
                    <div class="content ">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16.5" cy="16.5" r="16" fill="#111112" stroke="#29292A"/>
                            <g opacity="0.2" clip-path="url(#clip0_5_1569)">
                                <path d="M17.4359 15.5641V9H15.5641V15.5641H9V17.4359H15.5641V24H17.4359V17.4359H24V15.5641H17.4359Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_5_1569">
                                    <rect width="15" height="15" fill="white" transform="translate(9 9)"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <?php echo pxl_print_html($value['feature_text'])?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['button_text'])) : ?>
            <a class="btn pxl-item--button" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"></path>
                    </svg>
                <?php echo pxl_print_html($settings['button_text']); ?>
            </a>
        <?php endif; ?>
    </div>
    <?php if(!empty($settings['image']['id'])) :
        $img = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => 'full',
        ));
        $thumbnail_url = $img['url']; 
        ?>
        <div class="pxl-item--image" style="background-image:url(<?php echo esc_url($thumbnail_url); ?>);">
        </div>
    <?php endif; ?>
</div>
</div>
</div>