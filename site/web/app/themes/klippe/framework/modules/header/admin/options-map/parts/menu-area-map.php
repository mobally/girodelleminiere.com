<?php

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_header_menu_area_options' ) ) {
	function klippe_mikado_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'klippe_mikado_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_header_menu_area_options_map' ) ) {
	function klippe_mikado_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = klippe_mikado_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = klippe_mikado_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
		
		klippe_mikado_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'klippe' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'klippe' ),
			)
		);
		
		$menu_area_in_grid_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid'  => 'no'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'klippe' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'klippe' ),
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'klippe' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'klippe' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'klippe' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'klippe' ),
				'description'   => esc_html__( 'Set border on grid area', 'klippe' )
			)
		);
		
		$menu_area_in_grid_border_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'klippe' ),
				'description'   => esc_html__( 'Set border color for menu area', 'klippe' ),
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'klippe' ),
				'description'   => esc_html__( 'Set background color for menu area', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'klippe' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'klippe' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Area Shadow', 'klippe' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'klippe' ),
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'klippe' ),
				'description'   => esc_html__( 'Set border on menu area', 'klippe' ),
				'parent'        => $menu_area_container
			)
		);
		
		$menu_area_border_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_border'  => 'no'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'menu_area_border_color',
				'label'       => esc_html__( 'Border Color', 'klippe' ),
				'description' => esc_html__( 'Set border color for menu area', 'klippe' ),
				'parent'      => $menu_area_border_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'menu_area_height',
				'label'       => esc_html__( 'Height', 'klippe' ),
				'description' => esc_html__( 'Enter header height', 'klippe' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'menu_area_side_padding',
				'label'  => esc_html__( 'Menu Area Side Padding', 'klippe' ),
				'parent' => $menu_area_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'klippe' )
				)
			)
		);
		
		do_action( 'klippe_mikado_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'klippe_mikado_header_menu_area_options_map', 'klippe_mikado_header_menu_area_options_map', 10, 1 );
}