<div class="mkdf-el-item <?php echo esc_attr($class);?>">
    <div class="mkdf-el-item-inner">
        <div class="mkdf-el-item-inner-holder">
            <div class="mkdf-el-item-image">
                <a href="<?php echo get_permalink();?>">
                    <?php
                    echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                    ?>
                </a>
            </div>
            <?php if (is_array($date) && count($date)) { ?>
                <div class="mkdf-el-item-date">
                    <span class="mkdf-el-item-day"><?php echo esc_html($date['day']); ?></span>
                    <div class="mkdf-el-item-my">
                        <span class="mkdf-el-item-month"><?php echo esc_html($date['month']); ?></span>
                    </div>
                </div>
            <?php } ?>
            <div class="mkdf-el-item-content" <?php echo klippe_mikado_get_inline_style($events_standard_style);?>>
                <div class="mkdf-el-item-location-title-holder">
                    <h4 class="mkdf-el-item-title">
                        <a href="<?php echo get_permalink();?>">
                            <?php echo esc_attr(get_the_title()); ?>
                        </a>
                    </h4>
                    <?php if ($location != ''): ?>
                        <div class="mkdf-el-item-location">
                            <span><?php echo esc_html($location); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($duration != '') : ?>
                        <div class="mkdf-el-item-time">
				            <span>
				            	<?php
                                echo esc_html($duration);
                                ?>
				            </span>
                        </div>
                    <?php endif; ?>
                    <div class="mkdf-el-read-more-link">
                        <a href="<?php echo get_permalink();?>"><?php echo esc_html__( 'Read More', 'klippe-core' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>