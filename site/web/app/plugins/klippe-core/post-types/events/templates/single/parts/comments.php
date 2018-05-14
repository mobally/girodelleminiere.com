<?php if(klippe_mikado_options()->getOptionValue('event_single_comments') == 'yes'){ ?>
    <div class="mkdf-grid">
       <?php comments_template('', true); ?>
   </div>
<?php } ?>
