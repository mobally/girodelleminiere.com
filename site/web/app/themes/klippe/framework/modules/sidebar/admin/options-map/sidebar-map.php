<?php

if ( ! function_exists( 'klippe_mikado_sidebar_options_map' ) ) {
	function klippe_mikado_sidebar_options_map() {
		
		$sidebar_panel = klippe_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'klippe' ),
				'name'  => 'sidebar',
				'page'  => '_page_page'
			)
		);
		
		klippe_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'klippe' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'klippe' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => klippe_mikado_get_custom_sidebars_options()
		) );
		
		$klippe_custom_sidebars = klippe_mikado_get_custom_sidebars();
		if ( count( $klippe_custom_sidebars ) > 0 ) {
			klippe_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'klippe' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'klippe' ),
				'parent'      => $sidebar_panel,
				'options'     => $klippe_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'klippe_mikado_additional_page_options_map', 'klippe_mikado_sidebar_options_map', 9 );
}