<?php if ( klippe_mikado_options()->getOptionValue( 'event_single_show_pagination' ) == 'yes' ) : ?>

	<?php
	$nav_same_category = klippe_mikado_options()->getOptionValue( 'event_single_nav_same_category' ) == 'yes';
	?>

	<div class="mkdf-event-single-nav">
		<div class="mkdf-event-single-nav-inner">
			<?php if ( get_previous_post() !== '' ) : ?>
				<div class="mkdf-event-prev">
					<?php if ( $nav_same_category ) {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Event', 'klippe-core' ), true, '', 'mikado-event-category' );
					} else {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Event', 'klippe-core' ) );
					} ?>
				</div>
			<?php endif; ?>
			<?php if ( get_next_post() !== '' ) : ?>
				<div class="mkdf-event-next">
					<?php if ( $nav_same_category ) {
						next_post_link( '%link', esc_html__( 'Next Event', 'klippe-core' ).'<span class="arrow_right"></span>', true, '', 'mikado-event-category' );
					} else {
						next_post_link( '%link', esc_html__( 'Next Event', 'klippe-core' ).'<span class="arrow_right"></span>');
					} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>