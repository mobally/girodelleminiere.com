<?php

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_header_standard_options' ) ) {
	function klippe_mikado_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'klippe_mikado_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_header_standard_map' ) ) {
	function klippe_mikado_header_standard_map( $parent ) {
		$hide_dep_options = klippe_mikado_get_hide_dep_for_header_standard_options();
		
		klippe_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'klippe' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'klippe' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'klippe' ),
					'left'   => esc_html__( 'Left', 'klippe' ),
					'center' => esc_html__( 'Center', 'klippe' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_additional_header_menu_area_options_map', 'klippe_mikado_header_standard_map' );
}