<?php 
$mkdf_event_subtitle = get_post_meta(get_the_ID(), 'mkdf_event_subtitle', true);

?>

<div class="mkdf-event-title-holder">
	<?php  if ($mkdf_event_subtitle !== '') { ?>
		<span class="mkdf-event-subtitle"><?php echo esc_html($mkdf_event_subtitle)?></span>
	<?php } ?>
    <h3 class="mkdf-event-title"><?php the_title(); ?></h3>
</div>