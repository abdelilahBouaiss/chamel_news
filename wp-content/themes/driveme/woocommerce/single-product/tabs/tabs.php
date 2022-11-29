<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$tab_no = $tab_class = '';
$tab_no = count($tabs);

if($tab_no == 2) {
	$tab_class = 'col-md-6';
} else {
	$tab_class = 'col-md-4';
}

if ( ! empty( $tabs ) ) : ?>
<section id="single-product-tabination" class="woocommerce-tabs wc-tabs-wrapper row">   
	<div class=" product-tabs light-bg product-tabination default-box-shadow">
		
		<?php 
		$i = 0;
		foreach ( $tabs as $key => $tab ) : ?>

		<div class="<?php echo esc_attr($tab_class); ?> product-wrap">

			<h4 class="title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></h4>
			<hr class="heading-seperator">

			<div class="scroll-div">
				<div class="nano-content">
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			</div>

		</div>

		<?php 
		$i =1;
		endforeach; ?>
		
		
	</div>
</section>
<?php endif; ?>
