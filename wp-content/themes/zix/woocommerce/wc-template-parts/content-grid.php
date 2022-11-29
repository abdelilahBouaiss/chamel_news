<?php
global $wc_loop_i;
global $product;
$opt = get_option( 'zix_opt' );
$column = wc_get_loop_prop( 'columns' );
switch ($column) {
    case '3':
        $col = '4';
        $image_size = 'zix_270x320';
        break;
    case '4':
        $col = '3';
        $image_size = 'zix_300x320';
        break;
    case '2':
        $col = '6';
        $image_size = 'full';
        break;
    default:
        $col = '4';
        $image_size = 'zix_270x320';
        break;
}
?>
<div <?php wc_product_class( 'col-md-'.$col.' col-sm-6' ); ?>>
    <div class="shop_products_item">
        <div class="products_img">
            <?php
            $gallery_ids = $product->get_gallery_image_ids();
            if( is_array( $gallery_ids ) && count($gallery_ids) > 1 ){
                $gallery_ids = $product->get_gallery_image_ids();
                $count_id = count($gallery_ids);

                echo '<div class="tab_img">';
                $i = 1;
                foreach ( $gallery_ids as $gallery_id ){
                    $incre = $i++;
                    $g_image = wp_get_attachment_image( $gallery_id, 'zix_270x320' );
                    $active = $incre == 1 ? 'active' : '';
                    echo '<div class="item '.esc_attr( $active ).'" id="tab-'. $product->get_id() .'_'.$incre.'">'. wp_kses_post( $g_image ) .'</div>';


                }
                echo '</div><ul class="list-unstyled img_tabs square_tab">';

                $ti = 1;
                for( $x = 1; $x <= $count_id; $x++ ){
                    switch ( $x ){
                        case 1:
                            $color_bar = 'yellow active';
                            break;
                        case 2:
                            $color_bar = 'l_blue';
                            break;
                        case 3:
                            $color_bar = 'green';
                            break;
                        case 4:
                            $color_bar = 'pink';
                            break;
                        default:
                            $color_bar = 'l_blue';
                    }

                    echo '<li class="tab_link  '. esc_attr( $color_bar ).'" data-tabs="tab-'. $product->get_id() .'_'.esc_attr( $ti++ ).'"></li>';
                }
                echo '</ul>';
            }
            else {
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( $image_size, array( 'class' => 'img-fluid'));
                }
            } ?>
            <div class="hover_btn">
                <?php
                if( function_exists( 'tinv_get_option' ) ){
                    echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                }
                ?>
                <a class="cart_button" href="?add-to-cart=<?php echo get_the_ID() ?>" title="<?php echo esc_attr($product->single_add_to_cart_text()) ?>"><i class="fa fa-shopping-basket"></i></a>
            </div>
        </div>
        <div class="shop_text">
            <?php woocommerce_template_single_rating() ?>
            <a href="<?php the_permalink() ?>">
                <h5> <?php the_title() ?> </h5>
            </a>
            <?php woocommerce_template_loop_price(); ?>
        </div>
    </div>
</div>