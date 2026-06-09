<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl-counter--value '.$settings['effect'].'',
    'data-duration' => $settings['duration'],
    'data-startnumber' => $settings['starting_number'],
    'data-endnumber' => $settings['ending_number'],
    'data-to-value' => $settings['ending_number'],
    'data-delimiter' => $settings['thousand_separator_char'],
] ); ?>
<div class="pxl-counter pxl-counter2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-counter--inner">
        <div class="pxl-counter--holder ">
            <svg width="172" height="172" viewBox="0 0 172 172" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="strokeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop class="stop-1" offset="0%" stop-color="#85EE00" />
                        <stop class="stop-2" offset="100%" stop-color="#85EE00" />
                    </linearGradient>
                </defs>
                <mask id="path-1-inside-1_55_267" fill="white">
                    <path d="M172 86C172 105.659 165.265 124.724 152.917 140.02C140.568 155.316 123.352 165.92 104.136 170.066C84.9194 174.212 64.8626 171.649 47.3063 162.804C29.75 153.959 15.7538 139.366 7.64901 121.456C-0.455771 103.546 -2.17991 83.3997 2.76377 64.3729C7.70746 45.3462 19.0205 28.5874 34.8187 16.888C50.6168 5.18857 69.9463 -0.745246 89.5878 0.0748697C109.229 0.894985 127.997 8.41953 142.765 21.3952L141.235 23.1364C126.865 10.5104 108.603 3.1887 89.4911 2.39069C70.379 1.59268 51.5704 7.36657 36.1981 18.7507C20.8257 30.1348 9.81757 46.4418 5.00713 64.9558C0.196686 83.4698 1.87435 103.073 9.76069 120.5C17.647 137.928 31.266 152.127 48.3492 160.734C65.4323 169.34 84.9485 171.834 103.647 167.8C122.346 163.766 139.098 153.448 151.113 138.564C163.129 123.68 169.682 105.129 169.682 86H172Z"/>
                </mask>
                <path 
                d="M172 86C172 105.659 165.265 124.724 152.917 140.02C140.568 155.316 123.352 165.92 104.136 170.066C84.9194 174.212 64.8626 171.649 47.3063 162.804C29.75 153.959 15.7538 139.366 7.64901 121.456C-0.455771 103.546 -2.17991 83.3997 2.76377 64.3729C7.70746 45.3462 19.0205 28.5874 34.8187 16.888C50.6168 5.18857 69.9463 -0.745246 89.5878 0.0748697C109.229 0.894985 127.997 8.41953 142.765 21.3952L141.235 23.1364C126.865 10.5104 108.603 3.1887 89.4911 2.39069C70.379 1.59268 51.5704 7.36657 36.1981 18.7507C20.8257 30.1348 9.81757 46.4418 5.00713 64.9558C0.196686 83.4698 1.87435 103.073 9.76069 120.5C17.647 137.928 31.266 152.127 48.3492 160.734C65.4323 169.34 84.9485 171.834 103.647 167.8C122.346 163.766 139.098 153.448 151.113 138.564C163.129 123.68 169.682 105.129 169.682 86H172Z" 
                stroke="url(#strokeGradient)" 
                stroke-width="6" 
                stroke-linejoin="round" 
                fill="none" 
                mask="url(#path-1-inside-1_55_267)"/>
            </svg>

            <div class="pxl-counter--number ">
                <span class="pxl-counter--prefix el-empty"><?php echo pxl_print_html($settings['prefix']); ?></span>
                <span <?php pxl_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
                <?php if(!empty($settings['suffix'])) : ?>
                    <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <?php if(!empty($settings['title'])) : ?>
        <div class="pxl-counter--title "><?php echo pxl_print_html($settings['title']); ?></div>
    <?php endif; ?>
</div>
