<?php
global $wc_loop_i;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
$opt = get_option( 'zix_opt' );
global $product;

?>
<div <?php wc_product_class( 'col-lg-12 media shop_list_item col-lg-12' ) ?> >
    <?php the_post_thumbnail( 'zix_300x350' ) ?>
    <div class="media-body">
        <div class="shop_text">
            <?php woocommerce_template_single_rating() ?>
            <a href="<?php the_permalink(); ?>">
                <h5><?php the_title(); ?></h5>
            </a>
            <?php woocommerce_template_loop_price(); ?>
            <?php echo wpautop( get_the_excerpt() ); ?>
            <div class="hover_btn">
                <?php
                if( function_exists( 'tinv_get_option' ) ){
                    echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                } ?>
                <a class="cart_button" href="?add-to-cart=<?php echo get_the_ID() ?>" title="<?php echo esc_attr($product->single_add_to_cart_text()) ?>"><i class="fa fa-shopping-basket"></i></a>
            </div>
        </div>
    </div>
</div>