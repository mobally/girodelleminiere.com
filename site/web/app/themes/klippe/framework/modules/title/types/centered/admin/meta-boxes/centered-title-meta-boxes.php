<?php

if ( ! function_exists( 'klippe_mikado_centered_title_type_options_meta_boxes' ) ) {
	function klippe_mikado_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		klippe_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'klippe' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'klippe' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_additional_title_area_meta_boxes', 'klippe_mikado_centered_title_type_options_meta_boxes', 5 );
}