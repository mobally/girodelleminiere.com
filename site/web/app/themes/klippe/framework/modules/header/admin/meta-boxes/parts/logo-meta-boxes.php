<?php

if ( ! function_exists( 'klippe_mikado_logo_meta_box_map' ) ) {
	function klippe_mikado_logo_meta_box_map() {
		
		$logo_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'klippe_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'klippe' ),
				'name'  => 'logo_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'klippe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'klippe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'klippe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'klippe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'klippe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'klippe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'klippe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'klippe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'klippe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'klippe' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_logo_meta_box_map', 47 );
}