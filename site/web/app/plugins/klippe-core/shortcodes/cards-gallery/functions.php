<?php

if(!function_exists('klippe_core_add_cards_gallery_shortcodes')) {
    function klippe_core_add_cards_gallery_shortcodes($shortcodes_class_name) {
        $shortcodes = array(
            'MikadoCore\CPT\Shortcodes\CardsGallery\CardsGallery'
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    add_filter('klippe_core_filter_add_vc_shortcode', 'klippe_core_add_cards_gallery_shortcodes');
}

if ( ! function_exists( 'klippe_core_set_cards_gallery_icon_class_name_for_vc_shortcodes' ) ) {
    /**
     * Function that set custom icon class name for clients carousel shortcode to set our icon for Visual Composer shortcodes panel
     */
    function klippe_core_set_cards_gallery_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
        $shortcodes_icon_class_array[] = '.icon-wpb-cards-gallery';

        return $shortcodes_icon_class_array;
    }

    add_filter( 'klippe_core_filter_add_vc_shortcodes_custom_icon_class', 'klippe_core_set_cards_gallery_icon_class_name_for_vc_shortcodes' );
}