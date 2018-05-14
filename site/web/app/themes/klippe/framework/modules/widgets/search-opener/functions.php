<?php

if ( ! function_exists( 'klippe_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function klippe_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_search_opener_widget' );
}