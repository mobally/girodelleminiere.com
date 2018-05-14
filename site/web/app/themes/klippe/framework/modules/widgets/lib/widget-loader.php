<?php

if ( ! function_exists( 'klippe_mikado_register_widgets' ) ) {
	function klippe_mikado_register_widgets() {
		$widgets = apply_filters( 'klippe_mikado_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'klippe_mikado_register_widgets' );
}