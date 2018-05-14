<?php
namespace MikadoCore\CPT\Shortcodes\Event;

use MikadoCore\Lib;

/**
 * Class EventList
 * @package EdgeCore\PostTypes\Event\Shortcodes
 */
class EventList implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkdf_event_list';

        add_action( 'vc_before_init', array( $this, 'vcMap' ) );

        //Portfolio category filter
        add_filter( 'vc_autocomplete_mkdf_event_list_category_callback', array( &$this, 'eventCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio category render
        add_filter( 'vc_autocomplete_mkdf_event_list_category_render', array( &$this, 'eventCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio selected projects filter
        add_filter( 'vc_autocomplete_mkdf_v_list_selected_projects_callback', array( &$this, 'eventIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio selected projects render
        add_filter( 'vc_autocomplete_mkdf_event_list_selected_projects_render', array( &$this, 'eventIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

        //Portfolio tag filter
        add_filter( 'vc_autocomplete_mkdf_event_list_tag_callback', array( &$this, 'eventTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio tag render
        add_filter( 'vc_autocomplete_mkdf_event_list_tag_render', array( &$this, 'eventTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
    public function vcMap() {
        if(function_exists('vc_map')) {

            vc_map( array(
                    'name' => esc_html__('Event List','klippe-core'),
                    'base' => $this->getBase(),
                    'category' => esc_html__('by MIKADO','klippe-core'),
                    'icon' => 'icon-wpb-event-list extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Event List Template','klippe-core'),
                            'param_name' => 'type',
                            'value' => array(
                                esc_html__('Standard','klippe-core') => 'standard',
                                esc_html__('Carousel', 'klippe-core' ) => 'carousel',
                            ),
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Item Background Color','klippe-core'),
                            'param_name' => 'item_background_color',
                            'dependency' => array('element' => 'type', 'value' => array('standard', 'carousel'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Image Size', 'klippe-core'),
                            'param_name' => 'image_size',
                            'value' => array(
                                esc_html__('Original', 'klippe-core') => 'original',
                                esc_html__('Landscape', 'klippe-core') => 'landscape',
                                esc_html__('Square', 'klippe-core') => 'square'
                            ),
                            'description' => '',
                            'dependency' => Array('element' => 'type', 'value' => array('standard', 'carousel')),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Title Tag','klippe-core'),
                            'param_name' => 'title_tag',
                            'value' => array(
                                ''   => '',
                                'h2' => 'h2',
                                'h3' => 'h3',
                                'h4' => 'h4',
                                'h5' => 'h5',
                                'h6' => 'h6',
                            ),
                            'dependency' => array('element' => 'type', 'value' => array('standard', 'carousel'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Show More','klippe-core'),
                            'param_name' => 'show_more',
                            'value' => array(
                                esc_html__('None','klippe-core') => 'none',
                                esc_html__('Load More Button','klippe-core') => 'load_more',
                            )
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order By','klippe-core'),
                            'param_name' => 'order_by',
                            'value' => array(
                                esc_html__('Start Date','klippe-core') => 'start-date',
                                esc_html__('Date','klippe-core') => 'date',
                                esc_html__('Title','klippe-core') => 'title',
                                esc_html__('Menu Order','klippe-core') => 'menu_order',
                            ),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order','klippe-core'),
                            'param_name' => 'order',
                            'value' => array(
                                esc_html__('ASC','klippe-core') => 'ASC',
                                esc_html__('DESC','klippe-core') => 'DESC',
                            ),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('One-Category Event List','klippe-core'),
                            'param_name' => 'category',
                            'description' => esc_html__('Enter one category slug (leave empty for showing all categories)','klippe-core'),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Number of Events Per Page','klippe-core'),
                            'param_name' => 'number',
                            'value' => '-1',
                            'description' => esc_html__('(enter -1 to show all)','klippe-core'),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Show Event by Status','klippe-core'),
                            'param_name' => 'event_status',
                            'value' => array(
                                esc_html__('All','klippe-core') => 'all',
                                esc_html__('Current and Upcoming','klippe-core') => 'upcoming',
                                esc_html__('Past','klippe-core') => 'past',
                            ),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Number of Columns','klippe-core'),
                            'param_name' => 'columns',
                            'value' => array(
                                esc_html__('Default','klippe-core') => '',
                                esc_html__('One','klippe-core') => '1',
                                esc_html__('Two','klippe-core') => '2',
                                esc_html__('Three','klippe-core') => '3',
                                esc_html__('Four','klippe-core') => '4',
                                esc_html__('Five','klippe-core') => '5',
                            ),
                            'description' => esc_html__('Default value is Three','klippe-core'),
                            'dependency' => array('element' => 'type', 'value' => array('standard')),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Show Only Projects with Listed IDs','klippe-core'),
                            'param_name' => 'selected_projects',
                            'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)','klippe-core'),
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'skin',
                            'heading'     => esc_html__( 'Skin', 'klippe-core' ),
                            'value'       => array(
                                esc_html__( 'Default', 'klippe-core' ) => '',
                                esc_html__( 'Light', 'klippe-core' )   => 'light',
                            ),
                            'save_always' => true,
                            'group' => esc_html__('Query and Layout Options','klippe-core')
                        ),
                    )
                )
            );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'type' => 'standard',
            'item_background_color' => '',
            'image_size' => 'original',
            'title_tag' => '',
            'columns' => '3',
            'order_by' => 'start-date',
            'order' => 'ASC',
            'event_status' => 'all',
            'number' => '-1',
            'category' => '',
            'selected_projects' => '',
            'show_more' => 'none',
            'next_page' => '',
            'skin'      => '',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $query_array = $this->getQueryArray($params);
        $query_results = new \WP_Query($query_array);
        $params['query_results'] = $query_results;

        $default_date = true; //for full_width template
        if (($type == 'standard') || ($type == 'carousel')){
            $default_date = false;
        }

        $params['default_date'] = $default_date;


        $classes = $this->getEventClasses($params);
        $inner_classes = $this->getEventInnerClasses($params);

        $single_data = array();

        $single_data['title_tag'] = $this->getTitleTag($params);
        $single_data['thumb_image_size'] = $this->generateImageSize($params);
        $single_data['events_standard_style'] = $this->getItemStandardStyle($params);

        $data_atts = $this->getDataAtts(array_merge($params, $single_data));
        $data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;

        $html = '';

        $html .= '<div class="mkdf-event-list-holder '.esc_attr($classes).'" '.$data_atts.'>';
        $html .= '<div class="mkdf-event-list-holder-inner '.esc_attr($inner_classes).'" data-number-of-items="3">';

        if($query_results->have_posts()):
            $i = 1;
            while ( $query_results->have_posts() ) : $query_results->the_post();

                $params['id'] = get_the_ID();
                $single_data = array_merge($single_data, $this->getSingleData($params,$i));

                $html .= klippe_core_get_cpt_shortcode_module_template_part('events', 'event-list', $type, '', $single_data);

                $i++;

            endwhile;
        else:

            $html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.','klippe-core') .'</p>';

        endif;
        $html .= '</div>'; // close mkdf-event-list-holder-inner
        if($show_more !== 'none'){
            $html .= klippe_core_get_cpt_shortcode_module_template_part('events','event-list','load-more-template', '', $params);
        }
        wp_reset_postdata();
        $html .= '</div>'; // close mkdf-event-list-holder
        return $html;
    }

    /**
     * Generates event list query attribute array
     *
     * @param $params
     *
     * @return array
     */
    public function getQueryArray($params){

        $query_array = array();
        $tax_query = array();
        $meta_query = array();
        $order_by = $params['order_by'];

        if ($params['order_by'] == 'start-date'){
            $order_by = 'meta_value';
        }

        $query_array = array(
            'post_type' => 'event',
            'orderby' => $order_by,
            'order' => $params['order'],
            'posts_per_page' => $params['number']
        );

        if ($params['order_by'] == 'start-date'){
            $query_array['meta_key'] = 'mkdf_event_start_date'; //here because has to be added to query
        }

        //display date by event status, ex. end date larger then todays date or if it doesn't exist compare start date
        switch ($params['event_status']) {
            case 'upcoming':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'mkdf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '>='
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'mkdf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'mkdf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '>='
                        ),
                    )
                );
                break;
            case 'past':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'mkdf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '<'
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'mkdf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'mkdf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '<'
                        ),
                    )
                );
                break;
        }

        if (is_array($meta_query) && count($meta_query)){
            $query_array['meta_query'][] = $meta_query;
        }

        if(!empty($params['category'])){
            $tax_query['taxonomy'] = 'event-category';
            $tax_query['field'] = 'slug';
            $tax_query['terms'] = $params['category'];
        }

        if (is_array($tax_query) && count($tax_query)){
            $query_array['tax_query'][] = $tax_query;
        }

        $project_ids = null;
        if (!empty($params['selected_projects'])) {
            $project_ids = explode(',', $params['selected_projects']);
            $query_array['post__in'] = $project_ids;
        }

        $paged = '';
        if(empty($params['next_page'])) {
            if(get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif(get_query_var('page')) {
                $paged = get_query_var('page');
            }
        }

        if(!empty($params['next_page'])){
            $query_array['paged'] = $params['next_page'];

        }else{
            $query_array['paged'] = 1;
        }

        return $query_array;
    }

    /**
     * Generates event classes
     *
     * @param $params
     *
     * @return string
     */
    public function getEventClasses($params){
        $classes = array();

        switch ($params['type']) {
            case 'standard':
                $classes[] = 'mkdf-event-list-standard';
                break;
            case 'carousel':
                $classes[] = 'mkdf-event-list-carousel';
                break;
            default:
                $classes[] = 'mkdf-event-list-standard';
                break;
        }

        switch ($params['show_more']) {
            case 'load_more':
                $classes[] = 'mkdf-event-list-show-more';
                $classes[] = 'mkdf-event-list-load-button';
                break;
        }

        if (!empty($params['columns'])) {
            $classes[] = 'mkdf-event-list-col-'.$params['columns'];
        }

        if(! empty( $params['skin'] ))  {
            $classes[] = 'mkdf-event-list-' . $params['skin'];
        }

        return implode(' ',$classes);

    }

    public function getEventInnerClasses($params) {
        $inner_classes = array();

        if($params['type'] === 'carousel') {
            $inner_classes[] = 'mkdf-owl-slider';
        }

        return implode(' ',$inner_classes);
    }

    /**
     * Return event list standard item style
     *
     * @param $params
     *
     * @return string
     */
    public function getItemStandardStyle($params){
        $style = array();

        if ($params['item_background_color'] !== ''){
            $style[] = 'background-color: '.$params['item_background_color'];
        }

        return implode('; ', $style);
    }

    /**
     * Return title tag
     *
     * @param $params
     *
     * @return string
     */
    public function getTitleTag($params){
        $title_tag = 'h2';

        if (!empty($params['title_tag'])){ //!empty because of possible null value from load more
            $title_tag = $params['title_tag'];
        }
        elseif ($params['type'] == 'standard' || $params['type'] == 'carousel') {
            $title_tag = 'h4';
        }

        return $title_tag;
    }

    /**
     * Generates single data array
     *
     * @param $params, $number
     *
     * @return array
     */
    public function getSingleData($params,$number){
        $single_data = array();
        $even = false;
        $id = $params['id'];
        $default_date = $params['default_date'];
        $date = '';
        $categories = '';

        if ($number%2 == 0){
            $even = true;
        }

        if (function_exists('klippe_mikado_event_get_start_date')){
            $date = klippe_mikado_event_get_start_date($id,$default_date);
        }

        if (function_exists('klippe_mikado_event_get_categories')){
            $categories = klippe_mikado_event_get_categories($id);
        }

        $button_params = array();

        if ($even){
            $single_data['class'] = 'mkdf-el-item-even';
            $button_params['type'] = 'solid';
        }
        else{
            $single_data['class'] = 'mkdf-el-item-odd';
            $button_params['type'] = 'solid-white';
        }

        $button_params['link'] = get_permalink($id);
        $button_params['text'] = esc_html__('More Info','klippe-core');

        $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size
        $large_image = $featured_image_array[0];

        $location = get_post_meta($id,'mkdf_event_location',true);
        $start_time = get_post_meta($id,'mkdf_event_start_time',true);
        $end_time = get_post_meta($id,'mkdf_event_end_time',true);

        $start_date = strtotime(get_post_meta($id,'mkdf_event_start_date',true));
        $end_date = strtotime(get_post_meta($id,'mkdf_event_end_date',true));
        $duration = esc_html__('Unknown','klippe-core');

        if ($start_date){
            $date_params['start_date'] = date(get_option('date_format'),$start_date);
        }

        if ($end_date){
            $date_params['end_date'] = date(get_option('date_format'), $end_date);
        }
        else{
            $end_date = $start_date;
            $date_params['end_date'] = $date_params['start_date'];
        }

        if($end_date && $start_date) {
            $duration_temp = $end_date - $start_date;
            $duration = $duration_temp / (60*60*24) + 1; //1 is for including end date
            $duration .= ($duration > 1) ? esc_html__(' Days','klippe-core') : esc_html__(' Day','klippe-core');
        }

        $single_data['date'] = ($date !== '') ? $date : '';
        $single_data['categories'] = ($categories !== '') ? $categories : '';
        $single_data['location'] = ($location !== '') ? $location : '';
        $single_data['start_time'] = ($start_time !== '') ? $start_time : '';
        $single_data['duration'] = ($duration !== '') ? $duration : '';
        $single_data['end_time'] = ($end_time !== '') ? $end_time : '';
        $single_data['button_params'] = $button_params;
        $single_data['image_background'] = ($large_image !== '') ? 'background-image: url('.esc_url($large_image).')' : '';

        return $single_data;
    }

    /**
     * Generates data attributes array
     *
     * @param $params
     *
     * @return array
     */
    public function getDataAtts($params){

        $data_attr = array();
        $data_return_string = '';

        if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if(!empty($paged)) {
            $data_attr['data-next-page'] = $paged+1;
        }
        if(!empty($params['type'])){
            $data_attr['data-type'] = $params['type'];
        }
        if(!empty($params['columns'])){
            $data_attr['data-columns'] = $params['columns'];
        }
        if(!empty($params['order_by'])){
            $data_attr['data-order-by'] = $params['order_by'];
        }
        if(!empty($params['order'])){
            $data_attr['data-order'] = $params['order'];
        }
        if(!empty($params['event_status'])){
            $data_attr['data-event-status'] = $params['event_status'];
        }
        if(!empty($params['number'])){
            $data_attr['data-number'] = $params['number'];
        }
        if(!empty($params['image_size'])){
            $data_attr['data-image-size'] = $params['image_size'];
        }
        if(!empty($params['category'])){
            $data_attr['data-category'] = $params['category'];
        }
        if(!empty($params['selected_projects'])){
            $data_attr['data-selected-projects'] = $params['selected_projects'];
        }
        if(!empty($params['show_more'])){
            $data_attr['data-show-more'] = $params['show_more'];
        }
        if(!empty($params['title_tag'])){
            $data_attr['data-title-tag'] = $params['title_tag'];
        }
        foreach($data_attr as $key => $value) {
            if($key !== '') {
                $data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
            }
        }
        return $data_return_string;
    }

    /**
     * Generates image size option
     *
     * @param $params
     *
     * @return string
     */
    public function generateImageSize($params){
        $thumbImageSize = '';
        $imageSize = $params['image_size'];

        if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'klippe_mikado_landscape';
        } else if($imageSize === 'square'){
            $thumbImageSize .= 'klippe_mikado_square';
        } else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
        return $thumbImageSize;
    }
}