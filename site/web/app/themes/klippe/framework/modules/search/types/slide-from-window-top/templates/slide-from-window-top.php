<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="mkdf-grid">
	<?php } ?>
		<div class="mkdf-search-form-inner">
			<span <?php klippe_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo klippe_mikado_get_search_icon_html(); ?>
			</span>
			<input type="text" placeholder="<?php esc_html_e( 'Search', 'klippe' ); ?>" name="s" class="mkdf-swt-search-field" autocomplete="off"/>
			<a <?php klippe_mikado_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo klippe_mikado_get_search_close_icon_html(); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>