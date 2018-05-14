<?php

if ( ! function_exists( 'klippe_core_add_scrolling_image_shortcodes' ) ) {
	function klippe_core_add_scrolling_image_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\ScrollingImage\ScrollingImage'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcode', 'klippe_core_add_scrolling_image_shortcodes' );
}

if ( ! function_exists( 'klippe_core_set_scrolling_image_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for section title shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function klippe_core_set_scrolling_image_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-scrolling-image';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcodes_custom_icon_class', 'klippe_core_set_scrolling_image_icon_class_name_for_vc_shortcodes' );
}