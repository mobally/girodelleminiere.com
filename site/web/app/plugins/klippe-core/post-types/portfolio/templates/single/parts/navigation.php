<?php if(klippe_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $nav_same_category = klippe_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>
    <div class="mkdf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="mkdf-ps-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link','<span class="mkdf-ps-nav-mark ion-ios-arrow-thin-left"></span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="mkdf-ps-nav-mark ion-ios-arrow-thin-left"></span>');
                } ?>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="mkdf-ps-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', '<span class="mkdf-ps-nav-mark ion-ios-arrow-thin-right"></span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="mkdf-ps-nav-mark ion-ios-arrow-thin-right"></span>');
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>