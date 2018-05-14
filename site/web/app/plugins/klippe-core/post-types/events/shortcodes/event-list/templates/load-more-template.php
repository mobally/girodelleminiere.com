<?php

if ($show_more == 'load_more'){
    $text = esc_html__('Show More','klippe-core');
    $type = 'transparent';
}

if($query_results->max_num_pages>1 && function_exists('klippe_mikado_get_button_html')){ ?>
    <div class="mkdf-el-list-paging">
		<span class="mkdf-el-list-load-more">
			<?php
            echo klippe_mikado_get_button_html(array(
                'type' => $type,
                'link' => 'javascript: void(0)',
                'text' => $text
            ));
            ?>
		</span>
    </div>
<?php }