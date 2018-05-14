<?php

if ( ! function_exists( 'klippe_mikado_map_post_audio_meta' ) ) {
	function klippe_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'klippe' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'klippe' ),
				'description'   => esc_html__( 'Choose audio type', 'klippe' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'klippe' ),
					'self'            => esc_html__( 'Self Hosted', 'klippe' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = klippe_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'klippe' ),
				'description' => esc_html__( 'Enter audio URL', 'klippe' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'klippe' ),
				'description' => esc_html__( 'Enter audio link', 'klippe' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_post_audio_meta', 23 );
}