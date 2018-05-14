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
		$classes[] = 'mkdf-fullscreen-search-with-sidebar';
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
        $parameters = array();

        $parameters['search_in_grid'] 			= klippe_mikado_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? 'mkdf-grid' : '';
        $parameters['search_close_icon_class'] 	= klippe_mikado_get_search_close_icon_class();
        $parameters['search_submit_icon_class'] = klippe_mikado_get_search_submit_icon_class();

        klippe_mikado_get_module_template_part( 'types/fullscreen-with-sidebar/templates/fullscreen-with-sidebar', 'search', '', $parameters );
	}
}

if ( ! function_exists( 'klippe_mikado_get_fullscreen_sidebar' ) ) {
    /**
     * Return footer top HTML
     */
    function klippe_mikado_get_fullscreen_sidebar() {
        $parameters = array();

        //get number of top footer columns
        $parameters['search_sidebar_columns'] = klippe_mikado_options()->getOptionValue( 'search_sidebar_columns' );


        klippe_mikado_get_module_template_part( 'types/fullscreen-with-sidebar/templates/parts/fullscreen-sidebar', 'search', '', $parameters );
    }
}
