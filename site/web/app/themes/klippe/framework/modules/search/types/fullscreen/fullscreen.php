<?php

if ( ! function_exists( 'klippe_mikado_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function klippe_mikado_search_body_class( $classes ) {
		$classes[] = 'mkdf-fullscreen-search';
		$classes[] = 'mkdf-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'klippe_mikado_search_body_class' );
}

if ( ! function_exists( 'klippe_mikado_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function klippe_mikado_get_search() {
		klippe_mikado_load_search_template();
	}
	
	add_action( 'klippe_mikado_before_page_header', 'klippe_mikado_get_search' );
}

if ( ! function_exists( 'klippe_mikado_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function klippe_mikado_load_search_template() {
		$parameters = array(
			'search_close_icon_class' 	=> klippe_mikado_get_search_close_icon_class(),
			'search_submit_icon_class' 	=> klippe_mikado_get_search_submit_icon_class()
		);

        klippe_mikado_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search', '', $parameters );
	}
}