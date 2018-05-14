<?php

if ( ! function_exists( 'klippe_mikado_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function klippe_mikado_register_author_info_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_author_info_widget' );
}