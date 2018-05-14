<?php

if ( ! function_exists( 'klippe_mikado_map_post_video_meta' ) ) {
	function klippe_mikado_map_post_video_meta() {
		$video_post_format_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'klippe' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'klippe' ),
				'description'   => esc_html__( 'Choose video type', 'klippe' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'klippe' ),
					'self'            => esc_html__( 'Self Hosted', 'klippe' )
				)
			)
		);
		
		$mkdf_video_embedded_container = klippe_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'klippe' ),
				'description' => esc_html__( 'Enter Video URL', 'klippe' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'klippe' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'klippe' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'klippe' ),
				'description' => esc_html__( 'Enter video image', 'klippe' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_post_video_meta', 22 );
}