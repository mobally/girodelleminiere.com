<?php
$show_title = false;

//check if there is any od the info parts one by one, if it does then show title

//check categories
if(klippe_mikado_options()->getOptionValue('event_single_hide_categories') !== 'yes') {
    $categories   = wp_get_post_terms(get_the_ID(), 'mikado-event-category');

    if(is_array($categories) && count($categories)){
    	$show_title = true;
    }
}

//check custom fields
$custom_fields = klippe_mikado_get_repeater_values(get_the_ID(), array('mkdf_event_title','mkdf_event_description'));;

if(is_array($custom_fields) && count($custom_fields)){
	$show_title = true;
}

if(klippe_mikado_options()->getOptionValue('event_single_date_showing') !== 'none'){
	$show_title = true;
}

if ($show_title) { ?>
	<h4 class="mkdf-event-info-title"><?php esc_html_e('Info','klippe-core');?></h4>
<?php } ?>
