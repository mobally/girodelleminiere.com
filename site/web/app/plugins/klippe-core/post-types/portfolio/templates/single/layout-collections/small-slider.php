<div class="mkdf-grid-row">
	<div class="mkdf-grid-col-9">
		<div class="mkdf-ps-image-holder">
			<div class="mkdf-ps-image-inner mkdf-owl-slider">
				<?php
				$media = klippe_core_get_portfolio_single_media();
				
				if(is_array($media) && count($media)) : ?>
					<?php foreach($media as $single_media) : ?>
						<div class="mkdf-ps-image">
							<?php klippe_core_get_portfolio_single_media_html($single_media); ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="mkdf-grid-col-3">
		<div class="mkdf-ps-info-holder">
            <h3 class="mkdf-ps-item-title"><?php the_title(); ?></h3>
			<?php
			//get portfolio content section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>

			<h4><?php esc_html_e( 'Info', 'klippe-core' ); ?></h4>

			<?php
			
			//get portfolio categories section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
			
			//get portfolio date section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
			
			//get portfolio tags section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);

			//get portfolio custom fields section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);
			
			//get portfolio share section
			klippe_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
			?>
		</div>
	</div>
</div>