 <?php
 $is_new = \Elementor\Icons_Manager::is_migration_allowed();
 $col_xs = $widget->get_setting('col_xs', '');
 $col_sm = $widget->get_setting('col_sm', '');
 $col_md = $widget->get_setting('col_md', '');
 $col_lg = $widget->get_setting('col_lg', '');
 $col_xl = $widget->get_setting('col_xl', '');
 $col_xxl = $widget->get_setting('col_xxl', '');
 if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$pxl_g_id = uniqid();
if(isset($settings['icons']) && !empty($settings['icons']) && count($settings['icons'])): ?>
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-icons-carousel pxl-icons-carousel1" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['icons'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'icon_link', 'value', $key );
                        if ( ! empty( $value['icon_link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['icon_link']['url'] );

                            if ( $value['icon_link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $value['icon_link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="wrap-content">
                                    <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                                        <div class="icon-box elementor-repeater-item-<?php echo esc_attr($value['_id']); ?> " <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                            <?php if ( $is_new ):
                                                \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                                            elseif(!empty($value['pxl_icon'])): ?>
                                                <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!empty($title)) : ?>
                                            <h5 class="title-box"><?php echo pxl_print_html($title); ?></h5>
                                        <?php endif; ?>

                                        <?php if(!empty($desc)) : ?>
                                            <p class="description-box"><?php echo pxl_print_html($desc); ?></p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-swiper-arrow-wrap <?php echo esc_attr($settings['arr_style']); ?>">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon flaticon-next rtl-icon"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon flaticon-next rtl-icon"></i></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
