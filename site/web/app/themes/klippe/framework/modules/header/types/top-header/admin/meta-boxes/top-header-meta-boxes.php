<?php

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function klippe_mikado_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'klippe_mikado_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_header_top_area_meta_options_map' ) ) {
	function klippe_mikado_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = klippe_mikado_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = klippe_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		klippe_mikado_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'klippe' )
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'klippe' ),
				'parent'        => $top_header_container,
				'options'       => klippe_mikado_get_yes_no_select_array(),
			)
		);
		
		$top_bar_container = klippe_mikado_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'dependency' => array(
					'show' => array(
						'mkdf_top_bar_meta' => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'klippe' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'klippe' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);

		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_skin_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Skin', 'klippe' ),
				'description'   => esc_html__( 'Choose a header style to make header top in that predefined style', 'klippe' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => array(
					''             => esc_html__( 'Default', 'klippe' ),
					'light-header-top' => esc_html__( 'Light', 'klippe' ),
					'dark-header-top'  => esc_html__( 'Dark', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'   => 'mkdf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'klippe' ),
				'parent' => $top_bar_container
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'klippe' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'klippe' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'klippe' ),
				'description'   => esc_html__( 'Set border on top bar', 'klippe' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		$top_bar_border_container = klippe_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'show' => array(
						'mkdf_top_bar_border_meta' => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'klippe' ),
				'description' => esc_html__( 'Choose color for top bar border', 'klippe' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'klippe_mikado_additional_header_area_meta_boxes_map', 'klippe_mikado_header_top_area_meta_options_map', 10, 1 );
}