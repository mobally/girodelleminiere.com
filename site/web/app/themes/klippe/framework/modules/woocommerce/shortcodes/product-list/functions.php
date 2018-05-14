<?php

if ( ! function_exists( 'klippe_mikado_add_product_list_shortcode' ) ) {
	function klippe_mikado_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( klippe_mikado_core_plugin_installed() ) {
		add_filter( 'klippe_core_filter_add_vc_shortcode', 'klippe_mikado_add_product_list_shortcode' );
	}
}

if ( ! function_exists( 'klippe_mikado_add_product_list_into_shortcodes_list' ) ) {
	function klippe_mikado_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'mkdf_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'klippe_mikado_woocommerce_shortcodes_list', 'klippe_mikado_add_product_list_into_shortcodes_list' );
}