<?php if( klippe_mikado_options()->getOptionValue('enable_social_share') == 'yes' &&  klippe_mikado_options()->getOptionValue('enable_social_share_on_event') == 'yes') : ?>
    <div class="mkdf-event-social">
        <?php echo klippe_mikado_get_social_share_html(array('type' => 'list', 'title' => 'SHARE')); ?>
    </div>
<?php endif; ?>
