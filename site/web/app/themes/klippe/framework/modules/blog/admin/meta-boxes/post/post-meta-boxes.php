<?php

/*** Post Settings ***/

if ( ! function_exists( 'klippe_mikado_map_post_meta' ) ) {
	function klippe_mikado_map_post_meta() {
		
		$post_meta_box = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'klippe' ),
				'name'  => 'post-meta'
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'klippe' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'klippe' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => klippe_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$klippe_custom_sidebars = klippe_mikado_get_custom_sidebars();
		if ( count( $klippe_custom_sidebars ) > 0 ) {
			klippe_mikado_add_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'klippe' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'klippe' ),
				'parent'      => $post_meta_box,
				'options'     => klippe_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'klippe' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'klippe' ),
				'parent'      => $post_meta_box
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'klippe' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'klippe' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'klippe' ),
					'large-width'        => esc_html__( 'Large Width', 'klippe' ),
					'large-height'       => esc_html__( 'Large Height', 'klippe' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'klippe' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'klippe' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'klippe' ),
					'large-width' => esc_html__( 'Large Width', 'klippe' )
				)
			)
		);
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'klippe' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'klippe' ),
				'parent'        => $post_meta_box,
				'options'       => klippe_mikado_get_yes_no_select_array()
			)
		);

		do_action('klippe_mikado_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_mikado_map_post_meta', 20 );
}
