<?php
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
    'center_slide'                  => 'true', 
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
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel3" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'stotage'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219Z" fill="#C7AA72"/>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219Z" fill="#C7AA72"/>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219Z" fill="#C7AA72"/>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219Z" fill="#C7AA72"/>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.08203 1.24219C7.41016 0.585938 8.33984 0.613281 8.64062 1.24219L10.4453 4.87891L14.4375 5.45312C15.1484 5.5625 15.4219 6.4375 14.9023 6.95703L12.0312 9.77344L12.7148 13.7383C12.8242 14.4492 12.0586 14.9961 11.4297 14.668L7.875 12.7812L4.29297 14.668C3.66406 14.9961 2.89844 14.4492 3.00781 13.7383L3.69141 9.77344L0.820312 6.95703C0.300781 6.4375 0.574219 5.5625 1.28516 5.45312L5.30469 4.87891L7.08203 1.24219Z" fill="#C7AA72"/>
                                    </svg>
                                </div>
                                <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                <div class="bottom">
                                    <?php if(!empty($image['id'])) { 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '90x90',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];?>
                                        <div class="pxl-item--avatar ">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="right">
                                        <h3 class="pxl-item--title"><?php echo pxl_print_html($title); ?></h3>
                                        <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-wrap-arrow pxl-flex-middle">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-2"  >
                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.90625 9.64453C4.76562 9.82031 4.48438 9.82031 4.34375 9.64453L0.230469 5.56641C0.0546875 5.39062 0.0546875 5.14453 0.230469 4.96875L4.34375 0.890625C4.48438 0.714844 4.76562 0.714844 4.90625 0.890625L5.1875 1.13672C5.32812 1.3125 5.32812 1.55859 5.1875 1.73438L2.23438 4.65234H15.4531C15.6641 4.65234 15.875 4.86328 15.875 5.07422V5.42578C15.875 5.67188 15.6641 5.84766 15.4531 5.84766H2.23438L5.1875 8.80078C5.32812 8.97656 5.32812 9.22266 5.1875 9.39844L4.90625 9.64453Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-2">
                            
                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.0586 0.890625C11.1992 0.714844 11.4805 0.714844 11.6562 0.890625L15.7344 4.96875C15.9102 5.14453 15.9102 5.39062 15.7344 5.56641L11.6562 9.64453C11.4805 9.82031 11.1992 9.82031 11.0586 9.64453L10.7773 9.39844C10.6367 9.22266 10.6367 8.97656 10.7773 8.80078L13.7305 5.84766H0.546875C0.300781 5.84766 0.125 5.67188 0.125 5.42578V5.07422C0.125 4.86328 0.300781 4.65234 0.546875 4.65234H13.7305L10.7773 1.73438C10.6367 1.55859 10.6367 1.3125 10.7773 1.13672L11.0586 0.890625Z" fill="white"/>
                            </svg>

                        </div>
                    </div> 
                <?php endif; ?>
        <?php endif; ?>

    </div>
<?php endif; ?>
