<?php
/**
 * Adds new shortcode "dstcyr_image" and registers it to
 * the Visual Composer plugin
 *
 */
if ( ! class_exists( 'DStCyr_Image_Shortcode' ) ) {

    class DStCyr_Image_Shortcode {

        /**
         * Main constructor
         */
        public function __construct() {

            // Registers the shortcode in WordPress
            add_shortcode( 'dstcyr_image', __CLASS__ . '::output' );

            // Map shortcode to WPBakery so you can access it in the builder
            if ( function_exists( 'vc_lean_map' ) ) {
                vc_lean_map( 'dstcyr_image', __CLASS__ . '::map' );
            }

        }

        /**
         * Shortcode output
         */
        public static function output( $atts ) {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            $atts = vc_map_get_attributes( 'dstcyr_image', $atts );

            $more_classes = "";
            $image = $atts['image'];

            $the_image = wpb_getImageBySize( array(
                'attach_id' => $image,
                'thumb_size' => '1024x1024',
                'class' => 'vc_single_image-img',
            ) );

            // Define output and open element div.
            $output = '';

            $output .= '<div class="wpb_single_image wpb_content_element base-img ' . $more_classes . '">';

            $output .= '
                <figure class="wpb_wrapper vc_figure circle-image">
                    <div class="vc_single_image-wrapper vc_box_circle vc_box_border_grey">
                        ' . $the_image['thumbnail'] . '
                    </div>
                </figure>
                <div class="after-waves-' . $atts['alignment'] . '"><img src="' . get_template_directory_uri() . '/assets/img/waves-primary-images.svg"></div>
            ';

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
                'name'        => esc_html__( 'DSTCYR Custom Image', 'locale' ),
                'description' => esc_html__( 'Ajouter une image.', 'locale' ),
                'base'        => 'dstcyr_image',
                'params'      => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'js_composer' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'js_composer' ),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Image alignment', 'js_composer' ),
                        'param_name' => 'alignment',
                        'value' => array(
                            esc_html__( 'Left', 'js_composer' ) => 'left',
                            esc_html__( 'Right', 'js_composer' ) => 'right',
                            esc_html__( 'Center', 'js_composer' ) => 'center',
                        ),
                        'description' => esc_html__( 'Select image alignment.', 'js_composer' ),
                    ),
                ),
            );
        }

    }

}
new DStCyr_Image_Shortcode;