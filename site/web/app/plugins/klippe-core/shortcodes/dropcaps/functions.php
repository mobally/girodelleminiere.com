<?php

if ( ! function_exists( 'klippe_core_add_dropcaps_shortcodes' ) ) {
	function klippe_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcode', 'klippe_core_add_dropcaps_shortcodes' );
}