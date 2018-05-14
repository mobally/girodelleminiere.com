<?php

if(!function_exists('klippe_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function klippe_mikado_design_styles() {
	    $font_family = klippe_mikado_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && klippe_mikado_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo klippe_mikado_dynamic_css( $font_family_selector, array( 'font-family' => klippe_mikado_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = klippe_mikado_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                'blockquote:before',
                '.mkdf-comment-holder .mkdf-comment-text .comment-edit-link:hover',
                '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:hover',
                '.mkdf-comment-holder .mkdf-comment-text .replay:hover',
                '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link:hover',
                '.mkdf-owl-slider .owl-nav .owl-next:hover',
                '.mkdf-owl-slider .owl-nav .owl-prev:hover',
                'footer .widget ul li a:hover',
                'footer .widget #wp-calendar tfoot a:hover',
                '.mkdf-fullscreen-sidebar .widget ul li a:hover',
                '.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.mkdf-side-menu .widget ul li a:hover',
                '.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
                '.wpb_widgetised_column .widget ul li a:hover',
                'aside.mkdf-sidebar .widget ul li a:hover',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
                'aside.mkdf-sidebar .widget #wp-calendar tfoot a:hover',
                '.widget ul li a:hover',
                '.widget #wp-calendar tfoot a:hover',
                '.mkdf-social-icons-group-widget.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text a',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text span',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-twitter-icon i',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.mkdf-top-bar .widget_icl_lang_sel_widget #lang_sel ul li a:hover',
                '.mkdf-top-bar .widget_icl_lang_sel_widget #lang_sel_click ul li a:hover',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
                '.mkdf-blog-list-holder .mkdf-post-info-date-boxed a:hover',
                '.mkdf-blog-list-holder.mkdf-bl-minimal .mkdf-post-info-date a:hover',
                '.mkdf-main-menu>ul>li>a:before',
                '.mkdf-drop-down .second .inner ul li.sub>a .item_text:after',
                '.mkdf-drop-down .second .inner ul.right li.sub>a .item_text:before',
                '.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
                '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>a',
                '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>h6',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li a:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li h6:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>h6',
                '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
                '.mkdf-search-cover .mkdf-search-close:hover',
                '.mkdf-event-single-nav .mkdf-event-single-nav-inner a:hover',
                '.mkdf-event-list-holder.mkdf-event-list-carousel .mkdf-el-item .mkdf-el-item-content .mkdf-el-item-location-title-holder .mkdf-el-read-more-link a:hover',
                '.mkdf-event-list-holder.mkdf-event-list-carousel.mkdf-event-list-light .mkdf-el-item .mkdf-el-item-content .mkdf-el-item-location-title-holder .mkdf-el-item-title:hover',
                '.mkdf-event-list-holder.mkdf-event-list-carousel.mkdf-event-list-light .mkdf-el-item .mkdf-el-item-content .mkdf-el-item-location-title-holder .mkdf-el-read-more-link a:hover',
                '.mkdf-event-list-holder.mkdf-event-list-carousel.mkdf-event-list-light .owl-nav .owl-next:hover',
                '.mkdf-event-list-holder.mkdf-event-list-carousel.mkdf-event-list-light .owl-nav .owl-prev:hover',
                '.mkdf-event-list-holder.mkdf-event-list-standard .mkdf-el-item .mkdf-el-item-content .mkdf-el-item-location-title-holder .mkdf-el-read-more-link a:hover',
                '.mkdf-portfolio-single-holder .owl-nav .owl-next',
                '.mkdf-portfolio-single-holder .owl-nav .owl-prev',
                '.mkdf-pl-standard-pagination ul li.mkdf-pl-pag-active a',
                '.mkdf-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
                '.mkdf-scrolling-image .mkdf-text-holder .mkdf-image-subtitle',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-icon',
                '.mkdf-twitter-list-holder .mkdf-tweet-text a:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-profile a:hover',
            );

            $woo_color_selector = array();
            if(klippe_mikado_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    '.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .mkdf-product-title:hover',
                    '.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .remove',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.mkdf-top-bar.light-header-top .lang_sel_sel:hover',
                '.mkdf-top-bar.light-header-top ul:before:hover',
                '.mkdf-top-bar.light-header-top .mkdf-icon-widget-holder a:hover',
                '.mkdf-top-bar.light-header-top .mkdf-icon-widget-holder:hover',
                '.mkdf-top-bar.light-header-top .widget a:hover',
                '.mkdf-top-bar.light-header-top .widget:hover',
                '.mkdf-top-bar.dark-header-top .mkdf-icon-widget-holder a:hover',
                '.mkdf-top-bar.dark-header-top .mkdf-icon-widget-holder:hover',
                '.mkdf-top-bar.dark-header-top .widget a:hover',
                '.mkdf-top-bar.dark-header-top .widget:hover',
                '.mkdf-btn.mkdf-btn-simple:not(.mkdf-btn-custom-hover-color):hover',
                '.light-header-top .mkdf-icon-shortcode .mkdf-icon-element:hover',
                '.dark-header-top .mkdf-icon-shortcode .mkdf-icon-element:hover',
	        );

            $background_color_selector = array(
                '.mkdf-st-loader .pulse',
                '.mkdf-st-loader .double_pulse .double-bounce1',
                '.mkdf-st-loader .double_pulse .double-bounce2',
                '.mkdf-st-loader .cube',
                '.mkdf-st-loader .rotating_cubes .cube1',
                '.mkdf-st-loader .rotating_cubes .cube2',
                '.mkdf-st-loader .stripes>div',
                '.mkdf-st-loader .wave>div',
                '.mkdf-st-loader .two_rotating_circles .dot1',
                '.mkdf-st-loader .two_rotating_circles .dot2',
                '.mkdf-st-loader .five_rotating_circles .container1>div',
                '.mkdf-st-loader .five_rotating_circles .container2>div',
                '.mkdf-st-loader .five_rotating_circles .container3>div',
                '.mkdf-st-loader .atom .ball-1:before',
                '.mkdf-st-loader .atom .ball-2:before',
                '.mkdf-st-loader .atom .ball-3:before',
                '.mkdf-st-loader .atom .ball-4:before',
                '.mkdf-st-loader .clock .ball:before',
                '.mkdf-st-loader .mitosis .ball',
                '.mkdf-st-loader .lines .line1',
                '.mkdf-st-loader .lines .line2',
                '.mkdf-st-loader .lines .line3',
                '.mkdf-st-loader .lines .line4',
                '.mkdf-st-loader .fussion .ball',
                '.mkdf-st-loader .fussion .ball-1',
                '.mkdf-st-loader .fussion .ball-2',
                '.mkdf-st-loader .fussion .ball-3',
                '.mkdf-st-loader .fussion .ball-4',
                '.mkdf-st-loader .wave_circles .ball',
                '.mkdf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkdf-footer-form input.wpcf7-form-control.wpcf7-submit:hover',
                '.error404 .mkdf-page-not-found .mkdf-404-subtitle:after',
                '#mkdf-back-to-top',
                '#mkdf-back-to-top>span',
                '.mkdf-social-icons-group-widget.mkdf-square-icons .mkdf-social-icon-widget-holder:hover',
                '.mkdf-social-icons-group-widget.mkdf-square-icons.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
                '.select2-container--default .select2-selection--single .select2-selection__arrow:hover',
                '.mkdf-blog-holder article.format-link .mkdf-post-text',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mkdf-blog-holder.mkdf-blog-single article.format-link .mkdf-post-text',
                '.mkdf-drop-down .wide .second .inner>ul>li>a:after',
                '.mkdf-search-fade .mkdf-fullscreen-with-sidebar-search-holder .mkdf-fullscreen-search-table',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
                '.mkdf-btn.mkdf-btn-solid',
                '.mkdf-btn.mkdf-btn-hover-animation .mkdf-btn-hover-line',
                '.mkdf-btn-wrapper.mkdf-btn-wrapper-nl input.wpcf7-form-control.wpcf7-submit:hover',
                '.mkdf-interactive-boxes-holder .mkdf-ib-title:after',
                '.mkdf-price-table .mkdf-pt-inner ul li.mkdf-pt-prices:after',
                '.mkdf-process-holder .mkdf-process-circle',
                '.mkdf-process-holder .mkdf-process-line',
                '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-simple .mkdf-tabs-nav li a:after',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li a:after',
            );

            $woo_background_color_selector = array();
            if(klippe_mikado_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .mkdf-content a.added_to_cart',
                    '.woocommerce-page .mkdf-content a.button',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    '.woocommerce-page .mkdf-content input[type=submit]',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    'div.woocommerce input[type=submit]',
                    '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li a:after',
                    '.mkdf-shopping-cart-holder .mkdf-header-cart.mkdf-header-cart-icon-pack .mkdf-cart-icon .mkdf-cart-number',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-my-cart',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .button:hover',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-hover-animation:not(.mkdf-btn-custom-hover-bg):hover',
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
            );

            $border_color_selector = array(
                '.mkdf-st-loader .pulse_circles .ball',
                '.mkdf-footer-form input.wpcf7-form-control.wpcf7-submit',
                '.mkdf-owl-slider+.mkdf-slider-thumbnail>.mkdf-slider-thumbnail-item.active img',
                '#mkdf-back-to-top>span',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-my-cart:hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout',
            );

            $border_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-hover-animation:not(.mkdf-btn-custom-border-hover):hover',
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
            );

            echo klippe_mikado_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo klippe_mikado_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo klippe_mikado_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo klippe_mikado_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo klippe_mikado_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo klippe_mikado_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }

        $second_main_color = klippe_mikado_options()->getOptionValue('second_color');
        if(!empty($second_main_color)) {

            $second_color_selector = array(
                'footer .widget.widget_search .input-holder button:hover',
                'footer .widget.widget_tag_cloud a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
                '.mkdf-side-menu .widget.widget_search .input-holder button:hover',
                '.mkdf-side-menu .widget.widget_tag_cloud a:hover',
                '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
                'aside.mkdf-sidebar .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
                'aside.mkdf-sidebar .widget.widget_tag_cloud a:hover',
                '.widget.widget_search .input-holder button:hover',
                '.widget.widget_tag_cloud a:hover',
                '.mkdf-social-icons-group-widget .mkdf-social-icon-widget-holder:hover',
                '.mkdf-blog-holder article .mkdf-post-read-more-button .mkdf-btn:hover',
                '.mkdf-blog-holder article .mkdf-post-title a:hover',
                '.mkdf-blog-holder article .mkdf-post-info-top>div a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-first a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-last a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-next a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-prev a:hover',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-next a:hover',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-prev a:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-nav-next:hover .mkdf-blog-single-nav-arrow',
                '.mkdf-blog-single-navigation .mkdf-blog-single-nav-next:hover .mkdf-blog-single-nav-title',
                '.mkdf-blog-single-navigation .mkdf-blog-single-nav-prev:hover .mkdf-blog-single-nav-arrow',
                '.mkdf-blog-single-navigation .mkdf-blog-single-nav-prev:hover .mkdf-blog-single-nav-title',
                '.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
                '.mkdf-blog-list-holder .mkdf-post-read-more-button a:hover',
                '.mkdf-blog-list-holder.mkdf-bl-simple .mkdf-post-title a:hover',
                '.mkdf-blog-list-holder.mkdf-bl-simple .mkdf-bli-content .mkdf-post-info-date a:hover',
                '.mkdf-blog-list-holder.mkdf-bl-standard .mkdf-post-title a:hover',
                '.mkdf-event-single-holder .mkdf-event-info-item a:hover',
                '.mkdf-ps-related-posts-holder .mkdf-related-nav-holder .mkdf-ps-back-btn a:hover',
                '.mkdf-pl-filter-holder ul li.mkdf-pl-current span',
                '.mkdf-pl-filter-holder ul li:hover span',
                '.mkdf-interactive-boxes-holder .mkdf-ib-link-text:hover',
                '.mkdf-item-showcase-holder .mkdf-is-item .mkdf-is-title a:hover',
                '.mkdf-social-share-holder.mkdf-list li a:hover',
                '.mkdf-team-holder .mkdf-team-social-holder .mkdf-team-icon a:hover',
                '.woocommerce-pagination .page-numbers li a.next:hover',
                '.woocommerce-pagination .page-numbers li a.prev:hover',
                '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover',
                '.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover',
            );

            $second_background_color_selector = array (
                '.mkdf-blog-list-holder .mkdf-post-info-date-boxed',
                '.mkdf-event-list-holder.mkdf-event-list-carousel .mkdf-el-item .mkdf-el-item-date',
                '.mkdf-event-list-holder.mkdf-event-list-standard .mkdf-el-item .mkdf-el-item-date',
                '.woocommerce .mkdf-new-product',
                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover:before',
                '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-new-product',
                '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-new-product',
            );

            echo klippe_mikado_dynamic_css($second_color_selector, array('color' => $second_main_color));
            echo klippe_mikado_dynamic_css($second_background_color_selector, array('background-color' => $second_main_color));
        }
	
	    $page_background_color = klippe_mikado_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.mkdf-content'
		    );
		    echo klippe_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = klippe_mikado_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo klippe_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo klippe_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( klippe_mikado_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . klippe_mikado_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo klippe_mikado_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('klippe_mikado_style_dynamic', 'klippe_mikado_design_styles');
}

