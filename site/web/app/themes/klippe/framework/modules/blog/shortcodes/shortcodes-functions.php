<?php

if ( ! function_exists( 'klippe_mikado_include_blog_shortcodes' ) ) {
	function klippe_mikado_include_blog_shortcodes() {
		include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
		include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
	}
	
	if ( klippe_mikado_core_plugin_installed() ) {
		add_action( 'klippe_core_action_include_shortcodes_file', 'klippe_mikado_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'klippe_mikado_add_blog_shortcodes' ) ) {
	function klippe_mikado_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\BlogList\BlogList',
			'MikadoCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( klippe_mikado_core_plugin_installed() ) {
		add_filter( 'klippe_core_filter_add_vc_shortcode', 'klippe_mikado_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'klippe_mikado_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function klippe_mikado_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( klippe_mikado_core_plugin_installed() ) {
		add_filter( 'klippe_core_filter_add_vc_shortcodes_custom_icon_class', 'klippe_mikado_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}