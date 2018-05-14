<?php
$mkdf_sidebar_layout = klippe_mikado_sidebar_layout();

get_header();
klippe_mikado_get_title();
get_template_part( 'slider' );
do_action('klippe_mikado_before_main_content');
?>

<div class="mkdf-container mkdf-default-page-template">
	<?php do_action( 'klippe_mikado_after_container_open' ); ?>
	
	<div class="mkdf-container-inner clearfix">
        <?php do_action( 'klippe_mikado_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="mkdf-grid-row">
				<div <?php echo klippe_mikado_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'klippe_mikado_page_after_content' );
					?>
				</div>
				<?php if ( $mkdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo klippe_mikado_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'klippe_mikado_before_container_inner_close' ); ?>
	</div>
	
	<?php do_action( 'klippe_mikado_before_container_close' ); ?>
</div>

<?php get_footer(); ?>