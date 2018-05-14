<?php

if ( ! function_exists( 'klippe_core_events_meta_box_functions' ) ) {
    function klippe_core_events_meta_box_functions( $post_types ) {
        $post_types[] = 'event';

        return $post_types;
    }

    add_filter( 'klippe_mikado_meta_box_post_types_save', 'klippe_core_events_meta_box_functions' );
    add_filter( 'klippe_mikado_meta_box_post_types_remove', 'klippe_core_events_meta_box_functions' );
}

if ( ! function_exists( 'klippe_core_events_scope_meta_box_functions' ) ) {
    function klippe_core_events_scope_meta_box_functions( $post_types ) {
        $post_types[] = 'event';

        return $post_types;
    }

    add_filter( 'klippe_mikado_set_scope_for_meta_boxes', 'klippe_core_events_scope_meta_box_functions' );
}

if ( ! function_exists( 'klippe_core_event_add_social_share_option' ) ) {
    function klippe_core_event_add_social_share_option( $container ) {
        klippe_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'enable_social_share_on_event',
                'default_value' => 'no',
                'label'         => esc_html__( 'Single Event', 'klippe-core' ),
                'description'   => esc_html__( 'Show Social Share for Event Items', 'klippe-core' ),
                'parent'        => $container
            )
        );
    }

    add_action( 'klippe_mikado_post_types_social_share', 'klippe_core_event_add_social_share_option', 10, 1 );
}

if ( ! function_exists( 'klippe_core_register_events_cpt' ) ) {
    function klippe_core_register_events_cpt( $cpt_class_name ) {
        $cpt_class = array(
            'MikadoCore\CPT\Event\EventRegister'
        );

        $cpt_class_name = array_merge( $cpt_class_name, $cpt_class );

        return $cpt_class_name;
    }

    add_filter( 'klippe_core_filter_register_custom_post_types', 'klippe_core_register_events_cpt' );
}

