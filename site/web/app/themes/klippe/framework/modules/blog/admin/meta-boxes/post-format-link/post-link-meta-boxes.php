<?php

if ( ! function_exists( 'klippe_mikado_map_post_link_meta' ) ) {
	function klippe_mikado_map_post_link_meta() {
		$link_post_format_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'klippe' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'klippe' ),
				'description' => esc_html__( 'Enter link', 'klippe' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_post_link_meta', 24 );
}