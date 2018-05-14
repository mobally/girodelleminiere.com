<?php

if ( ! function_exists( 'klippe_mikado_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function klippe_mikado_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'klippe' ),
				'description'   => esc_html__( 'Default Sidebar', 'klippe' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'klippe_mikado_register_sidebars', 1 );
}

if ( ! function_exists( 'klippe_mikado_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates KlippeMikadoSidebar object
	 */
	function klippe_mikado_add_support_custom_sidebar() {
		add_theme_support( 'KlippeMikadoSidebar' );
		
		if ( get_theme_support( 'KlippeMikadoSidebar' ) ) {
			new KlippeMikadoSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'klippe_mikado_add_support_custom_sidebar' );
}