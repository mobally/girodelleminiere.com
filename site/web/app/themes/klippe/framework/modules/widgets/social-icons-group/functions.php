<?php

if ( ! function_exists( 'klippe_mikado_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function klippe_mikado_register_social_icons_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_social_icons_widget' );
}