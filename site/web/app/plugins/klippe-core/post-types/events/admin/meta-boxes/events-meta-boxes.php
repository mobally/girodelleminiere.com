<?php

if(!function_exists('klippe_core_events_meta_fields')) {

    function klippe_core_events_meta_fields() {

        $event_meta_box = klippe_mikado_add_meta_box(
            array(
                'scope' => array('event'),
                'title' => esc_html__('Event','klippe-core'),
                'name' => 'event_meta'
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Layout', 'klippe-core'),
                'description' => esc_html__('Choose layout', 'klippe-core'),
                'parent' => $event_meta_box,
                'options'     => array(
                    '' => esc_html__('Default','klippe-core'),
                    'custom' => esc_html__('Custom Layout','klippe-core')
                )
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_subtitle',
                'type' => 'text',
                'label' => esc_html__('Subtitle', 'klippe-core'),
                'description' => esc_html__('Enter the subtitle', 'klippe-core'),
                'parent' => $event_meta_box,
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_location',
                'type' => 'text',
                'label' => esc_html__('Location', 'klippe-core'),
                'description' => esc_html__('Enter the location of event', 'klippe-core'),
                'parent' => $event_meta_box,
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_start_date',
                'type' => 'date',
                'label' => esc_html__('Start Date', 'klippe-core'),
                'description' => esc_html__('Enter the start date for event', 'klippe-core'),
                'parent' => $event_meta_box,
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_end_date',
                'type' => 'date',
                'label' => esc_html__('End Date', 'klippe-core'),
                'description' => esc_html__('Enter the end date for event, if end date not set, start date is used instead', 'klippe-core'),
                'parent' => $event_meta_box,
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_event_start_time',
                'type'        => 'text',
                'label'       => esc_html__('Start Time','klippe-core'),
                'description' => esc_html__('Please input the time in a HH:MM format. If you are using a 12 hour time format, please also input AM or PM markers.','klippe-core'),
                'parent'      => $event_meta_box
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_event_end_time',
                'type'        => 'text',
                'label'       => esc_html__('End Time','klippe-core'),
                'description' => esc_html__('Please input the time in a HH:MM format. If you are using a 12 hour time format, please also input AM or PM markers.','klippe-core'),
                'parent'      => $event_meta_box
            )
        );

        klippe_mikado_add_multiple_images_field(
            array(
                'name'        => 'mkdf_event_images',
                'label'       => esc_html__('Images', 'klippe-core'),
                'description' => esc_html__('Choose images', 'klippe-core'),
                'parent'      => $event_meta_box,
            )
        );

        klippe_mikado_add_meta_box_field(
            array(
                'name' => 'mkdf_event_images_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Images Layout', 'klippe-core'),
                'description' => esc_html__('Choose images layout', 'klippe-core'),
                'parent' => $event_meta_box,
                'options'     => array(
                    '' => esc_html__('Default','klippe-core'),
                    'slider' => esc_html__('Slider','klippe-core'),
                    'gallery' => esc_html__('Gallery','klippe-core')
                )
            )
        );

        klippe_mikado_add_admin_section_title(
            array(
                'name'   => 'event_additional_info_title',
                'parent' => $event_meta_box,
                'title'  => esc_html__('Additional Info','klippe-core')
            )
        );

        klippe_mikado_add_repeater_field(array(
                'name'        => 'mkdf_event_additional_info',
                'parent'      => $event_meta_box,
                'button_text' => esc_html__('Add Event Info','klippe-core'),
                'fields'      => array(
                    array(
                        'type'        => 'text',
                        'name'        => 'title',
                        'label'       => esc_html__('Info Title','klippe-core')
                    ),
                    array(
                        'type'        => 'text',
                        'name'        => 'description',
                        'label'       => esc_html__('Info Description','klippe-core')
                    )
                )
            )
        );
    }

    add_action('klippe_mikado_meta_boxes_map', 'klippe_core_events_meta_fields', 95);
}