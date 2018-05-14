<?php

if ( ! function_exists( 'klippe_mikado_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function klippe_mikado_woocommerce_options_map() {
		
		klippe_mikado_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'klippe' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = klippe_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'klippe' ),
				'default_value' => 'mkdf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'klippe' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'klippe' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'klippe' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'klippe' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'klippe' ),
				'default_value' => 'normal',
				'options'       => klippe_mikado_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'klippe' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'klippe' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'klippe' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'klippe' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'klippe' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'klippe' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'klippe' ),
				'default_value' => 'h5',
				'options'       => klippe_mikado_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = klippe_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'klippe' ),
				'parent'        => $panel_single_product,
				'options'       => klippe_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'klippe' ),
				'options'       => klippe_mikado_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '3',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'klippe' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'klippe' ),
					'3' => esc_html__( 'Three', 'klippe' ),
					'2' => esc_html__( 'Two', 'klippe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'klippe' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'klippe' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'klippe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'klippe' ),
				'parent'        => $panel_single_product,
				'options'       => klippe_mikado_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'klippe' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'klippe' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'klippe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'klippe' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'klippe' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'klippe' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'klippe' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('klippe_mikado_woocommerce_additional_options_map');
	}
	
	add_action( 'klippe_mikado_options_map', 'klippe_mikado_woocommerce_options_map', 21 );
}