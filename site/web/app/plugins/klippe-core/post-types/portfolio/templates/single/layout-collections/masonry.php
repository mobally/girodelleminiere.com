<?php
$masonry_classes = '';
$number_of_columns = klippe_mikado_get_meta_field_intersect('portfolio_single_masonry_columns_number');
if(!empty($number_of_columns)) {
	$masonry_classes .= ' mkdf-ps-'.$number_of_columns.'-columns';
}
$space_between_items = klippe_mikado_get_meta_field_intersect('portfolio_single_masonry_space_between_items');
if(!empty($space_between_items)) {
	$masonry_classes .= ' mkdf-'.$space_between_items.'-space';
}
?>
<div class="mkdf-grid-row">
	<div class="mkdf-grid-col-9">
        <h3 class="mkdf-ps-item-title"><?php the_title(); ?></h3>
		<?php klippe_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
	</div>
	<div class="mkdf-grid-col-3">
		<div class="mkdf-ps-info-holder">
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
<div class="mkdf-ps-image-holder mkdf-ps-masonry-images mkdf-disable-bottom-space <?php echo esc_attr($masonry_classes); ?>">
	<div class="mkdf-ps-image-inner mkdf-outer-space">
		<div class="mkdf-ps-grid-sizer"></div>
		<div class="mkdf-ps-grid-gutter"></div>
		<?php
		$media = klippe_core_get_portfolio_single_media();

		if(is_array($media) && count($media)) : ?>
			<?php foreach($media as $single_media) : ?>
				<div class="mkdf-ps-image mkdf-item-space <?php echo esc_attr($single_media['holder_classes']); ?>">
					<?php klippe_core_get_portfolio_single_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>