<?php 
if(is_array($images) && count($images)) : ?>
		<div class="mkdf-event-images-slider mkdf-owl-slider mkdf-slick-slider-navigation-style" data-number-of-items="5" data-enable-navigation="no">
			<?php
			foreach($images as $single_image) : 
				extract($single_image);
			?>
			<div class="mkdf-event-single-image">
			    <a title="<?php echo esc_attr($title); ?>" data-rel="prettyPhoto[single_event_pretty_photo]" href="<?php echo esc_url($image_src[0]); ?>">
					<img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($description); ?>" />
				</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>