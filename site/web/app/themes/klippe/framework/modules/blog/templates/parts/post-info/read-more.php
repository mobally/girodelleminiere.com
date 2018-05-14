<?php if ( ! klippe_mikado_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="mkdf-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'klippe' ),
				'custom_class' => 'mkdf-blog-list-button mkdf-btn-icon mkdf-btn-custom-hover-color mkdf-btn-small',
                'icon_pack'    => 'font_awesome',
                'fa_icon'      => 'fa fa-plus'
			);
			
			echo klippe_mikado_return_button_html( $button_params );
		?>
	</div>
<?php } ?>