<?php

if ( ! function_exists( 'klippe_mikado_map_post_quote_meta' ) ) {
	function klippe_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'klippe' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'klippe' ),
				'description' => esc_html__( 'Enter Quote text', 'klippe' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'klippe' ),
				'description' => esc_html__( 'Enter Quote author', 'klippe' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_post_quote_meta', 25 );
}