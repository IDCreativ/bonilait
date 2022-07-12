<?php
/**
 * Adds new shortcode "dstcyr_heading" and registers it to
 * the Visual Composer plugin
 *
 */
if ( ! class_exists( 'DStCyr_Heading_Shortcode' ) ) {

    class DStCyr_Heading_Shortcode {

        /**
         * Main constructor
         */
        public function __construct() {

            // Registers the shortcode in WordPress
            add_shortcode( 'dstcyr_heading', __CLASS__ . '::output' );

            // Map shortcode to WPBakery so you can access it in the builder
            if ( function_exists( 'vc_lean_map' ) ) {
                vc_lean_map( 'dstcyr_heading', __CLASS__ . '::map' );
            }

        }

        /**
         * Shortcode output
         */
        public static function output( $atts, $content = null ) {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            $atts = vc_map_get_attributes( 'dstcyr_heading', $atts );

            switch ($atts['modele']) {
                case 'modele1':
                    $modele = 'heading-modele1';
                    break;
                case 'modele2':
                    $modele = 'heading-modele2';
                    break;
                default:
                    $modele = '';
            }

            // Define output and open element div.
            $output = '<div class="dstcyr-headings">';

            $output .= '
                <' . esc_html( $atts['balise'] ) . ' class="dstcyr-headings-' . esc_html( $atts['balise'] ) . ' ' . $modele . ' ' . $atts['heading_color'] . '"><span>' . esc_html( $atts['heading'] ) . '</span></' . esc_html( $atts['balise'] ) . '>'
            ;
            if ($modele == 'heading-modele1'){
                $output .= '
                    <div class="flocon"><img src="' . get_template_directory_uri() . '/assets/img/heading-flocon.svg"></div>
                ';
            }

            // Close element.
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
                'name'        => esc_html__( 'Custom Headings', 'locale' ),
                'description' => esc_html__( 'Ajouter un titre.', 'locale' ),
                'base'        => 'dstcyr_heading',
                'params'      => array(
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Titre', 'locale' ),
                        'param_name' => 'heading',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__( 'Type de balise', 'locale' ),
                        'param_name' => 'balise',
                        'value'      => array(
                            esc_html__( 'H1', 'locale' )    => 'h1',
                            esc_html__( 'H2', 'locale' )    => 'h2',
                            esc_html__( 'H3', 'locale' )    => 'h3',
                        ),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__( 'Modèle', 'locale' ),
                        'param_name' => 'modele',
                        'value'      => array(
                            esc_html__( 'Titre + pictogramme', 'locale' )    => 'modele1',
                            esc_html__( 'Titre seul', 'locale' )    => 'modele2',
                        ),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__( 'Couleur', 'locale' ),
                        'param_name' => 'heading_color',
                        'value'      => array(
                            esc_html__( 'Primaire', 'locale' )    => 'text-primary',
                            esc_html__( 'Secondaire', 'locale' )    => 'text-secondary',
                            esc_html__( 'Vert', 'locale' )    => 'text-green',
                        ),
                    )
                ),
            );
        }

    }

}
new DStCyr_Heading_Shortcode;