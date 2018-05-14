<?php

if ( ! function_exists( 'klippe_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function klippe_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'klippe_mikado_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function klippe_mikado_get_dropdown_cart_icon_class() {
		$dropdown_cart_icon_source = klippe_mikado_options()->getOptionValue( 'dropdown_cart_icon_source' );
		
		$dropdown_cart_icon_class_array = array(
			'mkdf-header-cart'
		);
		
		$dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'mkdf-header-cart-icon-pack' : 'mkdf-header-cart-svg-path';
		
		return $dropdown_cart_icon_class_array;
	}
}

if ( ! function_exists( 'klippe_mikado_get_dropdown_cart_icon_html' ) ) {
	/**
	 * Returns dropdown cart icon HTML
	 */
	function klippe_mikado_get_dropdown_cart_icon_html() {
		$dropdown_cart_icon_source   = klippe_mikado_options()->getOptionValue( 'dropdown_cart_icon_source' );
		$dropdown_cart_icon_pack     = klippe_mikado_options()->getOptionValue( 'dropdown_cart_icon_pack' );
		$dropdown_cart_icon_svg_path = klippe_mikado_options()->getOptionValue( 'dropdown_cart_icon_svg_path' );
		
		$dropdown_cart_icon_html = '';
		
		if ( ( $dropdown_cart_icon_source == 'icon_pack' ) && ( isset( $dropdown_cart_icon_pack ) ) ) {
			$dropdown_cart_icon_html .= klippe_mikado_icon_collections()->getDropdownCartIcon( $dropdown_cart_icon_pack );
		} else if ( isset( $dropdown_cart_icon_svg_path ) ) {
			$dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
		}
		
		return $dropdown_cart_icon_html;
	}
}