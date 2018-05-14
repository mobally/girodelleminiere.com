<?php

if ( ! function_exists( 'klippe_mikado_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function klippe_mikado_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'klippe' );
		
		return $type;
	}
	
	add_filter( 'klippe_mikado_title_type_global_option', 'klippe_mikado_set_title_centered_type_for_options' );
	add_filter( 'klippe_mikado_title_type_meta_boxes', 'klippe_mikado_set_title_centered_type_for_options' );
}