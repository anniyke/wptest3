<?php

if (!class_exists('Stotage_Header')) {

    class Stotage_Header
    {
        public function getHeader()
        {
            
            $header_layout = (int)stotage()->get_opt('header_layout'); 
            $header_layout_sticky = (int)stotage()->get_opt('header_layout_sticky'); 
             
            if ($header_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/header/default');
            } else {
                $args = [
                    'header_layout' => $header_layout,
                    'header_layout_sticky' => $header_layout_sticky
                ];
                get_template_part( 'template-parts/header/elementor','', $args );
            } 
             
        }
 
    }
}
