<?php if(klippe_mikado_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('klippe_mikado_get_like') ) klippe_mikado_get_like(); ?>
    </div>
<?php } ?>