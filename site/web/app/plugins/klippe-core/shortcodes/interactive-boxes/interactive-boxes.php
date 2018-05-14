<?php
namespace MikadoCore\CPT\Shortcodes\InteractiveBoxes;

use MikadoCore\Lib;

class InteractiveBoxes implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkdf_interactive_boxes';

        add_action( 'vc_before_init', array( $this, 'vcMap' ) );
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                      => esc_html__( 'Mikado Interactive Boxes', 'klippe-core' ),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__( 'by MIKADO', 'klippe-core' ),
                    'icon'                      => 'icon-wpb-interactive-boxes extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image',
                            'heading'     => esc_html__( 'Image', 'klippe-core' ),
                            'description' => esc_html__( 'Select image from media library', 'klippe-core' )
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'image_size',
                            'heading'     => esc_html__( 'Image Size', 'klippe-core' ),
                            'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'klippe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__( 'Title', 'klippe-core' )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'title_tag',
                            'heading'     => esc_html__( 'Title Tag', 'klippe-core' ),
                            'value'       => array_flip( klippe_mikado_get_title_tag( true ) ),
                            'save_always' => true,
                            'dependency'  => array( 'element' => 'title', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'title_color',
                            'heading'    => esc_html__( 'Title Color', 'klippe-core' ),
                            'dependency' => array( 'element' => 'title', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textarea',
                            'param_name' => 'text',
                            'heading'    => esc_html__( 'Text', 'klippe-core' )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'text_color',
                            'heading'    => esc_html__( 'Text Color', 'klippe-core' ),
                            'dependency' => array( 'element' => 'text', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text_top_margin',
                            'heading'    => esc_html__( 'Text Top Margin (px)', 'klippe-core' ),
                            'dependency' => array( 'element' => 'text', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'link',
                            'heading'    => esc_html__( 'Link', 'klippe-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'target',
                            'heading'    => esc_html__( 'Target', 'klippe-core' ),
                            'value'      => array_flip( klippe_mikado_get_link_target_array() ),
                            'dependency' => array( 'element' => 'link', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'link_text',
                            'heading'    => esc_html__( 'Link Text', 'klippe-core' ),
                            'dependency' => array( 'element' => 'link', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'link_color',
                            'heading'    => esc_html__( 'Link Text Color', 'klippe-core' ),
                            'dependency' => array( 'element' => 'link', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'link_top_margin',
                            'heading'    => esc_html__( 'Link Text Top Margin (px)', 'klippe-core' ),
                            'dependency' => array( 'element' => 'link', 'not_empty' => true )
                        )
                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args   = array(
            'image'               => '',
            'image_size'          => 'full',
            'title'               => '',
            'title_tag'           => 'h4',
            'title_color'         => '',
            'text'                => '',
            'text_color'          => '',
            'text_top_margin'     => '',
            'link'                 => '',
            'target'               => '_self',
            'link_text'            => '',
            'link_color'           => '',
            'link_top_margin'      => ''
        );
        $params = shortcode_atts( $args, $atts );

        $params['image']              = $this->getImage( $params );
        $params['image_size']         = $this->getImageSize( $params['image_size'] );
        $params['title_tag']          = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
        $params['title_styles']       = $this->getTitleStyles( $params );
        $params['text_styles']        = $this->getTextStyles( $params );
        $params['link_styles']     = $this->getLinkStyles( $params );

        $html = klippe_core_get_shortcode_module_template_part( 'templates/interactive-boxes', 'interactive-boxes', '', $params );

        return $html;
    }

    private function getImage( $params ) {
        $image = array();

        if ( ! empty( $params['image'] ) ) {
            $id = $params['image'];

            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src( $id, 'full' );
            $image['url']      = $image_original[0];
            $image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
        }

        return $image;
    }

    private function getImageSize( $image_size ) {
        $image_size = trim( $image_size );
        //Find digits
        preg_match_all( '/\d+/', $image_size, $matches );
        if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
            return $image_size;
        } elseif ( ! empty( $matches[0] ) ) {
            return array(
                $matches[0][0],
                $matches[0][1]
            );
        } else {
            return 'thumbnail';
        }
    }

    private function getTitleStyles( $params ) {
        $styles = array();

        if ( ! empty( $params['title_color'] ) ) {
            $styles[] = 'color: ' . $params['title_color'];
        }

        return implode( ';', $styles );
    }

    private function getTextStyles( $params ) {
        $styles = array();

        if ( ! empty( $params['text_color'] ) ) {
            $styles[] = 'color: ' . $params['text_color'];
        }

        if ( $params['text_top_margin'] !== '' ) {
            $styles[] = 'margin-top: ' . klippe_mikado_filter_px( $params['text_top_margin'] ) . 'px';
        }

        return implode( ';', $styles );
    }

    private function getLinkStyles( $params ) {
        $styles = array();

        if ( ! empty( $params['link_color'] ) ) {
            $styles[] = 'color: ' . $params['link_color'];
        }

        if ( ! empty( $params['link_top_margin'] ) ) {
            $styles[] = 'margin-top: ' . klippe_mikado_filter_px( $params['link_top_margin'] ) . 'px';
        }

        return implode( ';', $styles );
    }
}