if ( ! function_exists( 'klippe_mikado_content_styles' ) ) {
	function klippe_mikado_content_styles() {
		$content_style = array();
		
		$padding_top = klippe_mikado_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = klippe_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo klippe_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = klippe_mikado_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = klippe_mikado_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo klippe_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_content_styles' );
}

if ( ! function_exists( 'klippe_mikado_h1_styles' ) ) {
	function klippe_mikado_h1_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h1_styles' );
}

if ( ! function_exists( 'klippe_mikado_h2_styles' ) ) {
	function klippe_mikado_h2_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h2_styles' );
}

if ( ! function_exists( 'klippe_mikado_h3_styles' ) ) {
	function klippe_mikado_h3_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h3_styles' );
}

if ( ! function_exists( 'klippe_mikado_h4_styles' ) ) {
	function klippe_mikado_h4_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h4_styles' );
}

if ( ! function_exists( 'klippe_mikado_h5_styles' ) ) {
	function klippe_mikado_h5_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h5_styles' );
}

if ( ! function_exists( 'klippe_mikado_h6_styles' ) ) {
	function klippe_mikado_h6_styles() {
		$margin_top    = klippe_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = klippe_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = klippe_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = klippe_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = klippe_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_h6_styles' );
}

if ( ! function_exists( 'klippe_mikado_text_styles' ) ) {
	function klippe_mikado_text_styles() {
		$item_styles = klippe_mikado_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo klippe_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_text_styles' );
}

if ( ! function_exists( 'klippe_mikado_link_styles' ) ) {
	function klippe_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = klippe_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = klippe_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = klippe_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = klippe_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo klippe_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_link_styles' );
}

if ( ! function_exists( 'klippe_mikado_link_hover_styles' ) ) {
	function klippe_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = klippe_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = klippe_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo klippe_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo klippe_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'klippe_mikado_style_dynamic', 'klippe_mikado_link_hover_styles' );
}

if ( ! function_exists( 'klippe_mikado_smooth_page_transition_styles' ) ) {
	function klippe_mikado_smooth_page_transition_styles( $style ) {
		$id            = klippe_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = klippe_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= klippe_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = klippe_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= klippe_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'klippe_mikado_add_page_custom_style', 'klippe_mikado_smooth_page_transition_styles' );
}