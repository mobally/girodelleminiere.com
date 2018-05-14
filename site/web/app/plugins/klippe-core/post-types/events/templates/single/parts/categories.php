<?php if(klippe_mikado_options()->getOptionValue('event_single_show_categories') == 'yes' && klippe_mikado_event_get_categories() !== '') { ?>
    <div class="mkdf-event-info-item mkdf-event-categories">
        <span class="mkdf-event-info-item-title"><?php esc_html_e('Category:', 'klippe-core'); ?></span>
        <span class="mkdf-event-info-item-desc"><?php echo klippe_mikado_event_get_categories(); ?></span>
    </div>
<?php } ?>