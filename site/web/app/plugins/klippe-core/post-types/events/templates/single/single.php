<div class="mkdf-container">
	<div class="mkdf-container-inner clearfix">
		<div class="mkdf-grid-row">
			<div class="mkdf-grid-col-9">
				<div class="mkdf-event-top-left">
					<?php
					//get event title
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/title', 'events', '');
					?>
					<?php
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/content', 'events', '');
					?>
				</div>
			</div>
			<div class="mkdf-grid-col-3">
				<div class="mkdf-event-top-right">
					<?php

					//get event info title
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/info-title', 'events', '');

					// //get event categories section
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'events', '');

					// //get event location section
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/location', 'events', '');

					// //get event date section
					klippe_mikado_event_get_date_part();

					// //get event custom fields section
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'events', '');

					// //get event share section
					klippe_core_get_cpt_single_module_template_part('templates/single/parts/social', 'events', '');
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mkdf-event-image-holder">
	<?php
	$images_array = array();

	$images_array['images'] = klippe_mikado_get_single_event_images();
	$images_layout = klippe_mikado_get_meta_field_intersect('event_images_layout', klippe_mikado_get_page_id());

	klippe_core_get_cpt_single_module_template_part('templates/single/parts/'.$images_layout, 'events','',$images_array); ?>
</div>