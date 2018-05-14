<?php if(klippe_mikado_options()->getOptionValue('event_single_show_location') == 'yes') {
	$location = get_post_meta(get_the_ID(),'mkdf_event_location',true);

	if ($location !== '') {
	?>
    <div class="mkdf-event-info-item mkdf-event-location">
        <span class="mkdf-event-info-item-title"><?php esc_html_e('Location:', 'klippe-core'); ?></span>
        <span class="mkdf-event-info-item-desc"><?php echo esc_html($location);?></span>
    </div>

<?php }
} ?>