<?php

if ( ! function_exists('klippe_mikado_event_options_map') ) {

    function klippe_mikado_event_options_map() {

        klippe_mikado_add_admin_page(array(
            'slug'  => '_event',
            'title' => esc_html__('Events','klippe-core'),
            'icon'  => 'fa fa-calendar-o'
        ));

        $panel = klippe_mikado_add_admin_panel(array(
            'title' => esc_html__('Event Single','klippe-core'),
            'name'  => 'panel_event_single',
            'page'  => '_event'
        ));

        klippe_mikado_add_admin_field(array(
            'name'          => 'event_single_show_categories',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Categories in Info','klippe-core'),
            'description'   => esc_html__('Enabling this option will enable category meta description on Single Events.','klippe-core'),
            'parent'        => $panel,
            'default_value' => 'yes'
        ));

        klippe_mikado_add_admin_field(array(
            'name'          => 'event_single_show_location',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Location','klippe-core'),
            'description'   => esc_html__('Enabling this option will enable location meta on Single Event.','klippe-core'),
            'parent'        => $panel,
            'default_value' => 'yes'
        ));

        klippe_mikado_add_admin_field(array(
            'name'          => 'event_single_date_showing',
            'type'          => 'select',
            'label'         => esc_html__('Date Showing','klippe-core'),
            'description'   => esc_html__('Choose how will date info be shown on Single Event','klippe-core'),
            'parent'        => $panel,
            'default_value' => 'start_duration',
            'options'		=> array(
                'start_duration' => esc_html__('Start Date and Duration','klippe-core'),
                'start_end' => esc_html__('Start and End Date','klippe-core'),
                'none' => esc_html__('None','klippe-core'),
            )
        ));

        klippe_mikado_add_admin_field(array(
            'name' => 'event_images_layout',
            'type' => 'select',
            'label' => esc_html__('Images Layout', 'klippe-core'),
            'description' => esc_html__('Choose images layout', 'klippe-core'),
            'parent' => $panel,
            'default_value' => 'gallery',
            'options'     => array(
                'gallery' => esc_html__('Gallery','klippe-core'),
                'slider' => esc_html__('Slider','klippe-core'),
            )
        ));

        klippe_mikado_add_admin_field(array(
            'name'          => 'event_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments','klippe-core'),
            'description'   => esc_html__('Enabling this option will show comments on your event.','klippe-core'),
            'parent'        => $panel,
            'default_value' => 'no'
        ));

        klippe_mikado_add_admin_field(array(
            'name'          => 'event_single_show_pagination',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Pagination','klippe-core'),
            'description'   => esc_html__('Enabling this option will turn on event pagination functionality.','klippe-core'),
            'parent'        => $panel,
            'default_value' => 'no',
            'args' => array(
                'dependence' => true,
                'dependence_show_on_yes' => '#mkdf_navigate_same_category_container',
                'dependence_hide_on_yes' => ''
            )
        ));

        $container_navigate_category = klippe_mikado_add_admin_container(array(
            'name'            => 'navigate_same_category_container',
            'parent'          => $panel,
            'hidden_property' => 'event_single_show_pagination',
            'hidden_value'    => 'no'
        ));

        klippe_mikado_add_admin_field(array(
            'name'            => 'event_single_nav_same_category',
            'type'            => 'yesno',
            'label'           => esc_html__('Enable Pagination Through Same Category','klippe-core'),
            'description'     => esc_html__('Enabling this option will make event pagination sort through current category.','klippe-core'),
            'parent'          => $container_navigate_category,
            'default_value'   => 'no'
        ));

        klippe_mikado_add_admin_field(array(
            'name'        => 'event_single_slug',
            'type'        => 'text',
            'label'       => esc_html__('Event Single Slug','klippe-core'),
            'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','klippe-core'),
            'parent'      => $panel,
            'args'        => array(
                'col_width' => 3
            )
        ));

    }

    add_action( 'klippe_mikado_options_map', 'klippe_mikado_event_options_map', 13);

}