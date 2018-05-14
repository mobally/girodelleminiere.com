<?php

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_top_header_options' ) ) {
	function klippe_mikado_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'klippe_mikado_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_header_top_options_map' ) ) {
	function klippe_mikado_header_top_options_map( $panel_header ) {
		$hide_dep_options = klippe_mikado_get_hide_dep_for_top_header_options();
		
		$top_header_container = klippe_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'klippe' ),
				'parent'        => $top_header_container,
			)
		);
		
		$top_bar_container = klippe_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'dependency' => array(
					'hide' => array(
						'top_bar'  => 'no'
					)
				)
			)
		);

		klippe_mikado_add_admin_field(
			array(
				'parent'        => $top_bar_container,
				'type'          => 'select',
				'name'          => 'top_bar_skin',
				'default_value' => '',
				'label'         => esc_html__( 'Top Bar Skin', 'klippe' ),
				'description'   => esc_html__( 'Choose a header style to make header top in that predefined style', 'klippe' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'klippe' ),
					'light-header-top' => esc_html__( 'Light', 'klippe' ),
					'dark-header-top'  => esc_html__( 'Dark', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'klippe' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'klippe' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_in_grid_container = klippe_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_in_grid'  => 'no'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'klippe' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'klippe' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'klippe' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'klippe' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'klippe' ),
				'description' => esc_html__( 'Set background color for top bar', 'klippe' ),
				'parent'      => $top_bar_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'klippe' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'klippe' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'klippe' ),
				'description'   => esc_html__( 'Set top bar border', 'klippe' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_border_container = klippe_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_border'  => 'no'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border Color', 'klippe' ),
				'description' => esc_html__( 'Set border color for top bar', 'klippe' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'klippe' ),
				'description' => esc_html__( 'Enter top bar height (Default is 37px)', 'klippe' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'   => 'top_bar_side_padding',
				'type'   => 'text',
				'label'  => esc_html__( 'Top Bar Side Padding', 'klippe' ),
				'parent' => $top_bar_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'klippe' )
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_header_top_options_map', 'klippe_mikado_header_top_options_map', 10, 1 );
}