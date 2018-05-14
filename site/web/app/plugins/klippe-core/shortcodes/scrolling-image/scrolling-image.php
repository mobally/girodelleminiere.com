<?php
namespace MikadoCore\CPT\Shortcodes\ScrollingImage;

use MikadoCore\Lib;

class ScrollingImage implements Lib\ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'mkdf_scrolling_image';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists('vc_map') ) {
			vc_map( 
				array(
					'name' => esc_html__('Scrolling Image', 'klippe-core'),
					'base' => $this->base,
					'content_element' => true,
					'category' => esc_html__('by MIKADO','klippe-core'),
					'icon' => 'icon-wpb-scrolling-image extended-custom-icon',
					'show_settings_on_create' => true,
					'params' => array(
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Image','klippe-core'),
							'param_name' => 'image',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Title','klippe-core'),
							'param_name' => 'image_title',
							'admin_label'	=> true,
						    'dependency' => array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Subtitle','klippe-core'),
							'param_name' => 'image_subtitle',
						    'dependency' => array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link','klippe-core'),
							'param_name' => 'image_link',
							'description' => esc_html__('Set an external URL to link to.','klippe-core'),
							'admin_label'	=> true,
						    'dependency' => array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Target','klippe-core'),
							'param_name' => 'image_target',
							'value' => array(
								esc_html__('Same Window','klippe-core') => '_self',
								esc_html__('New Window','klippe-core') => '_blank',
							),
						    'dependency' => array('element' => 'image_link', 'not_empty' => true),
							'save_always' => true,
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' => '',
			'image_link' => '',
			'image_target' => '_self',
			'image_title'	=> '',
			'image_subtitle' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['shortcode_classes'] = $this->getShortcodeClasses($params);

		$html = klippe_core_get_shortcode_module_template_part('templates/scrolling-image-template' , 'scrolling-image', '', $params);

		return $html;
	}

	/**
	 * Return Device Showcase classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getShortcodeClasses($params) {

		$shortcode_classes = array();

		$shortcode_classes[] = 'mkdf-scrolling-image';

		return implode(' ', $shortcode_classes);
	}
}
