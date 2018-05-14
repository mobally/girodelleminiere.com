<?php if($hover_animation === 'yes'){ ?>
<div class="mkdf-btn-wrapper" <?php klippe_mikado_inline_style($button_styles); ?>>
<?php } ?>
<button type="submit" <?php klippe_mikado_inline_style($button_styles); ?> <?php klippe_mikado_class_attribute($button_classes); ?> <?php echo klippe_mikado_get_inline_attrs($button_data); ?> <?php echo klippe_mikado_get_inline_attrs($button_custom_attrs); ?>>
	<?php if($hover_animation === 'yes'){ ?>
    	<span class="mkdf-btn-hover-line"></span>
    <?php } ?>
    <span class="mkdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo klippe_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>
<?php if($hover_animation === 'yes'){ ?>
</div>
<?php } ?>