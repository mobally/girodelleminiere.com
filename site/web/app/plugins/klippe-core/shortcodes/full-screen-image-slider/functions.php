<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mkdf_Full_Screen_Image_Slider extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'klippe_core_add_full_screen_image_slider_shortcodes' ) ) {
	function klippe_core_add_full_screen_image_slider_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\FullScreenImageSlider\FullScreenImageSlider',
			'MikadoCore\CPT\Shortcodes\FullScreenImageSlider\FullScreenImageSliderItem'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcode', 'klippe_core_add_full_screen_image_slider_shortcodes' );
}

if ( ! function_exists( 'klippe_core_set_full_screen_image_slider_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for full screen image slider holder shortcode
	 */
	function klippe_core_set_full_screen_image_slider_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.wpb_content_element.wpb_mkdf_full_screen_image_slider_item > .wpb_element_wrapper {
			background-color: #f4f4f4;
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcodes_custom_style', 'klippe_core_set_full_screen_image_slider_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'klippe_core_set_full_screen_image_slider_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for full screen image slider shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function klippe_core_set_full_screen_image_slider_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-full-screen-image-slider';
		$shortcodes_icon_class_array[] = '.icon-wpb-full-screen-image-slider-item';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'klippe_core_filter_add_vc_shortcodes_custom_icon_class', 'klippe_core_set_full_screen_image_slider_icon_class_name_for_vc_shortcodes' );
}