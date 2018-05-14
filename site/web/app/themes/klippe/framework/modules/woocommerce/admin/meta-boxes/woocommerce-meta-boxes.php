<?php

if ( ! function_exists( 'klippe_mikado_map_woocommerce_meta' ) ) {
	function klippe_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'klippe' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'klippe' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'klippe' ),
				'options'     => array(
					''                                   => esc_html__( 'Default', 'klippe' ),
					'mkdf-woo-image-small'              => esc_html__( 'Small', 'klippe' ),
					'mkdf-woo-image-large-width'        => esc_html__( 'Large Width', 'klippe' ),
					'mkdf-woo-image-large-height'       => esc_html__( 'Large Height', 'klippe' ),
					'mkdf-woo-image-large-width-height' => esc_html__( 'Large Width Height', 'klippe' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'klippe' ),
				'options'       => klippe_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'klippe' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_woocommerce_meta', 99 );
}