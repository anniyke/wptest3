<div class="pxl-process pxl-process2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['step'])) : ?>
            <div class="pxl-item--step">
                <?php echo esc_attr($settings['step']); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
    </div>
</div>