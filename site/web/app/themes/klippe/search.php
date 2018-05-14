<?php
$mkdf_search_holder_params = klippe_mikado_get_holder_params_search();
?>
<?php get_header(); ?>
<?php klippe_mikado_get_title(); ?>
<?php do_action('klippe_mikado_before_main_content'); ?>
	<div class="<?php echo esc_attr( $mkdf_search_holder_params['holder'] ); ?>">
		<?php do_action( 'klippe_mikado_after_container_open' ); ?>
		<div class="<?php echo esc_attr( $mkdf_search_holder_params['inner'] ); ?>">
			<?php klippe_mikado_get_search_page(); ?>
		</div>
		<?php do_action( 'klippe_mikado_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>