// Load events shortcodes
if(!function_exists('klippe_core_include_events_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function klippe_core_include_events_shortcodes_files() {
        foreach(glob(MIKADO_CORE_CPT_PATH.'/events/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('klippe_core_action_include_shortcodes_file', 'klippe_core_include_events_shortcodes_files');
}

if(!function_exists('klippe_mikado_single_event')) {
    function klippe_mikado_single_event() {
        $slug = klippe_mikado_get_event_single_type();

        $params = array(
            'slug' => $slug
        );

        klippe_core_get_cpt_single_module_template_part('templates/single/holder', 'events', '', $params);
    }
}

if(!function_exists('klippe_mikado_get_event_single_type')) {
    function klippe_mikado_get_event_single_type() {
        $slug = get_post_meta(get_the_ID(),'mkdf_event_layout_meta',true);
        return $slug;
    }
}

if(!function_exists('klippe_mikado_get_single_event_images')) {
    function klippe_mikado_get_single_event_images() {
        $image_ids       = get_post_meta(get_the_ID(), 'mkdf_event_images', true);
        $event_media = array();

        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

            foreach($image_ids as $image_id) {
                $media                = array();
                $media['title']       = get_the_title($image_id);
                $media['type']        = 'image';
                $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');
                if(empty($media['description'])) {
                    $media['description'] = $media['title'];
                }

                $event_media[] = $media;
            }
        }

        return $event_media;
    }
}

if(!function_exists('klippe_mikado_event_get_info_part')) {
    function klippe_mikado_event_get_info_part($part) {

        klippe_core_get_cpt_single_module_template_part('templates/single/parts/'.$part, 'events');
    }
}

if (!function_exists('klippe_mikado_event_get_categories')) {
    function klippe_mikado_event_get_categories($id = ''){
        if ($id == ''){
            $id = klippe_mikado_get_page_id();
        }
        $categories   = wp_get_post_terms($id, 'event-category');
        $category_html = array();

        if(is_array($categories) && count($categories)){
            foreach($categories as $category) {
                $cat_html = '<a itemprop="url" class="mkdf-item-info-category" href="'.esc_url(get_term_link($category->term_id)).'">'.esc_html($category->name).'</a>';
                $category_html[] = $cat_html;
            }
        }
        $categories = implode(', ',$category_html);

        return $categories;
    }
}

if (!function_exists('klippe_mikado_event_get_start_date')) {
    function klippe_mikado_event_get_start_date($id = '',$default_format = true){
        if ($id == ''){
            $id = klippe_mikado_get_page_id();
        }

        $start_date = '';

        $start_date_temp = strtotime(get_post_meta($id,'mkdf_event_start_date',true));

        if ($start_date_temp){
            if ($default_format){
                $start_date = date(get_option('date_format'),$start_date_temp);
            }
            else{
                $start_date['day'] = date('d',$start_date_temp);
                $start_date['month'] = date('F',$start_date_temp);
                $start_date['year'] = date('Y',$start_date_temp);
            }
        }

        return $start_date;

    }
}


/*
** Function that returns start date, end date and duration for event
*/
if (!function_exists('klippe_mikado_event_get_date_params')) {
    function klippe_mikado_event_get_date_params($id = ''){
        if ($id == ''){
            $id = klippe_mikado_get_page_id();
        }

        $date_params = array();
        $date_params['start_date'] = esc_html__('Unknown','klippe-core');

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

        $date_params['duration'] = $duration;

        return $date_params;

    }
}

if (!function_exists('klippe_mikado_event_get_date_part')) {
    function klippe_mikado_event_get_date_part(){

        $date_showing = klippe_mikado_options()->getOptionValue('event_single_date_showing');

        if ($date_showing == 'none'){
            return false;
        }

        $date_params['date_showing'] = $date_showing;

        $date_params = array_merge($date_params,klippe_mikado_event_get_date_params());

        return klippe_core_get_cpt_single_module_template_part('templates/single/parts/date', 'events', '', $date_params);

    }
}

if(!function_exists('klippe_mikado_get_event_category_list')) {
    function klippe_mikado_get_event_category_list($category = '') {

        $number_of_items = 8;
        $item_layout = 'standard';

        $params = array(
            'type'           => $item_layout,
            'category'       => $category,
            'order_by'       => 'start-date',
            'show_more'      => 'none',
            'number' => '-1',
        );

        $html = klippe_mikado_execute_shortcode('mkdf_event_list', $params);

        print $html;
    }
}

if ( ! function_exists( 'klippe_core_get_single_event' ) ) {
    function klippe_core_get_single_event() {
        klippe_core_get_cpt_single_module_template_part( 'templates/single/holder', 'events', '', '' );
    }
}

/**
 * Loads more function for event.
 */
if ( ! function_exists( 'klippe_core_event_ajax_load_more' ) ) {
    function klippe_core_event_ajax_load_more() {
        $shortcode_params = array();

        if ( ! empty( $_POST ) ) {
            foreach ( $_POST as $key => $value ) {
                if ( $key !== '' ) {
                    $addUnderscoreBeforeCapitalLetter = preg_replace( '/([A-Z])/', '_$1', $key );
                    $setAllLettersToLowercase         = strtolower( $addUnderscoreBeforeCapitalLetter );

                    $shortcode_params[ $setAllLettersToLowercase ] = $value;
                }
            }
        }

        $port_list = new \MikadoCore\CPT\Shortcodes\Event\EventList();

        $query_array                     = $port_list->getQueryArray( $shortcode_params );
        $query_results                   = new \WP_Query( $query_array );
        $shortcode_params['this_object'] = $port_list;

        $single_data = array();

        $single_data['title_tag'] = $port_list->getTitleTag($shortcode_params);
        $single_data['thumb_image_size'] = $port_list->generateImageSize($shortcode_params);
        $single_data['events_standard_style'] = $port_list->getItemStandardStyle($shortcode_params);

        $html = '';
        if ( $query_results->have_posts() ):
            while ( $query_results->have_posts() ) : $query_results->the_post();

                $shortcode_params['id'] = get_the_ID();
                $single_data = array_merge($single_data, $port_list->getSingleData($shortcode_params,'1'));

                $html .= klippe_core_get_cpt_shortcode_module_template_part( 'events', 'event-list', 'standard', $shortcode_params['item_type'], $single_data );
            endwhile;
        else:
            $html .= '<p>'. esc_html__('Sorry, no events matched your criteria.', 'klippe-core') .'</p>';
        endif;

        wp_reset_postdata();

        $return_obj = array(
            'html' => $html,
        );

        echo json_encode( $return_obj );
        exit;
    }
}

add_action( 'wp_ajax_nopriv_klippe_core_event_ajax_load_more', 'klippe_core_event_ajax_load_more' );
add_action( 'wp_ajax_klippe_core_event_ajax_load_more', 'klippe_core_event_ajax_load_more' );