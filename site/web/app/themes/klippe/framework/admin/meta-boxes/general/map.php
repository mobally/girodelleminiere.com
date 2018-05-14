<?php

if ( ! function_exists( 'klippe_mikado_map_general_meta' ) ) {
	function klippe_mikado_map_general_meta() {
		
		$general_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'klippe_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'klippe' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'klippe' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'klippe' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'klippe' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = klippe_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'klippe' ),
				'description' => esc_html__( 'Define styles for Content area', 'klippe' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = klippe_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'klippe' ),
						'parent' => $mkdf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'klippe' ),
						'parent'  => $mkdf_content_padding_row,
						'options' => klippe_mikado_get_yes_no_select_array( false )
					)
				);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'klippe' ),
				'description' => esc_html__( 'Choose background color for page content', 'klippe' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'klippe' ),
				'parent'  => $general_meta_box,
				'options' => klippe_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = klippe_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'klippe' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'klippe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'klippe' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'klippe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'klippe' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'klippe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'klippe' ),
						'description'   => esc_html__( 'Choose background image attachment', 'klippe' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'klippe' ),
							'fixed'  => esc_html__( 'Fixed', 'klippe' ),
							'scroll' => esc_html__( 'Scroll', 'klippe' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'klippe' ),
				'parent'        => $general_meta_box,
				'options'       => klippe_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = klippe_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'klippe' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'klippe' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'klippe' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'klippe' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'klippe' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'klippe' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				klippe_mikado_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'klippe' ),
						'options'       => klippe_mikado_get_yes_no_select_array(),
					)
				);
		
				klippe_mikado_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'klippe' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'klippe' ),
						'options'       => klippe_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'klippe' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'klippe' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'klippe' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'klippe' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'klippe' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'klippe' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'klippe' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'klippe' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'klippe' ),
				'parent'        => $general_meta_box,
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = klippe_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				klippe_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'klippe' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'klippe' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => klippe_mikado_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = klippe_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					klippe_mikado_add_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'klippe' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = klippe_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'klippe' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'klippe' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = klippe_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					klippe_mikado_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'klippe' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'klippe' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'klippe' ),
								'pulse'                 => esc_html__( 'Pulse', 'klippe' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'klippe' ),
								'cube'                  => esc_html__( 'Cube', 'klippe' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'klippe' ),
								'stripes'               => esc_html__( 'Stripes', 'klippe' ),
								'wave'                  => esc_html__( 'Wave', 'klippe' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'klippe' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'klippe' ),
								'atom'                  => esc_html__( 'Atom', 'klippe' ),
								'clock'                 => esc_html__( 'Clock', 'klippe' ),
								'mitosis'               => esc_html__( 'Mitosis', 'klippe' ),
								'lines'                 => esc_html__( 'Lines', 'klippe' ),
								'fussion'               => esc_html__( 'Fussion', 'klippe' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'klippe' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'klippe' )
							)
						)
					);
					
					klippe_mikado_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'klippe' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					klippe_mikado_add_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'klippe' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'klippe' ),
							'options'     => klippe_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'klippe' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'klippe' ),
				'parent'      => $general_meta_box,
				'options'     => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_general_meta', 10 );
}