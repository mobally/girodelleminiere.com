<?php if(have_posts()): while(have_posts()) : the_post(); ?>
	<div class="mkdf-event-single-holder">
		<div class="mkdf-full-width">
		    <div class="mkdf-full-width-inner">
						<?php if(post_password_required()) {
							echo get_the_password_form();
						} else {
							//load proper events template
							klippe_core_get_cpt_single_module_template_part('templates/single/single', 'events', $slug);
						} ?>
	        </div>
	    </div>
	</div>
<?php
	//load events navigation
	klippe_core_get_cpt_single_module_template_part('templates/single/parts/navigation', 'events');
	
	//load events comments
	klippe_core_get_cpt_single_module_template_part('templates/single/parts/comments', 'events');

	endwhile;
	endif;
?>