<?php

if ( ! function_exists( 'klippe_core_map_testimonials_meta' ) ) {
	function klippe_core_map_testimonials_meta() {
		$testimonial_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'klippe-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'klippe-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'klippe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'klippe-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'klippe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'klippe-core' ),
				'description' => esc_html__( 'Enter author name', 'klippe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'klippe-core' ),
				'description' => esc_html__( 'Enter author job position', 'klippe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_core_map_testimonials_meta', 95 );
}