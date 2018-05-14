<?php
class KlippeMikadoStickySidebar extends KlippeMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_sticky_sidebar',
			esc_html__('Mikado Sticky Sidebar Widget', 'klippe'),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'klippe'))
		);
		
		$this->setParams();
	}
	
	protected function setParams() {}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget mkdf-widget-sticky-sidebar"></div>';
	}
}
