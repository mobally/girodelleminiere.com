<?php

if ( ! function_exists( 'klippe_mikado_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function klippe_mikado_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_recent_posts_widget' );
}