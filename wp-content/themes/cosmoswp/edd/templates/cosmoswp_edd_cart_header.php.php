<?php
$is_enable    = cosmoswp_get_theme_options('cwp-enable-edd-cart');
$icon   = cosmoswp_get_correct_fa_font(cosmoswp_get_theme_options('cwp-edd-cart-icon'));
$align   = cosmoswp_get_theme_options('cwp-edd-cart-icon-align');

if ( $is_enable ) : ?>
    <div class="cwp-edd-cart-section">
        <div class="cwp-edd-cart-wrapper">
            <span class="cwp-edd-cart-icon-wrapper <?php echo esc_attr($align);?>">
                <a class="cwp-edd-icon cart-icon" href="<?php echo edd_get_checkout_uri(); ?>">
                    <i class="cwp-edd-icon-i <?php echo esc_attr($icon);?> " aria-hidden="true"></i>
                    <span class="cwp-edd-cart-value edd-cart-quantity"> <?php echo edd_get_cart_quantity(); ?></span>
                </a>
            </span>
            <div class="cwp-edd-cart-widget-wrapper">
                <?php edd_shopping_cart( true );; ?>
            </div>
        </div>
    </div> <!-- .cart-section -->
<?php endif;