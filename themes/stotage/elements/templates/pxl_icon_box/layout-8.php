<div class="pxl-icon-box pxl-icon-box8 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner ">
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon">
                <?php $img_icon  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
        <?php if ( !empty($settings['title']) || !empty($settings['desc']) ) : ?>
        <div class="pxl-item--content">
        <?php if ( !empty($settings['title']) ) : ?>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <?php echo pxl_print_html($settings['title']); ?>
            </<?php echo esc_attr($settings['title_tag']); ?>>
        <?php endif; ?>
        <?php if ( !empty($settings['desc']) ) : ?>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
