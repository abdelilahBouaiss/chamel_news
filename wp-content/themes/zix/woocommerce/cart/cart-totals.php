<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<h2 class="order_title"><?php esc_html_e( 'Cart Summary', 'zix' ); ?></h2>
<div class="payment_list">
    <?php do_action( 'woocommerce_before_cart_totals' ); ?>
    <div class="payment_list_item">
        <div class="count_part">
            <h5><?php esc_html_e( 'SubTotal', 'zix' ); ?> <span><?php wc_cart_totals_subtotal_html(); ?></span></h5>
            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                <h5 class="coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>"><?php wc_cart_totals_coupon_label( $coupon ); ?><span class="green"><?php wc_cart_totals_coupon_html( $coupon ); ?></span></h5>
            <?php endforeach; ?>

            <?php
            if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) {

                do_action( 'woocommerce_cart_totals_before_shipping' );
                wc_cart_totals_shipping_html();
                do_action( 'woocommerce_cart_totals_after_shipping' );
            }
            elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' )  ) { ?>

                <h5>
                    <?php esc_html_e( 'Shipping Cost ', 'zix' ); ?>
                    <span class="green"><?php woocommerce_shipping_calculator(); ?></span>
                </h5>
                <?php
            }

            foreach ( WC()->cart->get_fees() as $fee ) { ?>
                <h5>
                    <?php esc_html_e( 'Shipping ', 'zix' ) ?>
                    <span class="red"><?php woocommerce_shipping_calculator(); ?></span>
                </h5>
                <?php
            }

            // Tax ===================
            if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
                $taxable_address = WC()->customer->get_taxable_address();
                $estimated_text = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()
                    ? sprintf(' <small>' . __('(estimated for %s)', 'zix') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]])
                    : '';

                if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                    foreach (WC()->cart->get_tax_totals() as $code => $tax) { ?>
                        <h5>
                            <?php echo esc_html($tax->label) . $estimated_text; ?>
                            <span class="green"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                        </h5>
                        <?php
                    }
                }
                else { ?>
                    <h5>
                        <?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?>
                        <span class="green"><?php wc_cart_totals_taxes_total_html(); ?></span>
                    </h5>
                    <?php
                }
            } ?>

        </div>
    </div>
    <div class="payment_list_item">
        <div class="total_count">
            <h4><?php esc_html_e( 'Total', 'zix' ); ?> <span><?php wc_cart_totals_order_total_html(); ?></span></h4>
        </div>
    </div>
    <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
    <div class="place-order payment_list_item">
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="get_btn cart_btn"><?php esc_html_e( 'Continue Shopping', 'zix' );?></a>

        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
        <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
    </div>

</div>

