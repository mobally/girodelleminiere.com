<div class="mkdf-interactive-boxes-holder">
    <div class="mkdf-ib-text-holder">
        <?php if(!empty($title)) { ?>
        <<?php echo esc_attr($title_tag); ?> class="mkdf-ib-title" <?php echo klippe_mikado_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
        <?php if(!empty($text)) { ?>
        <p class="mkdf-ib-text" <?php echo klippe_mikado_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
        <?php if(!empty($link) && !empty($link_text)) { ?>
         <a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" class="mkdf-ib-link-text" <?php echo klippe_mikado_get_inline_style($link_styles); ?>>
             <span class="mkdf-ib-link-label"><?php echo esc_html($link_text); ?></span>
         </a>
        <?php } ?>
    </div>
    <div class="mkdf-ib-image">
        <?php if(!empty($link)) { ?>
            <a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
        <?php } ?>
        <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
        <?php if(!empty($link)) { ?>
            </a>
        <?php } ?>
    </div>
</div>