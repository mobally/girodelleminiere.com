<?php

if ( ! function_exists( 'klippe_mikado_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function klippe_mikado_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'klippe' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'klippe' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'klippe_mikado_additional_title_area_meta_boxes', 'klippe_mikado_breadcrumbs_title_type_options_meta_boxes' );
}