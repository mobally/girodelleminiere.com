<?php
namespace MikadoCore\CPT\Shortcodes\ElementsHolder;

use MikadoCore\Lib;

class ElementsHolderItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_elements_holder_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Mikado Elements Holder Item', 'klippe-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'mkdf_elements_holder' ),
					'as_parent'               => array( 'except' => 'vc_row, vc_accordion' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by MIKADO', 'klippe-core' ),
					'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'klippe-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'klippe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'klippe-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__( 'Background Image', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding',
							'heading'     => esc_html__( 'Padding', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'klippe-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'horizontal_alignment',
							'heading'    => esc_html__( 'Horizontal Alignment', 'klippe-core' ),
							'value'      => array(
								esc_html__( 'Left', 'klippe-core' )   => 'left',
								esc_html__( 'Right', 'klippe-core' )  => 'right',
								esc_html__( 'Center', 'klippe-core' ) => 'center'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'vertical_alignment',
							'heading'    => esc_html__( 'Vertical Alignment', 'klippe-core' ),
							'value'      => array(
								esc_html__( 'Middle', 'klippe-core' ) => 'middle',
								esc_html__( 'Top', 'klippe-core' )    => 'top',
								esc_html__( 'Bottom', 'klippe-core' ) => 'bottom'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'animation',
							'heading'    => esc_html__( 'Animation Type', 'klippe-core' ),
							'value'      => array(
								esc_html__( 'Default (No Animation)', 'klippe-core' )   => '',
								esc_html__( 'Element Grow In', 'klippe-core' )          => 'mkdf-grow-in',
								esc_html__( 'Element Fade In Down', 'klippe-core' )     => 'mkdf-fade-in-down',
								esc_html__( 'Element From Fade', 'klippe-core' )        => 'mkdf-element-from-fade',
								esc_html__( 'Element From Left', 'klippe-core' )        => 'mkdf-element-from-left',
								esc_html__( 'Element From Right', 'klippe-core' )       => 'mkdf-element-from-right',
								esc_html__( 'Element From Top', 'klippe-core' )         => 'mkdf-element-from-top',
								esc_html__( 'Element From Bottom', 'klippe-core' )      => 'mkdf-element-from-bottom',
								esc_html__( 'Element Flip In', 'klippe-core' )          => 'mkdf-flip-in',
								esc_html__( 'Element X Rotate', 'klippe-core' )         => 'mkdf-x-rotate',
								esc_html__( 'Element Z Rotate', 'klippe-core' )         => 'mkdf-z-rotate',
								esc_html__( 'Element Y Translate', 'klippe-core' )      => 'mkdf-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'klippe-core' ) => 'mkdf-fade-in-left-x-rotate',
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1280_1600',
							'heading'     => esc_html__( 'Padding on screen size between 1280px-1600px', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'klippe-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1024_1280',
							'heading'     => esc_html__( 'Padding on screen size between 1024px-1280px', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'klippe-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_768_1024',
							'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'klippe-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680_768',
							'heading'     => esc_html__( 'Padding on screen size between 680px-768px', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'klippe-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680',
							'heading'     => esc_html__( 'Padding on screen size bellow 680px', 'klippe-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'klippe-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'klippe-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'           => '',
			'background_color'       => '',
			'background_image'       => '',
			'item_padding'           => '',
			'horizontal_alignment'   => '',
			'vertical_alignment'     => '',
			'animation'              => '',
			'animation_delay'        => '',
			'item_padding_1280_1600' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024'  => '',
			'item_padding_680_768'   => '',
			'item_padding_680'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']           = $content;
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_rand_class'] = 'mkdf-eh-custom-' . mt_rand( 1000, 10000 );
		$params['holder_styles']     = $this->getHolderStyles( $params );
		$params['content_styles']    = $this->getContentStyles( $params );
		$params['holder_data']       = $this->getHolderData( $params );
		
		$html = klippe_core_get_shortcode_module_template_part( 'templates/elements-holder-item-template', 'elements-holder', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'mkdf-vertical-alignment-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'mkdf-horizontal-alignment-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['animation'] ) ? $params['animation'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';
		}
		
		return implode( ';', $styles );
	}
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['item_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_rand_class'];
		
		if ( ! empty( $params['animation'] ) ) {
			$data['data-animation'] = $params['animation'];
		}
		
		if ( $params['animation_delay'] !== '' ) {
			$data['data-animation-delay'] = esc_attr( $params['animation_delay'] );
		}
		
		if ( $params['item_padding_1280_1600'] !== '' ) {
			$data['data-1280-1600'] = $params['item_padding_1280_1600'];
		}
		
		if ( $params['item_padding_1024_1280'] !== '' ) {
			$data['data-1024-1280'] = $params['item_padding_1024_1280'];
		}
		
		if ( $params['item_padding_768_1024'] !== '' ) {
			$data['data-768-1024'] = $params['item_padding_768_1024'];
		}
		
		if ( $params['item_padding_680_768'] !== '' ) {
			$data['data-680-768'] = $params['item_padding_680_768'];
		}
		
		if ( $params['item_padding_680'] !== '' ) {
			$data['data-680'] = $params['item_padding_680'];
		}
		
		return $data;
	}
}
