<div class="mkdf-testimonial-content <?php echo esc_attr($content_classes); ?>" id="mkdf-testimonials-<?php echo esc_attr( $current_id ) ?>">
	<div class="mkdf-testimonial-text-holder">
		<?php if ( ! empty( $title ) ) { ?>
			<h3 itemprop="name" class="mkdf-testimonial-title entry-title"><?php echo esc_html( $title ); ?></h3>
			<div class="mkdf-separator-holder clearfix">
				<div class="mkdf-separator"></div>
			</div>
		<?php } ?>
		<?php if ( ! empty( $text ) ) { ?>
			<p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
		<?php } ?>
		<?php if ( ! empty( $author ) ) { ?>
			<h4 class="mkdf-testimonial-author">
				<span class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
				<?php if ( ! empty( $position ) ) { ?>
					<span class="mkdf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
				<?php } ?>
			</h4>
		<?php } ?>
	</div>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="mkdf-testimonial-image">
			<?php echo get_the_post_thumbnail( get_the_ID(), array( 66, 66 ) ); ?>
		</div>
	<?php } ?>
</div>