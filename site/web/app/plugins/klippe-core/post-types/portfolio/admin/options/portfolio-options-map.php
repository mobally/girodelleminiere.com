<?php

if ( ! function_exists( 'klippe_mikado_portfolio_options_map' ) ) {
	function klippe_mikado_portfolio_options_map() {
		
		klippe_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'klippe-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = klippe_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'klippe-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'klippe-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'klippe-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'klippe-core' ),
				'default_value' => '4',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'klippe-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'2' => esc_html__( '2 Columns', 'klippe-core' ),
					'3' => esc_html__( '3 Columns', 'klippe-core' ),
					'4' => esc_html__( '4 Columns', 'klippe-core' ),
					'5' => esc_html__( '5 Columns', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'klippe-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'klippe-core' ),
				'default_value' => 'normal',
				'options'       => klippe_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'klippe-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'klippe-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'klippe-core' ),
					'landscape' => esc_html__( 'Landscape', 'klippe-core' ),
					'portrait'  => esc_html__( 'Portrait', 'klippe-core' ),
					'square'    => esc_html__( 'Square', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'klippe-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'klippe-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'klippe-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'klippe-core' )
				)
			)
		);
		
		$panel = klippe_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'klippe-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'klippe-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'klippe-core' ),
				'parent'        => $panel,
				'options'       => array(
					'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'klippe-core' ),
					'images'            => esc_html__( 'Portfolio Images', 'klippe-core' ),
					'small-images'      => esc_html__( 'Portfolio Small Images', 'klippe-core' ),
					'slider'            => esc_html__( 'Portfolio Slider', 'klippe-core' ),
					'small-slider'      => esc_html__( 'Portfolio Small Slider', 'klippe-core' ),
					'gallery'           => esc_html__( 'Portfolio Gallery', 'klippe-core' ),
					'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'klippe-core' ),
					'masonry'           => esc_html__( 'Portfolio Masonry', 'klippe-core' ),
					'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'klippe-core' ),
					'custom'            => esc_html__( 'Portfolio Custom', 'klippe-core' ),
					'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'klippe-core' )
				)
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'hide' => array(
						'portfolio_single_template'  => array(
							'huge-images',
							'images',
							'small-images',
							'slider',
							'small-slider',
							'masonry',
							'small-masonry',
							'custom',
							'full-width-custom'
						)
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'klippe-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'klippe-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'klippe-core' ),
					'three' => esc_html__( '3 Columns', 'klippe-core' ),
					'four'  => esc_html__( '4 Columns', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'klippe-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'klippe-core' ),
				'default_value' => 'normal',
				'options'       => klippe_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'hide' => array(
						'portfolio_single_template'  => array(
							'huge-images',
							'images',
							'small-images',
							'slider',
							'small-slider',
							'gallery',
							'small-gallery',
							'custom',
							'full-width-custom'
						)
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'klippe-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'klippe-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'klippe-core' ),
					'three' => esc_html__( '3 Columns', 'klippe-core' ),
					'four'  => esc_html__( '4 Columns', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'klippe-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'klippe-core' ),
				'default_value' => 'normal',
				'options'       => klippe_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'klippe-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'klippe-core' ),
					'yes' => esc_html__( 'Yes', 'klippe-core' ),
					'no'  => esc_html__( 'No', 'klippe-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'klippe-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		$container_navigate_category = klippe_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'klippe-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);

        klippe_mikado_add_admin_field(
            array(
                'name'          => 'portfolio_single_related_posts',
                'type'          => 'yesno',
                'label'         => esc_html__( 'Show Related Posts', 'klippe-core' ),
                'description'   => esc_html__( 'Enabling this option will show related portfolio items on your page', 'klippe-core' ),
                'parent'        => $panel,
                'default_value' => 'yes'
            )
        );
		
		klippe_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'klippe-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'klippe-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_options_map', 'klippe_mikado_portfolio_options_map', 14 );
}