<?php

if ( ! function_exists( 'klippe_mikado_map_footer_meta' ) ) {
	function klippe_mikado_map_footer_meta() {
		
		$footer_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'klippe_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'klippe' ),
				'name'  => 'footer_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'klippe' ),
				'options'       => klippe_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = klippe_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			klippe_mikado_add_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'klippe' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'klippe' ),
					'options'       => klippe_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			klippe_mikado_add_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'klippe' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'klippe' ),
					'options'       => klippe_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_footer_meta', 70 );
}