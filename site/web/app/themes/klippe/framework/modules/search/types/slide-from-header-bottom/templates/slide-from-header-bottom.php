<div class="mkdf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="mkdf-form-holder">
			<input type="text" placeholder="<?php esc_html_e( 'Search', 'klippe' ); ?>" name="s" class="mkdf-search-field" autocomplete="off" />
			<button type="submit" <?php klippe_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo klippe_mikado_get_search_icon_html(); ?>
			</button>
		</div>
	</form>
</div>