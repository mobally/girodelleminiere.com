<?php

if(!function_exists('klippe_mikado_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function klippe_mikado_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'KlippeMikadoStickySidebar';
		
		return $widgets;
	}
	
	add_filter('klippe_mikado_register_widgets', 'klippe_mikado_register_sticky_sidebar_widget');
}