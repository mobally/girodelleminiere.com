<?php

if ( ! function_exists( 'klippe_mikado_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function klippe_mikado_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'klippe' );
		
		return $templates;
	}
	
	add_filter( 'klippe_mikado_register_blog_templates', 'klippe_mikado_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'klippe_mikado_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function klippe_mikado_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'klippe' );
		
		return $options;
	}
	
	add_filter( 'klippe_mikado_blog_list_type_global_option', 'klippe_mikado_set_blog_masonry_type_global_option' );
}