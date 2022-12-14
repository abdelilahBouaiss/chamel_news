<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}
	?>

	<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section id="product-fullwidth" class="padding-top80"> 
			<div class="single-product-wrap">      
				<div class="list-category-details">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<?php
								/**
								 * woocommerce_before_single_product_summary hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
								?>
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="product-content">


								<?php
								/**
								 * woocommerce_single_product_summary hook
								 *
								 * @hooked woocommerce_template_single_title - 5
								 * @hooked woocommerce_template_single_rating - 10
								 * @hooked woocommerce_template_single_price - 10
								 * @hooked woocommerce_template_single_excerpt - 20
								 * @hooked woocommerce_template_single_add_to_cart - 30
								 * @hooked woocommerce_template_single_meta - 40
								 * @hooked woocommerce_template_single_sharing - 50
								 */
								woocommerce_template_single_title();
								woocommerce_template_single_rating();
								woocommerce_template_single_price();
								woocommerce_template_single_excerpt();

												?>
								
								

								<?php

								
								woocommerce_template_single_add_to_cart();
								//do_action( 'woocommerce_single_product_summary' );
								?>
							

							</div><!-- .product-content -->
						</div>
					</div>
				</div>
			</div>
		</section>
<div class="clearfix"></div>

		<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		
			woocommerce_output_product_data_tabs();
		
		?>
		

	</div><!-- #product-<?php the_ID(); ?> -->

	<?php do_action( 'woocommerce_after_single_product' ); ?>
