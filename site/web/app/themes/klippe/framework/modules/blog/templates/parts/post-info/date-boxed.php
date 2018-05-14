<?php
$day  = get_the_time('d');
$months = get_the_time('F');
$month = get_the_time('m');
$year = get_the_time('Y');
$title = get_the_title();
?>
<div itemprop="dateCreated" class="mkdf-post-info-date-boxed entry-date published updated">
	<?php if(empty($title) && klippe_mikado_blog_item_has_link()) { ?>
	<a itemprop="url" href="<?php the_permalink() ?>">
		<?php } else { ?>
		<a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
			<?php } ?>
            <span class="mkdf-post-info-date-day">
			    <?php echo wp_kses_post($day) ?>
            </span>
            <span class="mkdf-post-info-date-month">
			    <?php echo wp_kses_post($months) ?>
            </span>
		</a>
		<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(klippe_mikado_get_page_id()); ?>"/>
</div>