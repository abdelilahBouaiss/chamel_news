<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	
	<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="product-new">
		
			<i>' . esc_html__( 'Sale!', 'driveme' ) . '</i>
		
	</div>', $post, $product ); ?>

<?php endif; ?>
