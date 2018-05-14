<?php
$custom_fields = get_post_meta(get_the_ID(), 'mkdf_event_additional_info', true);

if(is_array($custom_fields) && count($custom_fields)) {
    foreach($custom_fields as $custom_field) { ?>
        <div class="mkdf-event-info-item mkdf-event-custom-field">
            <?php if(!empty($custom_field['title'])) : ?>
                <span class="mkdf-event-info-item-title">
                	<?php echo esc_html($custom_field['title']); ?>:
                </span>
            <?php endif; ?>
            <?php if(!empty($custom_field['description'])) : ?>
				<span class="mkdf-event-info-item-desc">
					<?php echo esc_html($custom_field['description']); ?>
				</span>
            <?php endif; ?>
        </div>
    <?php } ?>

<?php } ?>
