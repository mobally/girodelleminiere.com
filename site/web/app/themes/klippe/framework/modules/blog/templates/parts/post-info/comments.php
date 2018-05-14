<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<?php
			    echo klippe_mikado_icon_collections()->renderIcon( 'fa fa-comment', 'font_awesome' );
                comments_number('0 ' . esc_html__('Comments','klippe'), '1 '.esc_html__('Comment','klippe'), '% '.esc_html__('Comments','klippe') );
            ?>
		</a>
	</div>
<?php } ?>