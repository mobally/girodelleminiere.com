<?php

if ( ! function_exists( 'klippe_mikado_portfolio_category_additional_fields' ) ) {
	function klippe_mikado_portfolio_category_additional_fields() {
		
		$fields = klippe_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		klippe_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'klippe-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'klippe_mikado_custom_taxonomy_fields', 'klippe_mikado_portfolio_category_additional_fields' );
}