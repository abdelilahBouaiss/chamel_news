<?php
/**
 * The Template for displaying content product, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

?>
<div <?php post_class( 'col-md-4  col-sm-6'  ); ?>>

	
	<div class="portfolio-wrapper">                                                      
		<div class="port-over"> 
			<div class="product-shop-image">
				<?php 
				do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</div>
			<div class="over-info">                                                                    
				<div class="rating">      
					<?php woocommerce_template_loop_rating(); ?>
				</div>
				<!--======= POP UP IMAGE =========-->
				<?php woocommerce_template_loop_add_to_cart(); ?>
				<div class="gallery-pop"> <a href="<?php echo esc_url($image_link); ?>" data-source="<?php echo esc_attr($image_link); ?>" title="Tittle Goes Here"><i class="fa fa-search"></i></a> </div>
				<!--======= HEART =========--> 
				<?php echo driveme_wishlist_button(); ?>
			</div>
		</div>                                                        
		<div class="product-content">
		<h3><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
			<p class="font-3">Price: <span class="thm-clr"> <?php woocommerce_template_loop_price(); ?>	 </span> </p>    
		</div>
	</div>




</div>
