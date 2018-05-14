<?php

if ( ! function_exists( 'klippe_mikado_map_sidebar_meta' ) ) {
	function klippe_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'klippe_mikado_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'klippe' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'klippe' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'klippe' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => klippe_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = klippe_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			klippe_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'klippe' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'klippe' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_sidebar_meta', 31 );
}