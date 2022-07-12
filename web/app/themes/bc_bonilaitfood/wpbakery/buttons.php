<?php
/**
 * Adds new shortcode "dstcyr_button" and registers it to
 * the Visual Composer plugin
 *
 */
if ( ! class_exists( 'DStCyr_Button_Shortcode' ) ) {

    class DStCyr_Button_Shortcode {

        /**
         * Main constructor
         */
        public function __construct() {

            // Registers the shortcode in WordPress
            add_shortcode( 'dstcyr_button', __CLASS__ . '::output' );

            // Map shortcode to WPBakery so you can access it in the builder
            if ( function_exists( 'vc_lean_map' ) ) {
                vc_lean_map( 'dstcyr_button', __CLASS__ . '::map' );
            }

        }

        /**
         * Shortcode output
         */
        public static function output( $atts ) {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            $atts = vc_map_get_attributes( 'dstcyr_button', $atts );

            $link_source  = vc_build_link( $atts['link'] );
            $link_title   = esc_html($link_source["title"]);
            $link_url     = esc_url( $link_source['url'] );
            $more_classes = $atts['more_classes'];

            // Define output and open element div.

            $output = '<div class="dstcyr-buttons ' . $more_classes . '">';

            if (isset($atts['link']) && !empty($atts['link'])) {
                $output .= '<a href="' . $link_url .'">';
            }

            $output .= '<button class="dstcyr-buttons btn btn-' . esc_html( $atts['background'] ) . '">' . $link_title . '</button>';
            
            if (isset($atts['link']) && !empty($atts['link'])) {
                $output .= '</a>';
            }
            $output .= '</div>';

            // Return output
            return $output;

        }

        /**
         * Map shortcode to WPBakery
         *
         * This is an array of all your settings which become the shortcode attributes ($atts)
         * for the output. See the link below for a description of all available parameters.
         *
         * @since 1.0.0
         * @link  https://kb.wpbakery.com/docs/inner-api/vc_map/
         */
        public static function map() {
            return array(
                'name'        => esc_html__( 'Custom Buttons', 'locale' ),
                'description' => esc_html__( 'Ajouter un Bouton.', 'locale' ),
                'base'        => 'dstcyr_button',
                'params'      => array(
                    array(
                        'type'          => 'dropdown',
                        'heading'       => esc_html__( 'Fond (Background)', 'locale' ),
                        'param_name'    => 'background',
                        'value'         => array(
                            esc_html__( 'Primary', 'locale' )    => 'primary',
                            esc_html__( 'Secondary', 'locale' )    => 'secondary',
                            esc_html__( 'White', 'locale' )    => 'white',
                            esc_html__( 'Black', 'locale' )    => 'black',
                            esc_html__( 'Dégradé', 'locale' )    => 'gradient',
                        ),
                    ),
                    array(
                        'type'          => 'vc_link',
                        'heading'       => esc_html__( 'Lien', 'locale' ),
                        'param_name'    => 'link',
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__( 'Classes supplémentaires', 'locale' ),
                        'param_name'    => 'more_classes',
                    )
                ),
            );
        }

    }

}
new DStCyr_Button_Shortcode;