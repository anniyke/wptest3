<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 * @package Case-Themes
 */

class stotage_Elementor_box_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_elementor_box',
            esc_html__( '* Stotage Elementor Box', 'stotage' ),
            array(
                'description' => esc_html__( 'Widget Builder', 'stotage' ),
                'customize_selective_refresh' => true,
            )
        );
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['post_type'] = $new_instance['post_type'];
        return $instance;
    }

    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $post_type_list = stotage_get_templates_option('widget','');
        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : '';
        ?>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('post_type')); ?>"><?php esc_html_e( 'Templates :', 'stotage' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_type') ); ?>">
                <?php 
                foreach ($post_type_list as $key => $value) {
                    ?>
                    <option value="<?php echo esc_attr($key) ?>"<?php if( $post_type == $key ){ echo 'selected="selected"';} ?>><?php echo esc_html($value); ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance) {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => '',
            'number'        => 3,
            'post_in'        => '',
        ) );

        $title = $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo wp_kses_post($args['before_widget']);

        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);


        global $woocommerce;
        $post_type = (int)$instance['post_type'];
        extract($args);

        
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', $before_widget);
        }
        if($post_type > 0){
            $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $post_type );
          pxl_print_html($content);  
      }
      echo ''.$after_widget;
  }
}

add_action( 'widgets_init', 'stotage_register_elementor_box_widget' );
function stotage_register_elementor_box_widget(){
    if(function_exists('pxl_register_wp_widget')){
        pxl_register_wp_widget( 'stotage_Elementor_box_Widget' );
    }
}