<?php

if ( ! function_exists( 'klippe_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function klippe_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_blog_list_widget' );
}