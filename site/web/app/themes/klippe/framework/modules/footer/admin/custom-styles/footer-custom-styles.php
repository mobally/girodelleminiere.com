<?php

if ( ! function_exists( 'klippe_mikado_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function klippe_mikado_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = klippe_mikado_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo klippe_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_footer_top_general_styles' );
}

if ( ! function_exists( 'klippe_mikado_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function klippe_mikado_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = klippe_mikado_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo klippe_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_footer_bottom_general_styles' );
}