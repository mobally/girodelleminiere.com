<?php

if ( ! function_exists( 'klippe_mikado_include_mobile_header_menu' ) ) {
	function klippe_mikado_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'klippe' );
		
		return $menus;
	}
	
	add_filter( 'klippe_mikado_register_headers_menu', 'klippe_mikado_include_mobile_header_menu' );
}

if ( ! function_exists( 'klippe_mikado_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function klippe_mikado_register_mobile_header_areas() {
		if ( klippe_mikado_is_responsive_on() ) {
			register_sidebar(
				array(
					'id'            => 'mkdf-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'klippe' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'klippe' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'klippe_mikado_register_mobile_header_areas' );
}

if ( ! function_exists( 'klippe_mikado_mobile_header_class' ) ) {
	function klippe_mikado_mobile_header_class( $classes ) {
		$classes[] = 'mkdf-default-mobile-header';
		
		$classes[] = 'mkdf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'klippe_mikado_mobile_header_class' );
}

if ( ! function_exists( 'klippe_mikado_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function klippe_mikado_get_mobile_header( $slug = '', $module = '' ) {
		if ( klippe_mikado_is_responsive_on() ) {
			$mobile_menu_title = klippe_mikado_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title,
				'mobile_icon_class'		 => klippe_mikado_get_mobile_navigation_icon_class()
			);

            $module = apply_filters('klippe_mikado_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('klippe_mikado_mobile_menu_slug', '');
            $parameters = apply_filters('klippe_mikado_mobile_menu_parameters', $parameters);

            klippe_mikado_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'klippe_mikado_after_wrapper_inner', 'klippe_mikado_get_mobile_header', 20 );
}

if ( ! function_exists( 'klippe_mikado_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function klippe_mikado_get_mobile_logo() {
		$show_logo_image = klippe_mikado_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = klippe_mikado_get_meta_field_intersect( 'logo_image_mobile', klippe_mikado_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : klippe_mikado_get_meta_field_intersect( 'logo_image', klippe_mikado_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = klippe_mikado_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			klippe_mikado_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'klippe_mikado_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function klippe_mikado_get_mobile_nav() {
		klippe_mikado_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'klippe_mikado_mobile_header_per_page_js_var' ) ) {
    function klippe_mikado_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['mkdfMobileHeaderHeight'] = klippe_mikado_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'klippe_mikado_per_page_js_vars', 'klippe_mikado_mobile_header_per_page_js_var' );
}

if ( ! function_exists( 'klippe_mikado_get_mobile_navigation_icon_class' ) ) {
	/**
	 * Loads mobile navigation icon class
	 */
	function klippe_mikado_get_mobile_navigation_icon_class() {

		$mobile_icon_icon_source = klippe_mikado_options()->getOptionValue( 'mobile_icon_icon_source' );

		$mobile_icon_class_array = array(
			'mkdf-mobile-menu-opener'
		);

		$mobile_icon_class_array[] = $mobile_icon_icon_source == 'icon_pack' ? 'mkdf-mobile-menu-opener-icon-pack' : 'mkdf-mobile-menu-opener-svg-path';

		return $mobile_icon_class_array;
	}
}

if ( ! function_exists( 'klippe_mikado_get_mobile_navigation_icon_html' ) ) {
	/**
	 * Loads mobile navigation icon HTML
	 */
	function klippe_mikado_get_mobile_navigation_icon_html() {

		$mobile_icon_icon_source	= klippe_mikado_options()->getOptionValue( 'mobile_icon_icon_source' );
		$mobile_icon_icon_pack		= klippe_mikado_options()->getOptionValue( 'mobile_icon_icon_pack' );
		$mobile_icon_svg_path 		= klippe_mikado_options()->getOptionValue( 'mobile_icon_svg_path' );

		$mobile_navigation_icon_html = '';

		if ( ( $mobile_icon_icon_source == 'icon_pack' ) && ( isset( $mobile_icon_icon_pack ) ) ) {
			$mobile_navigation_icon_html .= klippe_mikado_icon_collections()->getMobileMenuIcon($mobile_icon_icon_pack);
		} else if ( isset( $mobile_icon_svg_path ) ) {
			$mobile_navigation_icon_html .= $mobile_icon_svg_path; 
		}

		return $mobile_navigation_icon_html;
	}
}

if ( ! function_exists( 'klippe_mikado_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function klippe_mikado_get_mobile_nav() {
		klippe_mikado_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'klippe_mikado_mobile_header_per_page_js_var' ) ) {
	function klippe_mikado_mobile_header_per_page_js_var( $perPageVars ) {
		$perPageVars['mkdfMobileHeaderHeight'] = klippe_mikado_set_default_mobile_menu_height_for_header_types();

		return $perPageVars;
	}

	add_filter( 'klippe_mikado_per_page_js_vars', 'klippe_mikado_mobile_header_per_page_js_var' );
}