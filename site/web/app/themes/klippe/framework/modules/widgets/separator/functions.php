<?php

if ( ! function_exists( 'klippe_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function klippe_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_separator_widget' );
}