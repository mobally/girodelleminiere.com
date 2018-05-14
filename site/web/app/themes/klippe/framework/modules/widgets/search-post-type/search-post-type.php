<?php

class KlippeMikadoSearchPostType extends KlippeMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_search_post_type',
			esc_html__( 'Mikado Search Post Type', 'klippe' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'klippe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'klippe_mikado_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'klippe' ) ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'klippe' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'klippe' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'mkdf-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget mkdf-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php klippe_mikado_class_attribute( $search_type_class ); ?>>
				<input class="mkdf-post-type-search-field" value="" placeholder="<?php esc_html_e( 'Search here', 'klippe' ) ?>">
				<i class="mkdf-search-icon fa fa-search" aria-hidden="true"></i>
				<i class="mkdf-search-loading fa fa-spinner fa-spin mkdf-hidden" aria-hidden="true"></i>
			</div>
			<div class="mkdf-post-type-search-results"></div>
		</div>
	<?php }
}