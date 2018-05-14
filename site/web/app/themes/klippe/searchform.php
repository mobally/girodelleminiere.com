<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'klippe' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search...', 'klippe' ); ?>" value="" name="s" title="<?php esc_html_e( 'Search for:', 'klippe' ); ?>"/>
		<button type="submit" class="mkdf-search-submit"><?php echo klippe_mikado_icon_collections()->renderIcon( 'fa-search', 'font_awesome' ); ?></button>
	</div>
</form>