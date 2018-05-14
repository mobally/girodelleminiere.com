<?php
namespace MikadoCore\CPT\Shortcodes\ItemShowcase;

use MikadoCore\Lib;

class ItemShowcaseItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_item_showcase_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Mikado Item Showcase List Item', 'klippe-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'mkdf_item_showcase' ),
					'as_parent'               => array( 'except' => 'vc_row' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by MIKADO', 'klippe-core' ),
					'icon'                    => 'icon-wpb-item-showcase-item extended-custom-icon',
					'show_settings_on_create' => true,
					'params'                  => array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_position',
								'heading'     => esc_html__( 'Item Position', 'klippe-core' ),
								'value'       => array(
									esc_html__( 'Left', 'klippe-core' )  => 'left',
									esc_html__( 'Right', 'klippe-core' ) => 'right'
								),
								'save_always' => true,
								'admin_label' => true
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'item_title',
								'heading'     => esc_html__( 'Item Title', 'klippe-core' ),
								'admin_label' => true
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'item_link',
								'heading'    => esc_html__( 'Item Link', 'klippe-core' ),
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_target',
								'heading'     => esc_html__( 'Item Target', 'klippe-core' ),
								'value'       => array_flip( klippe_mikado_get_link_target_array() ),
								'dependency'  => array( 'element' => 'item_link', 'not_empty' => true ),
								'save_always' => true
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_title_tag',
								'heading'     => esc_html__( 'Item Title Tag', 'klippe-core' ),
								'value'       => array_flip( klippe_mikado_get_title_tag( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'item_title_color',
								'heading'    => esc_html__( 'Item Title Color', 'klippe-core' ),
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'       => 'textarea',
								'param_name' => 'item_text',
								'heading'    => esc_html__( 'Item Text', 'klippe-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'item_text_color',
								'heading'    => esc_html__( 'Item Text Color', 'klippe-core' ),
								'dependency' => array( 'element' => 'item_text', 'not_empty' => true )
							)
						),
						klippe_mikado_icon_collections()->getVCParamsArray(),
						array(
							array(
								'type'       => 'textfield',
								'param_name' => 'custom_icon_size',
								'heading'    => esc_html__( 'Custom Icon Size (px)', 'klippe-core' ),
								'group'      => esc_html__( 'Icon Settings', 'klippe-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_color',
								'heading'    => esc_html__( 'Icon Color', 'klippe-core' ),
								'group'      => esc_html__( 'Icon Settings', 'klippe-core' )
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'item_position'    => 'left',
			'item_title'       => '',
			'item_link'        => '',
			'item_target'      => '_self',
			'item_title_tag'   => 'h4',
			'item_title_color' => '',
			'item_text'        => '',
			'item_text_color'  => '',
			'custom_icon_size' => '',
			'icon_color'       => ''

		);
		$args = array_merge( $args, klippe_mikado_icon_collections()->getShortcodeParams() );
		$params = shortcode_atts( $args, $atts );
		
		$params['showcase_item_class'] = $this->getShowcaseItemClasses( $params );
		$params['item_target']         = ! empty( $params['item_target'] ) ? $params['item_target'] : $args['item_target'];
		$params['item_title_tag']      = ! empty( $params['item_title_tag'] ) ? $params['item_title_tag'] : $args['item_title_tag'];
		$params['item_title_styles']   = $this->getTitleStyles( $params );
		$params['item_text_styles']    = $this->getTextStyles( $params );
		$params['item_icon_styles']    = $this->getIconStyles( $params );
		$params['icon_parameters']     = $this->getIconParameters( $params );
		
		$html = klippe_core_get_shortcode_module_template_part( 'templates/item-showcase-item', 'item-showcase', '', $params );
		
		return $html;
	}

	private function getIconParameters( $params ) {
		$params_array = array();

		if ( empty( $params['custom_icon'] ) ) {
			$iconPackName = klippe_mikado_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );

			$params_array['icon_pack']     = $params['icon_pack'];
			$params_array[ $iconPackName ] = $params[ $iconPackName ];

			if ( ! empty( $params['custom_icon_size'] ) ) {
				$params_array['custom_size'] = klippe_mikado_filter_px( $params['custom_icon_size'] ) . 'px';
			}
		}

		return $params_array;
	}
	
	private function getShowcaseItemClasses( $params ) {
		$itemClass = array();
		
		if ( ! empty( $params['item_position'] ) ) {
			$itemClass[] = 'mkdf-is-' . $params['item_position'];
		}
		
		return implode( ' ', $itemClass );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['item_title_color'] ) ) {
			$styles[] = 'color: ' . $params['item_title_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['item_text_color'] ) ) {
			$styles[] = 'color: ' . $params['item_text_color'];
		}
		
		return implode( ';', $styles );
	}

	private function getIconStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['icon_color'] ) ) {
			$styles[] = 'color: ' . $params['icon_color'];
		}

		return implode( ';', $styles );
	}
}
