<?php

if ( ! function_exists( 'klippe_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function klippe_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'KlippeMikadoImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'klippe_mikado_register_widgets', 'klippe_mikado_register_image_gallery_widget' );
}