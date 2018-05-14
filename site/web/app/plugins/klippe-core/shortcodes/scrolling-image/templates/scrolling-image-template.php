<div <?php klippe_mikado_class_attribute($shortcode_classes);?>>
	<div class="mkdf-scrolling-image-inner">
		<div class="mkdf-text-holder">
			<?php if ($image_title != '') { ?>
				<h3 class="mkdf-image-title"><?php echo esc_attr($image_title) ?></h3>
			<?php } ?>
			<?php if ($image_subtitle != '') { ?>
				<h6 class="mkdf-image-subtitle"><?php echo esc_attr($image_subtitle) ?></h6>
			<?php } ?>
		</div>
		
		<div class="mkdf-image-holder">
			<img class="mkdf-image-frame" src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php esc_html(_e('scrolling image holder','klippe')); ?>" />
			<div class="mkdf-image-holder-inner">
				<img class="mkdf-scrolling-img" src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo get_the_title( $image ); ?>" />
			</div>
		</div>
	</div>
	<?php if ($image_link != '') { ?>
		<a class="mkdf-scrolling-image-link" href="<?php echo esc_url($image_link) ?>" target="<?php echo esc_attr($image_target) ?>"></a>
	<?php } ?>
</div>
