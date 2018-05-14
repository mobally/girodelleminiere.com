<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$mkdf_sidebar_layout = klippe_mikado_sidebar_layout();

get_header();
klippe_mikado_get_title();
get_template_part( 'slider' );
do_action('klippe_mikado_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<div class="mkdf-grid-row">
				<div <?php echo klippe_mikado_get_content_sidebar_class(); ?>>
					<?php klippe_mikado_woocommerce_content(); ?>
				</div>
				<?php if ( $mkdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo klippe_mikado_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<?php klippe_mikado_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>