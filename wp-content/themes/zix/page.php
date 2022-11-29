<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

get_header();
$page_comment = 1;
if( function_exists( 'get_field' ) ) {
    $page_comment     = get_field('page_comment');

}


$wrap_class = 'page_wrapper';

if(class_exists( 'WooCommerce')) {
    if(is_cart()) {
        $wrap_class = 'shopping_cart_area';
    }
    elseif(is_checkout()) {
        $wrap_class = 'billing_details_area';
    }
    else {
        $wrap_class = 'page_wrapper';
    }
    if( function_exists( 'is_wishlist' ) ) {
        if( function_exists( 'is_wishlist' ) ) {
            if ( is_wishlist() ) {
                $wrap_class = 'shopping_cart_area bg_color';
            }
        }
    }
}
else {
    $wrap_class = 'blog_area';
}

?>

    <section class="<?php echo esc_attr( $wrap_class ) ?> sec_pad">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							wp_link_pages(array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'zix' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'zix' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							));

							// If comments are open or we have at least one comment, load up the comment template.
							if($page_comment == 1) {
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							}


						endwhile;
					?>
				</div>
				
            </div>
        </div>
    </section>

<?php
get_footer();
