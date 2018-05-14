<?php

if ( ! function_exists( 'klippe_core_map_portfolio_settings_meta' ) ) {
	function klippe_core_map_portfolio_settings_meta() {
		$meta_box = klippe_mikado_add_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'klippe-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		klippe_mikado_add_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'klippe-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'klippe-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'klippe-core' ),
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
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_portfolio_single_template_meta'  => array(
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
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'klippe-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'klippe-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'klippe-core' ),
					'two'   => esc_html__( '2 Columns', 'klippe-core' ),
					'three' => esc_html__( '3 Columns', 'klippe-core' ),
					'four'  => esc_html__( '4 Columns', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'klippe-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'klippe-core' ),
				'default_value' => '',
				'options'       => klippe_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = klippe_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_masonry_type_meta_container'  => array(
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
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'klippe-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'klippe-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'klippe-core' ),
					'two'   => esc_html__( '2 Columns', 'klippe-core' ),
					'three' => esc_html__( '3 Columns', 'klippe-core' ),
					'four'  => esc_html__( '4 Columns', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'klippe-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'klippe-core' ),
				'default_value' => '',
				'options'       => klippe_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'klippe-core' ),
				'parent'        => $meta_box,
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'klippe-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'klippe-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'klippe-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'klippe-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'klippe-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'klippe-core' ),
				'parent'      => $meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'klippe-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'klippe-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'klippe-core' ),
					'large-width'        => esc_html__( 'Large Width', 'klippe-core' ),
					'large-height'       => esc_html__( 'Large Height', 'klippe-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'klippe-core' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'klippe-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'klippe-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'klippe-core' ),
					'large-width' => esc_html__( 'Large Width', 'klippe-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'klippe-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'klippe-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_core_map_portfolio_settings_meta', 41 );
}