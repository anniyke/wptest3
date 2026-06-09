<div class="pxl-scroll-sections">
    <?php if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): ?>
        <ul class="pxl-list-sections">
            <?php
                foreach ($settings['link'] as $key => $link):
                    $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                    $widget->add_render_attribute( $icon_key, [
                        'class' => $link['pxl_icon'],
                        'aria-hidden' => 'true',
                    ] );
                    $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                    if ( ! empty( $link['link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );

                        if ( $link['link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    ?>
                    <li class="pxl-item--link <?php echo esc_attr($settings['pxl_animate'])?>">
                        <a class="is-one-page" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php if(!empty($link['pxl_icon'])){
                                \Elementor\Icons_Manager::render_icon( $link['pxl_icon'], [ 'aria-hidden' => 'true' ], 'i' );
                            } ?>
                            <span><?php echo pxl_print_html($link['text']); ?></span>
                        </a>
                    </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>