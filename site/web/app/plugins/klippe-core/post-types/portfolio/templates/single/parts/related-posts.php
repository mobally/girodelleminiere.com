<?php
// this option doesn't exist
$show_related_posts = klippe_mikado_options()->getOptionValue('portfolio_single_related_posts') == 'yes' ? true : false;
$back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
$post_id = get_the_ID();
$related_posts = klippe_core_get_portfolio_single_related_posts($post_id);
?>
<?php if($show_related_posts) { ?>
    <div class="mkdf-ps-related-posts-holder">
        <h4><?php esc_html_e( 'Related Projects', 'klippe-core' ); ?></h4>
        <div class="mkdf-related-nav-holder">
            <span class="mkdf-related-prev"><i class="mkdf-prev-icon fa fa-chevron-left" aria-hidden="true"></i></span>
            <?php if($back_to_link !== '') : ?>
                <div class="mkdf-ps-back-btn">
                    <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                    </a>
                </div>
            <?php endif; ?>
            <span class="mkdf-related-next"><i class="mkdf-next-icon fa fa-chevron-right" aria-hidden="true"></i></span>
        </div>
        <div class="mkdf-ps-related-posts-holder-inner">
            <div class="mkdf-ps-related-posts mkdf-owl-slider mkdf-ps-related-posts-slider" data-number-of-items="3" data-enable-navigation="no">
                <?php
                    if ( $related_posts && $related_posts->have_posts() ) :
                        while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                            <div class="mkdf-ps-related-post">
                                <?php if(has_post_thumbnail()) { ?>
                                    <div class="mkdf-ps-related-image">
                                        <a itemprop="url" href="<?php the_permalink(); ?>" target="_self">
                                            <?php the_post_thumbnail('klippe_mikado_landscape'); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="mkdf-ps-related-text">
                                    <div class="mkdf-ps-related-text-holder">
                                        <div class="mkdf-ps-related-text-holder-inner">
                                            <h4 itemprop="name" class="mkdf-ps-related-title entry-title">
                                                <a itemprop="url" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <a itemprop="url" href="<?php the_permalink(); ?>" target="_self"></a>
                            </div>
                        <?php
                        endwhile;
                    endif;

                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php } ?>
