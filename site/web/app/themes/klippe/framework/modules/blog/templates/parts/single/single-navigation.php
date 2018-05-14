<?php
$blog_single_navigation = klippe_mikado_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = klippe_mikado_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
    <div class="mkdf-blog-single-navigation">
        <div class="mkdf-blog-single-navigation-inner clearfix">
			<?php
			/* Single navigation section - SETTING PARAMS */
			$same_cat_flag = false;
			if($blog_navigation_through_same_category){
				$same_cat_flag = true;
			}
			$prevPost = get_previous_post($same_cat_flag);
			$nextPost = get_next_post($same_cat_flag);

			if(isset($prevPost) && $prevPost !== '' && $prevPost !== null){

				$post_navigation['prev']['post'] = $prevPost;

				$post_navigation['prev']['classes'] = array(
					'mkdf-blog-single-nav-prev'
				);

				$image = get_the_post_thumbnail($prevPost->ID);
				$post_navigation['prev']['image'] = '';

				if($image !== ''){
					$post_navigation['prev']['image'] = '<div class="mkdf-blog-single-nav-thumbnail">'.wp_kses_post($image).'</div>';
					$post_navigation['prev']['classes'][] = 'mkdf-with-image';
				}

				$post_navigation['prev']['title'] = '<h5 class="mkdf-blog-single-nav-title">'.get_the_title($prevPost->ID).'</h5>';
				$post_navigation['prev']['arrow'] = '<span class="mkdf-blog-single-nav-arrow">'.klippe_mikado_icon_collections()->renderIcon( 'fa-arrow-left', 'font_awesome') . esc_html__('Previous','klippe').'</span>';

			}

			if(isset($nextPost) && $nextPost !== '' && $nextPost !== null){

				$post_navigation['next']['post'] = $nextPost;

				$post_navigation['next']['classes'] = array(
					'mkdf-blog-single-nav-next'
				);

				$image = get_the_post_thumbnail($nextPost->ID);
				$post_navigation['next']['image'] = '';

				if($image !== ''){
					$post_navigation['next']['image'] = '<div class="mkdf-blog-single-nav-thumbnail">'.wp_kses_post($image).'</div>';
					$post_navigation['next']['classes'][] = 'mkdf-with-image';
				}

				$post_navigation['next']['title'] = '<h5 class="mkdf-blog-single-nav-title">'.get_the_title($nextPost->ID).'</h5>';
				$post_navigation['next']['arrow'] = '<span class="mkdf-blog-single-nav-arrow">'.esc_html__('Next','klippe').klippe_mikado_icon_collections()->renderIcon( 'fa-arrow-right', 'font_awesome').'</span>';

			}


			/* Single navigation section - RENDERING */
			foreach (array('prev', 'next') as $nav_type) {

				if(isset($post_navigation[$nav_type])){ ?>

                    <div class="<?php echo implode(' ', $post_navigation[$nav_type]['classes']) ?>">
                        <a itemprop="url" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<?php
							echo wp_kses_post($post_navigation[$nav_type]['image']);
							echo wp_kses_post($post_navigation[$nav_type]['title']);
							echo wp_kses_post($post_navigation[$nav_type]['arrow']);
							?>
                        </a>
                    </div>

				<?php }

			}

			?>
        </div>
    </div>
<?php } ?>
