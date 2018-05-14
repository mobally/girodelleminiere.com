<?php

namespace MikadoCore\CPT\Shortcodes\Testimonials;

use MikadoCore\Lib;

class Testimonials implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_testimonials';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Testimonials category filter
		add_filter( 'vc_autocomplete_mkdf_testimonials_category_callback', array( &$this, 'testimonialsCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Testimonials category render
		add_filter( 'vc_autocomplete_mkdf_testimonials_category_render', array( &$this, 'testimonialsCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Testimonials', 'klippe-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by MIKADO', 'klippe-core' ),
					'icon'                      => 'icon-wpb-testimonials extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'skin',
							'heading'     => esc_html__( 'Skin', 'klippe-core' ),
							'value'       => array(
								esc_html__( 'Default', 'klippe-core' ) => '',
								esc_html__( 'Light', 'klippe-core' )   => 'light',
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number',
							'heading'    => esc_html__( 'Number of Testimonials', 'klippe-core' )
						),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'content_in_grid',
                            'heading'    => esc_html__( 'Set Content In Grid', 'klippe-core' ),
                            'value'      => array_flip( klippe_mikado_get_yes_no_select_array( false, true ) ),
                            'save_always' => true,
                        ),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'Category', 'klippe-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'klippe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'klippe-core' ),
							'value'       => array_flip( klippe_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'klippe-core' ),
							'value'       => array_flip( klippe_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'klippe-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'klippe-core' ),
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'klippe-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'klippe-core' ),
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'klippe-core' ),
							'value'       => array_flip( klippe_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'klippe-core' ),
							'value'       => array_flip( klippe_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'klippe-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'skin'                    => '',
			'number'                  => '-1',
            'content_in_grid'         => 'yes',
			'category'                => '',
			'slider_loop'             => 'yes',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'       => 'yes',
			'slider_pagination'       => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['type'] = 'standard';
		
		$holder_classes = $this->getHolderClasses( $params );
		
		$query_args    = $this->getQueryParams( $params );
		$query_results = new \WP_Query( $query_args );

		$data_attr            = $this->getSliderData( $params );
		
		$html = '<div class="mkdf-testimonials-holder ' . $holder_classes . ' clearfix">';
			$html .= '<div class="mkdf-testimonials mkdf-owl-slider" ' . klippe_mikado_get_inline_attrs( $data_attr ) . '>';
			
			if ( $query_results->have_posts() ):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					$title    = get_post_meta( get_the_ID(), 'mkdf_testimonial_title', true );
					$text     = get_post_meta( get_the_ID(), 'mkdf_testimonial_text', true );
					$author   = get_post_meta( get_the_ID(), 'mkdf_testimonial_author', true );
					$position = get_post_meta( get_the_ID(), 'mkdf_testimonial_author_position', true );
                    $content_classes = $params['content_in_grid'] === 'yes' ? 'mkdf-grid' : '';
					
					$params['current_id'] = get_the_ID();
					$params['title']      = $title;
					$params['text']       = $text;
					$params['author']     = $author;
					$params['position']   = $position;
                    $params['content_classes']   = $content_classes;
					
					$html .= klippe_core_get_cpt_shortcode_module_template_part( 'testimonials', 'testimonials', 'testimonials-' . $params['type'], '', $params );
				
				endwhile;
			else:
				$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'klippe-core' );
			endif;
			
			wp_reset_postdata();
			
			$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'mkdf-testimonials-' . $params['type'];
		$holderClasses[] = ! empty( $params['skin'] ) ? 'mkdf-testimonials-' . $params['skin'] : '';
        $holderClasses[] = $params['content_in_grid'] === 'yes' ? 'mkdf-content-in-grid' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getQueryParams( $params ) {
		$args = array(
			'post_status'    => 'publish',
			'post_type'      => 'testimonials',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => $params['number']
		);
		
		if ( $params['category'] != '' ) {
			$args['testimonials-category'] = $params['category'];
		}
		
		return $args;
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) && $params['type'] === 'boxed' ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';

		$slider_data['data-slider-animate-in'] = 'fadeInLeft';
		$slider_data['data-slider-animate-out'] = 'fadeOutRight';
		
		return $slider_data;
	}
	
	/**
	 * Filter testimonials categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function testimonialsCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS testimonials_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'testimonials-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['testimonials_category_title'] ) > 0 ) ? esc_html__( 'Category', 'klippe-core' ) . ': ' . $value['testimonials_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
		
	}
	
	/**
	 * Find testimonials category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function testimonialsCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$testimonials_category = get_term_by( 'slug', $query, 'testimonials-category' );
			if ( is_object( $testimonials_category ) ) {
				
				$testimonials_category_slug  = $testimonials_category->slug;
				$testimonials_category_title = $testimonials_category->name;
				
				$testimonials_category_title_display = '';
				if ( ! empty( $testimonials_category_title ) ) {
					$testimonials_category_title_display = esc_html__( 'Category', 'klippe-core' ) . ': ' . $testimonials_category_title;
				}
				
				$data          = array();
				$data['value'] = $testimonials_category_slug;
				$data['label'] = $testimonials_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}