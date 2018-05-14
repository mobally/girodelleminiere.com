<?php

if ( ! function_exists( 'klippe_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function klippe_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_icon_widget' );
}