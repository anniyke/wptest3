<?php if(!function_exists('stotage_configs')){
    function stotage_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'stotage'), 
                    'value' => stotage()->get_opt('primary_color', '#CB360F')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'stotage'), 
                    'value' => stotage()->get_opt('secondary_color', '#ffffff')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'stotage'), 
                    'value' => stotage()->get_opt('third_color', '#C2C2C2')
                ],
                'body_bg'   => [
                    'title' => esc_html__('Body Background Color', 'stotage'), 
                    'value' => stotage()->get_opt('body_bg_color', '#111112')
                ],
            ],
            'gradient' => [
                'color-from' => stotage()->get_opt('gradient_color', ['from' => '#FF4969'])['from'],
                'color-to' => stotage()->get_opt('gradient_color', ['to' => '#FC9D44'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('stotage_inline_styles')) {
    function stotage_inline_styles() {  

        $theme_colors      = stotage_configs('theme_colors');
        //$link_color        = stotage_configs('link');
        $gradient_color    = stotage_configs('gradient');
        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  stotage_hex_rgb($value['value']));
        }
            // foreach ($link_color as $color => $value) {
            //     printf('--link-%1$s: %2$s;', $color, $value);
            // }
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        }
        echo '}';

        return ob_get_clean();

    }
}
