<?php

if ( ! function_exists( 'klippe_mikado_like' ) ) {
	/**
	 * Returns KlippeMikadoLike instance
	 *
	 * @return KlippeMikadoLike
	 */
	function klippe_mikado_like() {
		return KlippeMikadoLike::get_instance();
	}
}

function klippe_mikado_get_like() {
	
	echo wp_kses( klippe_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}