<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();


    $reviews = $review_count > 1 ? esc_html__( ' reviews', 'zix' ) : esc_html__( ' review', 'zix' );


if ( $rating_count > 0 ) : ?>

    <?php
    if ( is_singular( 'product') ) { ?>
        <div class="review">
            <?php echo wc_get_rating_html($average, $rating_count); ?>
            <a class="total_review" href="#tab-reviews">(<?php echo esc_html( $review_count ) . $reviews; ?>)</a>
        </div>
        <?php
    } elseif ( is_shop() || is_tax( 'product_cat') ) {
        ?>
        <div class="ratting">
            <?php echo wc_get_rating_html($average, $rating_count); ?>
        </div>
        <?php
    }
 ?>


<?php endif; ?>
