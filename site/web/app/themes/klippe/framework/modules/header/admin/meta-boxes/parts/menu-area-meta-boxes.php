<?php

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function klippe_mikado_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'klippe_mikado_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function klippe_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'klippe_mikado_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'klippe_mikado_header_menu_area_meta_options_map' ) ) {
	function klippe_mikado_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = klippe_mikado_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = klippe_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = klippe_mikado_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		klippe_mikado_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'klippe' )
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'klippe' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$klippe_custom_sidebars = klippe_mikado_get_custom_sidebars();
		if ( count( $klippe_custom_sidebars ) > 0 ) {
			klippe_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'klippe' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'klippe' ),
					'parent'      => $menu_area_container,
					'options'     => $klippe_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'mkdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'klippe' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'klippe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = klippe_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'klippe' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'klippe' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'klippe' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'klippe' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'klippe' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'klippe' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'klippe' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'klippe' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = klippe_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'klippe' ),
				'description' => esc_html__( 'Set border color for grid area', 'klippe' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'klippe' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'klippe' ),
				'parent'      => $menu_area_container
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'klippe' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'klippe' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'klippe' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'klippe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'klippe' ),
				'description'   => esc_html__( 'Set border on menu area', 'klippe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = klippe_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'klippe' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'klippe' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'klippe' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'klippe' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'mkdf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'klippe' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'klippe' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'klippe_mikado_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'klippe_mikado_header_menu_area_meta_boxes_map', 'klippe_mikado_header_menu_area_meta_options_map', 10, 1 );
}