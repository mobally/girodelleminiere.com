<?php

if ( ! function_exists( 'klippe_mikado_get_blog_list_types_options' ) ) {
	function klippe_mikado_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'klippe_mikado_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'klippe_mikado_blog_options_map' ) ) {
	function klippe_mikado_blog_options_map() {
		$blog_list_type_options = klippe_mikado_get_blog_list_types_options();
		
		klippe_mikado_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'klippe' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = klippe_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'klippe' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'klippe' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'klippe' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'klippe' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => klippe_mikado_get_custom_sidebars_options(),
			)
		);
		
		$klippe_custom_sidebars = klippe_mikado_get_custom_sidebars();
		if ( count( $klippe_custom_sidebars ) > 0 ) {
			klippe_mikado_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'klippe' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'klippe' ),
					'parent'      => $panel_blog_lists,
					'options'     => klippe_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'klippe' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'klippe' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'klippe' ),
					'full-width' => esc_html__( 'Full Width', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'klippe' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'klippe' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'klippe' ),
					'three' => esc_html__( '3 Columns', 'klippe' ),
					'four'  => esc_html__( '4 Columns', 'klippe' ),
					'five'  => esc_html__( '5 Columns', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'klippe' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'klippe' ),
				'default_value' => 'normal',
				'options'       => klippe_mikado_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'klippe' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'klippe' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'klippe' ),
					'original' => esc_html__( 'Original', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'klippe' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'klippe' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'klippe' ),
					'load-more'       => esc_html__( 'Load More', 'klippe' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'klippe' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'klippe' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'klippe' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = klippe_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'klippe' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'klippe' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => klippe_mikado_get_custom_sidebars_options()
			)
		);
		
		if ( count( $klippe_custom_sidebars ) > 0 ) {
			klippe_mikado_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'klippe' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'klippe' ),
					'parent'      => $panel_blog_single,
					'options'     => klippe_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'klippe' ),
				'parent'        => $panel_blog_single,
				'options'       => klippe_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'klippe' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'klippe' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'klippe' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'klippe' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'klippe' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = klippe_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'klippe' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'klippe' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'klippe' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = klippe_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'klippe' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'klippe' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'klippe_mikado_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'klippe_mikado_options_map', 'klippe_mikado_blog_options_map', 13 );
}