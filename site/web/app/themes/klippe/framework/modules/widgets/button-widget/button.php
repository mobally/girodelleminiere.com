<?php

class KlippeMikadoButtonWidget extends KlippeMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__( 'Mikado Button Widget', 'klippe' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'klippe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'klippe' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'klippe' ),
					'outline' => esc_html__( 'Outline', 'klippe' ),
					'simple'  => esc_html__( 'Simple', 'klippe' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'klippe' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'klippe' ),
					'medium' => esc_html__( 'Medium', 'klippe' ),
					'large'  => esc_html__( 'Large', 'klippe' ),
					'huge'   => esc_html__( 'Huge', 'klippe' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'klippe' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'klippe' ),
				'default' => esc_html__( 'Button Text', 'klippe' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'klippe' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'klippe' ),
				'options' => klippe_mikado_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'klippe' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'klippe' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'klippe' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'klippe' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'klippe' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'klippe' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'klippe' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'klippe' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'klippe' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'klippe' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'klippe' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'klippe' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}