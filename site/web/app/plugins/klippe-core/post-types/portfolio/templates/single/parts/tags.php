<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) : ?>
    <div class="mkdf-ps-info-item mkdf-ps-tags">
        <span class="mkdf-ps-info-title"><?php esc_html_e('Tags:', 'klippe-core'); ?></span>
        <p>
            <?php foreach($tags as $tag) { ?>
                <a itemprop="url" class="mkdf-ps-info-tag" href="<?php echo esc_url(get_term_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
            <?php } ?>
        </p>
    </div>
<?php endif; ?>