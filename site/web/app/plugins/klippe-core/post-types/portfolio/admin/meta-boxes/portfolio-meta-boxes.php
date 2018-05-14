<?php

if ( ! function_exists( 'klippe_core_map_portfolio_meta' ) ) {
	function klippe_core_map_portfolio_meta() {
		global $klippe_mikado_Framework;
		
		$mkd_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$mkd_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$mkdPortfolioImages = new KlippeMikadoMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'klippe-core' ), '', '', 'portfolio_images' );
		$klippe_mikado_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $mkdPortfolioImages );
		
		$mkdf_portfolio_image_gallery = new KlippeMikadoMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'klippe-core' ), esc_html__( 'Choose your portfolio images', 'klippe-core' ) );
		$mkdPortfolioImages->addChild( 'mkdf-portfolio-image-gallery', $mkdf_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$mkdf_portfolio_images_videos = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'klippe-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		klippe_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $mkdf_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'klippe-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'klippe-core' ),
						'options' => array(
							'image' => esc_html__('Image','klippe-core'),
							'video' => esc_html__('Video','klippe-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'klippe-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'klippe-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'klippe-core'),
							'vimeo' => esc_html__('Vimeo', 'klippe-core'),
							'self' => esc_html__('Self Hosted', 'klippe-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'klippe-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'klippe-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'klippe-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$mkdAdditionalSidebarItems = klippe_mikado_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'klippe-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		klippe_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $mkdAdditionalSidebarItems,
				'button_text' => esc_html__( 'Add New Item', 'klippe-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'klippe-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'klippe-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'klippe-core' )
					)
				)
			)
		);
	}
	
	add_action( 'klippe_mikado_meta_boxes_map', 'klippe_core_map_portfolio_meta', 40 );
}