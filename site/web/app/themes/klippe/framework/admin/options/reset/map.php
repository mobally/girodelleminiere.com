<?php

if ( ! function_exists( 'klippe_mikado_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function klippe_mikado_reset_options_map() {
		
		klippe_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'klippe' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = klippe_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'klippe' )
			)
		);
		
		klippe_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'klippe' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'klippe' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'klippe_mikado_options_map', 'klippe_mikado_reset_options_map', 100 );
}