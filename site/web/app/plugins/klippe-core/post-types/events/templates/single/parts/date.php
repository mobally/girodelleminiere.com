<div class="mkdf-event-info-item mkdf-event-date">
    <span class="mkdf-event-info-item-title"><?php esc_html_e('Date:', 'klippe-core'); ?></span>
    <span class="mkdf-event-info-item-desc"><?php echo esc_html($start_date);?></span>
</div>
<?php if ($date_showing == 'start_duration') { ?>
<div class="mkdf-event-info-item mkdf-event-date">
    <span class="mkdf-event-info-item-title"><?php esc_html_e('Duration:', 'klippe-core'); ?></span>
    <span class="mkdf-event-info-item-desc"><?php echo esc_html($duration);?></span>
</div>
<?php } else { ?>
<div class="mkdf-event-info-item mkdf-event-date">
    <span class="mkdf-event-info-item-title"><?php esc_html_e('End Date:', 'klippe-core'); ?></span>
    <span class="mkdf-event-info-item-desc"><?php echo esc_html($end_date);?></span>
</div>
<?php } ?>