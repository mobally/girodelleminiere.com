<?php

class KlippeMikadoWoocommerceDropdownCart extends KlippeMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_woocommerce_dropdown_cart',
            esc_html__('Mikado Woocommerce Dropdown Cart', 'klippe'),
            array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'klippe'),)
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type'        => 'textfield',
                'name'        => 'woocommerce_dropdown_cart_margin',
                'title'       => esc_html__('Icon Margin', 'klippe'),
                'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'klippe')
            )
        );
    }

    public function widget($args, $instance) {
        extract($args);

        global $woocommerce;

        $icon_styles = array();

        if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
            $icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
        }

        $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

        $dropdown_cart_icon_class = klippe_mikado_get_dropdown_cart_icon_class();
        ?>
        <div class="mkdf-shopping-cart-holder" <?php klippe_mikado_inline_style($icon_styles) ?>>
            <div class="mkdf-shopping-cart-inner">
                <a itemprop="url" <?php klippe_mikado_class_attribute( $dropdown_cart_icon_class ); ?> href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    <span class="mkdf-cart-icon"><?php echo klippe_mikado_get_dropdown_cart_icon_html(); ?>
                        <span class="mkdf-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'klippe'), WC()->cart->cart_contents_count); ?></span>
                    </span>
                </a>
                <div class="mkdf-shopping-cart-dropdown">
                    <ul>
                        <?php if (!$cart_is_empty) : ?>
                            <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                                $_product = $cart_item['data'];
                                // Only display if allowed
                                if (!$_product->exists() || $cart_item['quantity'] == 0) {
                                    continue;
                                }
                                // Get price
                                $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                                ?>
                                <li>
                                    <div class="mkdf-item-image-holder">
                                        <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                            <?php echo wp_kses($_product->get_image(), array(
                                                'img' => array(
                                                    'src'    => true,
                                                    'width'  => true,
                                                    'height' => true,
                                                    'class'  => true,
                                                    'alt'    => true,
                                                    'title'  => true,
                                                    'id'     => true
                                                )
                                            )); ?>
                                        </a>
                                    </div>
                                    <div class="mkdf-item-info-holder">
                                        <h5 itemprop="name" class="mkdf-product-title">
	                                        <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('klippe_mikado_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                        </h5>
                                        <?php if(apply_filters('klippe_mikado_woo_cart_enable_quantity', true)) { ?>
                                            <span class="mkdf-quantity"><?php echo esc_html($cart_item['quantity']); ?> x</span>
                                        <?php } ?>
                                        <?php echo apply_filters('klippe_mikado_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                        <?php echo apply_filters('klippe_mikado_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="fa fa-times"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'klippe')), $cart_item_key); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="mkdf-cart-bottom">
                                <div class="mkdf-subtotal-holder clearfix">
                                    <span class="mkdf-total"><?php esc_html_e('Total:', 'klippe'); ?></span>
                                    <span class="mkdf-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                            'span' => array(
                                                'class' => true,
                                                'id'    => true
                                            )
                                        )); ?>
									</span>
                                </div>
                                <div class="mkdf-btn-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>" class="mkdf-my-cart"
                                       data-title="<?php esc_html_e('SHOPPING BAG', 'klippe'); ?>">
                                        <span><?php esc_html_e('SHOPPING BAG', 'klippe'); ?></span>
                                    </a>
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="mkdf-checkout"
                                       data-title="<?php esc_html_e('CHECKOUT', 'klippe'); ?>">
                                        <span><?php esc_html_e('CHECKOUT', 'klippe'); ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="mkdf-empty-cart"><?php esc_html_e('No products in the cart.', 'klippe'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}

add_filter('woocommerce_add_to_cart_fragments', 'klippe_mikado_woocommerce_header_add_to_cart_fragment');

function klippe_mikado_woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

    $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

    $dropdown_cart_icon_class = klippe_mikado_get_dropdown_cart_icon_class();

    ?>
    <div class="mkdf-shopping-cart-inner">
        <a itemprop="url" <?php klippe_mikado_class_attribute( $dropdown_cart_icon_class ); ?> href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <span class="mkdf-cart-icon"><?php echo klippe_mikado_get_dropdown_cart_icon_html(); ?>
                <span class="mkdf-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'klippe'), WC()->cart->cart_contents_count); ?></span>
            </span>
        </a>
        <div class="mkdf-shopping-cart-dropdown">
            <ul>
                <?php if (!$cart_is_empty) : ?>
                    <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product = $cart_item['data'];
                        // Only display if allowed
                        if (!$_product->exists() || $cart_item['quantity'] == 0) {
                            continue;
                        }
                        // Get price
                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                        ?>
                        <li>
                            <div class="mkdf-item-image-holder">
                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                    <?php echo wp_kses($_product->get_image(), array(
                                        'img' => array(
                                            'src'    => true,
                                            'width'  => true,
                                            'height' => true,
                                            'class'  => true,
                                            'alt'    => true,
                                            'title'  => true,
                                            'id'     => true
                                        )
                                    )); ?>
                                </a>
                            </div>
                            <div class="mkdf-item-info-holder">
                                <h5 itemprop="name" class="mkdf-product-title">
	                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('klippe_mikado_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                </h5>
		                        <?php if(apply_filters('klippe_mikado_woo_cart_enable_quantity', true)) { ?>
                                    <span class="mkdf-quantity"><?php echo esc_html($cart_item['quantity']); ?> x</span>
                                <?php } ?>
                                <?php echo apply_filters('klippe_mikado_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                <?php echo apply_filters('klippe_mikado_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="fa fa-times"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'klippe')), $cart_item_key); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="mkdf-cart-bottom">
                        <div class="mkdf-subtotal-holder clearfix">
                            <span class="mkdf-total"><?php esc_html_e('Total:', 'klippe'); ?></span>
                            <span class="mkdf-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                    'span' => array(
                                        'class' => true,
                                        'id'    => true
                                    )
                                )); ?>
							</span>
                        </div>
                        <div class="mkdf-btn-holder clearfix">
                            <a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>" class="mkdf-my-cart"
                               data-title="<?php esc_html_e('SHOPPING BAG', 'klippe'); ?>">
                                <span><?php esc_html_e('SHOPPING BAG', 'klippe'); ?></span>
                            </a>
                            <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="mkdf-checkout"
                               data-title="<?php esc_html_e('CHECKOUT', 'klippe'); ?>">
                                <span><?php esc_html_e('CHECKOUT', 'klippe'); ?></span>
                            </a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="mkdf-empty-cart"><?php esc_html_e('No products in the cart.', 'klippe'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php
    $fragments['div.mkdf-shopping-cart-inner'] = ob_get_clean();

    return $fragments;
}

?>