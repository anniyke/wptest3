<?php

use Elementor\Element_Base;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Schemes\Color;
use Elementor\Schemes\Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Includes\Elements\PXL_Container;

defined('ABSPATH') || die();

class Pxl_Elementor_Custom_Controls {

    public static $pxl_el_container_bg = array();

    public static function init() {

        add_action( 'elementor/frontend/before_render', [ __CLASS__, 'before_section_render' ], 1 );

        //pxl sticky layout
        add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

            if ( $element->get_name() === 'container' && 'section_layout_additional_options' === $section_id ) {

                $elementor_doc_selector = '.elementor';

                $element->start_controls_section(
                    'pxl_sticky_container_layout_section',
                    [
                        'label' => __( 'Sticky <span style="font-size: 1.5em; vertical-align:middle; margin-inline-start:0.35em;"><span>', 'stotage' ),
                        'tab' => Controls_Manager::TAB_LAYOUT,
                    ]
                );
                $element->add_control(
                    'col_fixed',
                    [
                        'label'   => esc_html__( 'Container Fixed', 'stotage' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'description' => esc_html__('Only applies to the original container.', 'stotage' ),
                        'options' => array(
                          'none'        => esc_html__( 'No', 'stotage' ),
                          'fixed'   => esc_html__( 'Yes', 'stotage' ),
                      ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-row-scroll-'
                    ]
                );

                $element->add_control(
                    'col_sticky',
                    [
                        'label'   => esc_html__( 'Container Sticky', 'stotage' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => array(
                            'none'           => esc_html__( 'No', 'stotage' ),
                            'sticky' => esc_html__( 'Yes', 'stotage' ),
                        ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-column-'
                    ]
                );

                $element->add_control(
                    'col_sticky_offset_top_2',
                    [
                        'label' => esc_html__( 'Sticky Offset Top', 'stotage' ),
                        'type' => 'text',
                        'description' => esc_html__('Enter number.', 'stotage' ),
                        'default'  => '30',
                        'selectors' => [
                            '{{WRAPPER}}.pxl-column-sticky' => 'top: {{VALUE}}'.'px',
                        ],
                        'condition' => [
                            'col_sticky' => 'sticky'
                        ]
                    ]
                );


                $element->add_control(
                    'full_content_with_space',
                    [
                      'label' => esc_html__( 'Full Content with space from?', 'stotage' ),
                      'type'         => \Elementor\Controls_Manager::SELECT,
                      'prefix_class' => 'pxl-full-content-with-space-',
                      'options'      => array(
                        'none'    => esc_html__( 'None', 'stotage' ),
                        'start'   => esc_html__( 'Start', 'stotage' ),
                        'end'     => esc_html__( 'End', 'stotage' ),
                    ),
                      'default'      => 'none',
                  ]
              );

                $element->add_control(
                    'pxl_container_width',
                    [
                        'label' => esc_html__('Container Width', 'stotage'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => 1200,
                        'condition' => [
                          'full_content_with_space!' => 'none'
                      ]           
                  ]
              );
                $element->end_controls_section();

                $element->start_controls_section(
                    'pxl_line_container_layout_section',
                    [
                        'label' => __( 'Line <span style="font-size: 1.5em; vertical-align:middle; margin-inline-start:0.35em;"><span>', 'stotage' ),
                        'tab' => Controls_Manager::TAB_LAYOUT,
                    ]
                );
                $element->add_control(
                    'container_line_custom',
                    [
                        'label'   => esc_html__( 'Line', 'stotage' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => array(
                            'none'           => esc_html__( 'Off', 'stotage' ),
                            'on' => esc_html__( '5 Lines', 'stotage' ),
                            'on lines-2' => esc_html__( '2 Lines', 'stotage' ),
                        ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-container-line-'
                    ]
                );
                $element->add_control(
                    'line-container_color',
                    [
                        'label' => esc_html__('Liner Color', 'stotage' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-line' => 'background-color: {{VALUE}};',
                        ],
                        'condition' => [
                            'container_line_custom!' => ['none'],
                        ],
                    ]
                );
                $element->end_controls_section();

                $element->start_controls_section(
                    'pxl_background_video_section',
                    [
                        'label' => __( 'Background Video <span style="font-size: 1.5em; vertical-align:middle; margin-inline-start:0.35em;"><span>', 'stotage' ),
                        'tab' => Controls_Manager::TAB_LAYOUT,
                    ]
                );
                $element->add_control(
                    'container_bgr_video_status',
                    [
                        'label'   => esc_html__( 'Display', 'stotage' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => array(
                            'none'           => esc_html__( 'Off', 'stotage' ),
                            'on' => esc_html__( 'On', 'stotage' ),
                        ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-container-video-background-'
                    ]
                );
                $element->add_control(
                    'container_video_url',
                    [
                        'label' => esc_html__( 'URL Video', 'stotage' ),
                        'type' => 'text',
                        'description' => esc_html__('Note: When using this option, you should set the color for all other sections so that it covers the video section when scrolling to other sections.', 'stotage' ),
                        'condition' => [
                            'container_bgr_video_status' => 'on'
                        ]
                    ]
                );
                $element->end_controls_section();
            }

        }, 10, 2 );

add_action('elementor/editor/after_enqueue_scripts', function () {
    ?>
    <script>
        jQuery(document).ready(function ($) {
            setInterval(function () {
                $('.elementor-editor-container .elementor-editor-element-settings').each(function () {
                    if ($(this).find('.elementor-editor-element-play').length === 0) {
                        $(this).append(`
                            <li class="elementor-editor-element-setting elementor-editor-element-play" 
                                title="Play children inview animations" 
                                aria-label="Play children inview animations">
                                <i class="eicon-play"></i>
                            </li>
                        `);
                    }
                });
            }, 1000);

            // Xử lý sự kiện khi click vào nút
            $(document).on('click', '.elementor-editor-element-play', function () {
                var $widget = $(this).closest('.elementor-editor-element');

                // Reset animation
                $widget.find('.wow').removeClass('animated').css('visibility', 'hidden');

                setTimeout(function () {
                    $widget.find('.wow').addClass('animated').css('visibility', 'visible');
                    new WOW().init(); // Restart WOW.js
                }, 100);
            });
        });
    </script>
    <?php
});
// Container star
add_action( 'elementor/element/after_section_end', function ( $element, $section_id ) {

    if ( $element->get_name() === 'container' && $section_id === 'section_layout_additional_options' ) {

        $element->start_controls_section(
            'pxl_container_star',
            [
                'label' => __( 'Star', 'stotage' ),
                'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $element->add_control(
            'pxl_container_star_color_option',
            [
                'label' => __( 'Star Option', 'stotage' ),
                'type'  => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'options' => [
                    'yes' => __( 'Yes', 'stotage' ),
                    'no' => __( 'No', 'stotage' ),
                ],
            ]
        );
        $element->add_control(
            'pxl_container_star_color',
            [
                'label' => __( 'Star Color', 'stotage' ),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'pxl_container_star_color_option' => 'yes',
                ],
            ]
        );
        $element->add_control(
            'pxl_container_star_number',
            [
                'label' => __( 'Star Number', 'stotage' ),
                'type'  => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'pxl_container_star_color_option' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'pxl_container_star_width',
            [
                'label' => __( 'Box Width', 'stotage' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw' ],
                'range' => [
                    'px' => [ 'min' => 0,  'max' => 2000 ],
                    '%'  => [ 'min' => 0,  'max' => 100 ],
                    'vw' => [ 'min' => 0,  'max' => 100 ],
                ],
                'condition' => [
                    'pxl_container_star_color_option' => 'yes',
                ],
            ]
        );
        $element->add_control(
            'pxl_container_star_height',
            [
                'label' => __( 'Box Height', 'stotage' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vh' ],
                'range' => [
                    'px' => [ 'min' => 0,  'max' => 5000 ],
                    '%'  => [ 'min' => 0,  'max' => 100 ],
                    'vh' => [ 'min' => 0,  'max' => 100 ],
                ],
                'condition' => [
                    'pxl_container_star_color_option' => 'yes',
                ],
            ]
        );
        
        $element->end_controls_section();
    }
}, 10, 2 );

add_filter( 'pxl_element_container/before-render', function ( $html, $settings ) {
    $star_w      = $settings['pxl_container_star_width']['size']  ?? null;
    $star_w_unit = $settings['pxl_container_star_width']['unit']  ?? 'px';
    $star_h      = $settings['pxl_container_star_height']['size'] ?? null;
    $star_h_unit = $settings['pxl_container_star_height']['unit'] ?? 'px';
    $star_number = $settings['pxl_container_star_number']         ?? null;

    $star_style  = '';
    if ( is_numeric( $star_w ) ) $star_style .= "width:{$star_w}{$star_w_unit};";
    if ( is_numeric( $star_h ) ) $star_style .= "height:{$star_h}{$star_h_unit};";

    if (
        ! empty( $settings['pxl_container_star_color'] ) &&
        ( $settings['pxl_container_star_color_option'] ?? 'no' ) === 'yes'
    ) {
        $html .= sprintf(
            '<canvas class="pxl-star" data-color="%s" data-star="%s" style="%s"%s></canvas>',
            esc_attr( $settings['pxl_container_star_color'] ),
            esc_attr( $settings['pxl_container_star_number'] ), 
            esc_attr( $star_style ),
            is_numeric( $star_number ) ? ' data-star="' . intval( $star_number ) . '"' : ''
        );
    }

    if (
        ! empty( $settings['pxl_container_light_color'] ) &&
        ( $settings['pxl_container_light_color_option'] ?? 'no' ) === 'yes'
    ) {
        $light_w      = $settings['pxl_container_light_width']['size']  ?? $star_w;
        $light_w_unit = $settings['pxl_container_light_width']['unit']  ?? $star_w_unit;
        $light_h      = $settings['pxl_container_light_height']['size'] ?? $star_h;
        $light_h_unit = $settings['pxl_container_light_height']['unit'] ?? $star_h_unit;

        $light_style  = '';
        if ( is_numeric( $light_w ) ) $light_style .= "width:{$light_w}{$light_w_unit};";
        if ( is_numeric( $light_h ) ) $light_style .= "height:{$light_h}{$light_h_unit};";

        $blur_raw     = $settings['pxl_container_light_blur']['size'] ?? 0;
        $blur         = is_numeric( $blur_raw ) ? intval( $blur_raw ) : 0;

        $light_style .= "background:{$settings['pxl_container_light_color']};";
        if ( $blur > 0 ) $light_style .= "filter:blur({$blur}px);";

        $html .= sprintf(
            '<div class="pxl-light" style="%s"></div>',
            esc_attr( $light_style )
        );
    }

    return $html;
}, 10, 2 );


add_action('elementor/element/after_add_attributes', 'stotage_custom_el_attributes', 10, 1);
function stotage_custom_el_attributes(Element_Base $el) {
    $settings = $el->get_settings();

    $pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

    if (!empty($settings['stretch_section']) && $settings['stretch_section'] === 'section-stretched') {
        $pxl_container_width = max(0, $pxl_container_width - 30);
    }

    $pxl_container_width .= 'px';

    if (!empty($settings['full_content_with_space'])) {
        if ($settings['full_content_with_space'] === 'start') {
            $el->add_render_attribute('_wrapper', 'style', 'padding-left: max(15px, calc((100% - ' . $pxl_container_width . ') / 2));');
        } elseif ($settings['full_content_with_space'] === 'end') {
            $el->add_render_attribute('_wrapper', 'style', 'padding-right: max(15px, calc((100% - ' . $pxl_container_width . ') / 2));');
        }
    }

    if ($el->get_name() === 'section' && !empty($settings['pxl_header_type'])) {
        $el->add_render_attribute('_wrapper', 'class', 'pxl-header-' . $settings['pxl_header_type']);
    }

    if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
        $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
    }
}

add_action( 'elementor/element/parse_css', function( $post_css, $element ){

    if ( $post_css instanceof Dynamic_CSS ) {
        return;
    }

    $element_settings = $element->get_settings();

    if ( empty( $element_settings['pxl_custom_css'] ) ) {
        return;
    }

    $css = trim( $element_settings['pxl_custom_css'] );

    if ( empty( $css ) ) {
        return;
    }

    $css = str_replace( 'selector', $post_css->get_element_unique_selector( $element ), $css );

    $post_css->get_stylesheet()->add_raw_css( $css );

}, 10, 2 );

add_filter( 'pxl_element_container/before-render', function( $html, $settings ) {
    if ( isset($settings['container_line_custom']) && 
        ( $settings['container_line_custom'] === "on" || $settings['container_line_custom'] === "on lines-2" ) ) {

        ob_start();
        ?>
        <div class="pxl-line line-1"></div>
        <div class="pxl-line line-2"></div>
        <div class="pxl-line line-3"></div>
        <div class="pxl-line line-4"></div>
        <div class="pxl-line line-5"></div>
        <?php
        $html .= ob_get_clean();
    }
    if ( isset($settings['container_bgr_video_status'], $settings['container_video_url']) 
        && $settings['container_bgr_video_status'] === "on" 
        && !empty($settings['container_video_url']) ) {

        $video_url = esc_url($settings['container_video_url']);
        $html .= '<div class="pxl-video-brg-fixed"><video autoplay muted loop playsinline><source src="' . $video_url . '" type="video/mp4"></video></div>';
    }
    return $html;
}, 10, 2 );



add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

    if (
        $section_id === 'section_layout'  ||
        $section_id === 'section_advanced' ||
        $section_id === '_section_style'
    ) {

        if ( $element->get_controls( 'pxl_custom_css_section' ) ) {
            return;
        }

        $element->start_controls_section(
            'pxl_custom_css_section',
            [
                'label' => __( 'Case Themes Options 🔧', 'stotage' ),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'pxl_custom_css',
            [
                'type' => Controls_Manager::CODE,
                'language' => 'css',
                'render_type' => 'ui',
            ]
        );

        $element->add_control(
            'pxl_custom_css_desc',
            [
                'raw' => sprintf(
                    esc_html__( 'Use "selector" to target wrapper element.%1$sselector {your css code}', 'stotage' ),
                    '<br><br>'
                ),
                'type' => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );
        $element->add_control(
            'custom_sticky',
            [
                'label'   => esc_html__( 'Case Themes Custom', 'stotage' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'none'        => esc_html__( 'No', 'stotage' ),
                    'sticky-custom'   => esc_html__( 'Sticky', 'stotage' ),
                    'show-container'   => esc_html__( 'Scroll Show Container', 'stotage' ),
                    'sticky-effect-scroll'   => esc_html__( 'Sticky Effect Scroll', 'stotage' ),
                    'absolute-center'   => esc_html__( 'Absolute Center', 'stotage' ),
                    'scroll-item-run'   => esc_html__( 'Scroll Item Run', 'stotage' ),
                    'hide-scroll'   => esc_html__( 'Scroll Transform Y (Hero Section)', 'stotage' ),
                ),
                'default' => 'none',
                'prefix_class' => 'pxl-'
            ]
        );
        $element->add_control(
            'pxl_scroll_effect',
            [
                'label' => __( 'Scroll Effect Type', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'stotage' ),
                    'scroll-item-run' => __( 'Scroll Item Run', 'stotage' ),
                ],
                'default' => 'none',
            ]
        );

        $element->add_control(
            'pxl_scroll_effect_item',
            [
                'label' => __( 'Scroll Effect Item', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'scroll-item-run-left-to-right' => __( 'Scroll Item Run Left To Right', 'stotage' ),
                    'scroll-item-run-right-to-left' => __( 'Scroll Item Run Right To Left', 'stotage' ),
                ],
                'default' => 'scroll-item-run-left-to-right',
                'condition' => [
                    'pxl_scroll_effect' => 'scroll-item-run',
                ],
            ]
        );

        $element->add_control(
            'pxl_scroll_effect_item_trigger_top',
            [
                'label' => __( 'Scroll Effect Item Trigger Top', 'stotage' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vh' ],
                'range' => [
                    'px' => [ 'min' => 0,  'max' => 5000 ],
                    '%'  => [ 'min' => 0,  'max' => 100 ],
                    'vh' => [ 'min' => 0,  'max' => 100 ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px',
                ],
                'condition' => [
                    'pxl_scroll_effect' => 'scroll-item-run',
                ],
            ]
        );
        $element->add_control(
            'custom_overflow',
            [
                'label'   => esc_html__( 'Overflow', 'stotage' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'visible'        => esc_html__( 'Visible', 'stotage' ),
                    'hidden'   => esc_html__( 'Hidden', 'stotage' ),
                ),
                'default' => 'visible',
                'prefix_class' => 'overflow-'
            ]
        );
        $element->add_control(
            'col_sticky_offset_top',
            [
                'label' => esc_html__( 'Sticky Offset Top', 'stotage' ),
                'type' => 'text',
                'description' => esc_html__('Enter number.', 'stotage' ),
                'default'  => '30',
                'selectors' => [
                    '{{WRAPPER}}' => 'top: {{VALUE}}'.'px',
                ],
                'condition' => [
                    'custom_sticky!' => ['none',' show-container','hide-scroll','scroll-item-run']
                ]
            ]
        );
        $element->end_controls_section();
    }
}, 10, 3 );
function stotage_add_scroll_attributes( $element ) {
    $settings = $element->get_settings_for_display();
    
    if ( ! empty( $settings['pxl_scroll_effect'] ) && $settings['pxl_scroll_effect'] !== 'none' ) {
        
        $element->add_render_attribute( '_wrapper', 'class', $settings['pxl_scroll_effect'] );
        
        if ( ! empty( $settings['pxl_scroll_effect_item'] ) ) {
            $element->add_render_attribute( '_wrapper', 'class', $settings['pxl_scroll_effect_item'] );
        }
        
        if ( ! empty( $settings['pxl_scroll_effect_item_trigger_top'] ) ) {
            $trigger_value = $settings['pxl_scroll_effect_item_trigger_top']['size'] . $settings['pxl_scroll_effect_item_trigger_top']['unit'];
            $element->add_render_attribute( '_wrapper', 'data-trigger-top', $trigger_value );
        }
        
        $element->add_render_attribute( '_wrapper', 'data-scroll-effect', $settings['pxl_scroll_effect'] );
        
        $element_type = $element->get_type();
        $element->add_render_attribute( '_wrapper', 'data-element-type', $element_type );
    }
}

add_action( 'elementor/frontend/section/before_render', 'stotage_add_scroll_attributes' );
add_action( 'elementor/frontend/container/before_render', 'stotage_add_scroll_attributes' );
add_action( 'elementor/frontend/widget/before_render', 'stotage_add_scroll_attributes' );
add_action( 'elementor/frontend/column/before_render', 'stotage_add_scroll_attributes' );
}

public static function before_section_render( Element_Base $element ) {

    if ( $element->get_settings( 'pxl_section_color_scheme' ) && $element->get_settings( 'pxl_section_color_scheme' ) !== '' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-color-scheme' => $element->get_settings( 'pxl_section_color_scheme' ),
        ] );
    }
    if ( $element->get_settings( 'pxl_sticky_show' ) && $element->get_settings( 'pxl_sticky_show' ) === 'yes' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-show-on-sticky' => 'true',
        ] );
        if ( $element->get_name() !== 'container' ) {
            $element->add_render_attribute( '_wrapper', 'class', 'hidden pxl-sticky:block');
        }
    }
    if ( $element->get_settings( 'pxl_sticky_hide' ) && $element->get_settings( 'pxl_sticky_hide' ) === 'yes' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-hide-on-sticky' => 'true',
        ] );
        if ( $element->get_name() !== 'container' ) {
            $element->add_render_attribute( '_wrapper', 'class', 'pxl-sticky:hidden');
        }
    }
    if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
        $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
    }
}


}

Pxl_Elementor_Custom_Controls::init();
