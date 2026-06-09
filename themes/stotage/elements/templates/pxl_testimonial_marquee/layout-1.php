<?php
$show_star = $widget->get_setting('show_star');
if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])):
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
<div class="pxl-pxl_testimonial_marquee pxl-pxl_testimonial_marquee1 pxl-text-slide1 <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-text-slide <?php echo esc_attr($settings['effect']); ?>" <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>>
        <?php foreach ($settings['items'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : '';
            $text = isset($value['text']) ? $value['text'] : '';
            $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $style_star = isset($value['style_star']) ? $value['style_star'] : '';
            if(!empty($text)) : ?>
                <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">

                    <?php if( $show_star == 'true' ) : ?>
                        <div class="wrap-star">
                            <span class="count">
                                <?php 
                                echo pxl_print_html($style_star.'.0' );  
                                ?>
                            </span>
                            <span class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star ); ?>-star">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                  <path d="M8.99999 2.18653L6.95937 6.32403L2.39374 6.98965C1.57499 7.1084 1.24687 8.11778 1.84062 8.6959L5.14374 11.9147L4.36249 16.4615C4.22187 17.2834 5.08749 17.899 5.81249 17.5147L9.89687 15.3678L13.9812 17.5147C14.7062 17.8959 15.5719 17.2834 15.4312 16.4615L14.65 11.9147L17.9531 8.6959C18.5469 8.11778 18.2187 7.1084 17.4 6.98965L12.8344 6.32403L10.7937 2.18653C10.4281 1.44903 9.36874 1.43965 8.99999 2.18653Z" fill="#FCD444"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                  <path d="M8.99999 2.18653L6.95937 6.32403L2.39374 6.98965C1.57499 7.1084 1.24687 8.11778 1.84062 8.6959L5.14374 11.9147L4.36249 16.4615C4.22187 17.2834 5.08749 17.899 5.81249 17.5147L9.89687 15.3678L13.9812 17.5147C14.7062 17.8959 15.5719 17.2834 15.4312 16.4615L14.65 11.9147L17.9531 8.6959C18.5469 8.11778 18.2187 7.1084 17.4 6.98965L12.8344 6.32403L10.7937 2.18653C10.4281 1.44903 9.36874 1.43965 8.99999 2.18653Z" fill="#FCD444"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                  <path d="M8.99999 2.18653L6.95937 6.32403L2.39374 6.98965C1.57499 7.1084 1.24687 8.11778 1.84062 8.6959L5.14374 11.9147L4.36249 16.4615C4.22187 17.2834 5.08749 17.899 5.81249 17.5147L9.89687 15.3678L13.9812 17.5147C14.7062 17.8959 15.5719 17.2834 15.4312 16.4615L14.65 11.9147L17.9531 8.6959C18.5469 8.11778 18.2187 7.1084 17.4 6.98965L12.8344 6.32403L10.7937 2.18653C10.4281 1.44903 9.36874 1.43965 8.99999 2.18653Z" fill="#FCD444"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                  <path d="M8.99999 2.18653L6.95937 6.32403L2.39374 6.98965C1.57499 7.1084 1.24687 8.11778 1.84062 8.6959L5.14374 11.9147L4.36249 16.4615C4.22187 17.2834 5.08749 17.899 5.81249 17.5147L9.89687 15.3678L13.9812 17.5147C14.7062 17.8959 15.5719 17.2834 15.4312 16.4615L14.65 11.9147L17.9531 8.6959C18.5469 8.11778 18.2187 7.1084 17.4 6.98965L12.8344 6.32403L10.7937 2.18653C10.4281 1.44903 9.36874 1.43965 8.99999 2.18653Z" fill="#FCD444"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                  <path d="M8.99999 2.18653L6.95937 6.32403L2.39374 6.98965C1.57499 7.1084 1.24687 8.11778 1.84062 8.6959L5.14374 11.9147L4.36249 16.4615C4.22187 17.2834 5.08749 17.899 5.81249 17.5147L9.89687 15.3678L13.9812 17.5147C14.7062 17.8959 15.5719 17.2834 15.4312 16.4615L14.65 11.9147L17.9531 8.6959C18.5469 8.11778 18.2187 7.1084 17.4 6.98965L12.8344 6.32403L10.7937 2.18653C10.4281 1.44903 9.36874 1.43965 8.99999 2.18653Z" fill="#FCD444"/>
                              </svg>
                          </span>
                      </div>
                  <?php endif; ?>
                  <div class="pxl-item-desc"><?php echo pxl_print_html($desc); ?></div>
                  <div class="pxl-item-bottom">
                    <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-image">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php } ?>
                    <div class="pxl-item-right">
                        <h4 class="pxl-item--text"><?php echo pxl_print_html($text); ?></h4>
                        <span class="pxl-sub-title"><?php echo pxl_print_html($sub_title); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
