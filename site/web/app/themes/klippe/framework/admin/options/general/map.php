<?php

if ( ! function_exists( 'klippe_mikado_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function klippe_mikado_general_options_map() {
		
		klippe_mikado_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'klippe' ),
				'icon'  => 'fa fa-institution'
			)
		);

        do_action('klippe_mikado_add_general_options_map_first');
		
		$panel_design_style = klippe_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Appearance', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'klippe' ),
				'parent'        => $panel_design_style
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'klippe' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'klippe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'klippe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'klippe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'klippe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'klippe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'klippe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'klippe' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'klippe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'klippe' ),
					'100i' => esc_html__( '100 Thin Italic', 'klippe' ),
					'200'  => esc_html__( '200 Extra-Light', 'klippe' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'klippe' ),
					'300'  => esc_html__( '300 Light', 'klippe' ),
					'300i' => esc_html__( '300 Light Italic', 'klippe' ),
					'400'  => esc_html__( '400 Regular', 'klippe' ),
					'400i' => esc_html__( '400 Regular Italic', 'klippe' ),
					'500'  => esc_html__( '500 Medium', 'klippe' ),
					'500i' => esc_html__( '500 Medium Italic', 'klippe' ),
					'600'  => esc_html__( '600 Semi-Bold', 'klippe' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'klippe' ),
					'700'  => esc_html__( '700 Bold', 'klippe' ),
					'700i' => esc_html__( '700 Bold Italic', 'klippe' ),
					'800'  => esc_html__( '800 Extra-Bold', 'klippe' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'klippe' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'klippe' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'klippe' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'klippe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'klippe' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'klippe' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'klippe' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'klippe' ),
					'greek'        => esc_html__( 'Greek', 'klippe' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'klippe' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'klippe' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #dbfc00', 'klippe' ),
				'parent'      => $panel_design_style
			)
		);

        klippe_mikado_add_admin_field(
            array(
                'name'        => 'second_color',
                'type'        => 'color',
                'label'       => esc_html__( 'Second Main Color', 'klippe' ),
                'description' => esc_html__( 'Choose the second most dominant theme color. Default color is #6534ff', 'klippe' ),
                'parent'      => $panel_design_style
            )
        );
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'klippe' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'klippe' ),
				'parent'      => $panel_design_style
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'klippe' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'klippe' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'klippe' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = klippe_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'klippe' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'klippe' ),
						'parent'      => $boxed_container
					)
				);
				
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'klippe' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'klippe' ),
						'parent'      => $boxed_container
					)
				);
				
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'klippe' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'klippe' ),
						'parent'      => $boxed_container
					)
				);
				
				klippe_mikado_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'klippe' ),
						'description'   => esc_html__( 'Choose background image attachment', 'klippe' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'klippe' ),
							'fixed'  => esc_html__( 'Fixed', 'klippe' ),
							'scroll' => esc_html__( 'Scroll', 'klippe' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'klippe' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = klippe_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'klippe' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'klippe' ),
						'parent'      => $paspartu_container
					)
				);
				
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'klippe' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'klippe' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				klippe_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'klippe' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'klippe' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				klippe_mikado_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'klippe' )
					)
				);
		
				klippe_mikado_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'klippe' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'klippe' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'klippe' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'klippe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'mkdf-grid-1100' => esc_html__( '1100px - default', 'klippe' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'klippe' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'klippe' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'klippe' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'klippe' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'klippe' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = klippe_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Behavior', 'klippe' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'klippe' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'klippe' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = klippe_mikado_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				klippe_mikado_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'klippe' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'klippe' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = klippe_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					klippe_mikado_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'klippe' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = klippe_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'klippe' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'klippe' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = klippe_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					klippe_mikado_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'klippe' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					klippe_mikado_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'klippe' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					klippe_mikado_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'klippe' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'klippe' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'klippe' ),
				'parent'        => $panel_settings
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'klippe' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = klippe_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'klippe' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'klippe' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = klippe_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'klippe' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'klippe' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'klippe_mikado_options_map', 'klippe_mikado_general_options_map', 1 );
}

if ( ! function_exists( 'klippe_mikado_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function klippe_mikado_page_general_style( $style ) {
		$current_style = '';
		$page_id       = klippe_mikado_get_page_id();
		$class_prefix  = klippe_mikado_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = klippe_mikado_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = klippe_mikado_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = klippe_mikado_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = klippe_mikado_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= klippe_mikado_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.mkdf-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled .mkdf-sticky-header',
			'.mkdf-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-sticky-header.header-appear',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = klippe_mikado_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = klippe_mikado_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( klippe_mikado_string_ends_with( $paspartu_width, '%' ) || klippe_mikado_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = klippe_mikado_string_ends_with( $paspartu_width, '%' ) ? klippe_mikado_filter_suffix( $paspartu_width, '%' ) : klippe_mikado_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = klippe_mikado_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.mkdf-paspartu-enabled .mkdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= klippe_mikado_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= klippe_mikado_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= klippe_mikado_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = klippe_mikado_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( klippe_mikado_string_ends_with( $paspartu_responsive_width, '%' ) || klippe_mikado_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = klippe_mikado_string_ends_with( $paspartu_responsive_width, '%' ) ? klippe_mikado_filter_suffix( $paspartu_responsive_width, '%' ) : klippe_mikado_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = klippe_mikado_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . klippe_mikado_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . klippe_mikado_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . klippe_mikado_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'klippe_mikado_add_page_custom_style', 'klippe_mikado_page_general_style' );
}