<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */

		woocommerce_breadcrumb();
		woocommerce_output_content_wrapper();
		//do_action( 'woocommerce_before_main_content' );

		?>
		<section class="product-category container">
			<div class="row">

				<?php 
				$sidebar = get_post_meta( get_the_ID(), '_product_single_options', true );
				if(!empty($sidebar) ) {
					if($sidebar['sidebar_settings'] == 'value-3') {
						?>
						<aside class="col-md-3 col-sm-4">
							<?php
								/**
								 * woocommerce_sidebar hook
								 *
								 * @hooked woocommerce_get_sidebar - 10
								 */
								dynamic_sidebar('woo_sidebar' );
								?>
							</aside>
							<?php 
						}
					}
					?>
					<aside <?php 
					if(!empty($sidebar) ) {
						if($sidebar['sidebar_settings'] == 'value-2') {
							echo '';
						}else{
							echo 'class="col-md-9 col-sm-8"';
						}
					} else {
						echo 'class="col-md-12 col-sm-8"';
					} ?>>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>

				</aside>

				<?php
				if(!empty($sidebar) ) {
					if($sidebar['sidebar_settings'] == 'value-1') {
						?>
						<aside class="col-md-3 col-sm-4">
							<?php
								/**
								 * woocommerce_sidebar hook
								 *
								 * @hooked woocommerce_get_sidebar - 10
								 */
								dynamic_sidebar('woo_sidebar' );
								?>
							</aside>
							<?php 
						}
					} 
						?>


						<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
				?>
			</div>
		</section>
		<?php get_footer( 'shop' ); ?>
