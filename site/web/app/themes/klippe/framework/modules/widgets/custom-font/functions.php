<?php

if ( ! function_exists( 'klippe_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function klippe_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_custom_font_widget' );
}