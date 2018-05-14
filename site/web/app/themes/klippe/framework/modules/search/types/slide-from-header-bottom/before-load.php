<?php

if ( ! function_exists( 'klippe_mikado_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function klippe_mikado_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'klippe' );

        return $search_type_options;
    }

    add_filter( 'klippe_mikado_search_type_global_option', 'klippe_mikado_set_search_slide_from_hb_global_option' );
}