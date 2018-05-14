<?php

if ( ! function_exists( 'klippe_mikado_get_title_types_meta_boxes' ) ) {
	function klippe_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'klippe_mikado_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'klippe' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'klippe_mikado_map_title_meta' ) ) {
	function klippe_mikado_map_title_meta() {
		$title_type_meta_boxes = klippe_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'klippe_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'klippe' ),
				'name'  => 'title_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'klippe' ),
				'parent'        => $title_meta_box,
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = klippe_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'klippe' ),
						'description'   => esc_html__( 'Choose title type', 'klippe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'klippe' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'klippe' ),
						'options'       => klippe_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'klippe' ),
						'description' => esc_html__( 'Set a height for Title Area', 'klippe' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'klippe' ),
						'description' => esc_html__( 'Choose a background color for title area', 'klippe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'klippe' ),
						'description' => esc_html__( 'Choose an Image for title area', 'klippe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'klippe' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'klippe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'klippe' ),
							'hide'                => esc_html__( 'Hide Image', 'klippe' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'klippe' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'klippe' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'klippe' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'klippe' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'klippe' )
						)
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'klippe' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'klippe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'klippe' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'klippe' ),
							'window-top'    => esc_html__( 'From Window Top', 'klippe' )
						)
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'klippe' ),
						'options'       => klippe_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'klippe' ),
						'description' => esc_html__( 'Choose a color for title text', 'klippe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'klippe' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'klippe' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'klippe' ),
						'options'       => klippe_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'klippe' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'klippe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'klippe_mikado_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_title_meta', 60 );
}