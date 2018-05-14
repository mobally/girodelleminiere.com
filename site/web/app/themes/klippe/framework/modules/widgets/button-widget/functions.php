<?php

if ( ! function_exists( 'klippe_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function klippe_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_button_widget' );
}