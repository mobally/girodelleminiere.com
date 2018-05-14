<div class="mkdf-event-related-holder">
    <h3><?php esc_html_e('Related Events', 'klippe-core'); ?></h3>
    <div class="mkdf-event-related-slider clearfix">
        <?php
        $query =  klippe_mikado_get_related_post_type(get_the_ID(), array('posts_per_page' => '6'));
        if (is_object($query)) {
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    $id = get_the_ID();

                    $category_html =  klippe_mikado_event_get_categories();
                    $start_date =  klippe_mikado_event_get_start_date($id);

                    ?>
                    <article class="mkdf-event-item mix">
	                    <div class="mkdf-event-item-inner">
	                    	<div class = "mkdf-item-image-holder">
								<a class="mkdf-event-link" href="<?php echo get_permalink($id); ?>"></a>
									<?php
										echo get_the_post_thumbnail(get_the_ID(),'klippe_mikado_landscape');
									?>
								<div class="mkdf-item-text-overlay">
									<div class="mkdf-item-text-overlay-inner">
										<div class="mkdf-item-text-holder">
											<?php echo wp_kses_post($category_html);?>
											<h3 class="mkdf-item-title">
												<a class="mkdf-event-title-link" href="<?php echo get_permalink($id); ?>">
													<?php echo esc_attr(get_the_title()); ?>
												</a>
											</h3>
											<span class="mkdf-item-date"><?php echo esc_html($start_date); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </article>
                <?php } ?>
                <?php
            endwhile;
            endif;
            wp_reset_postdata();
        } else { ?>
            <p><?php esc_html_e('No related events were found.', 'klippe-core'); ?></p>
        <?php }
        ?>
    </div>
</div>

