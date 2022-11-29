<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

?>
<section id="product-tabination-1">
	<div class="related-aside">
		<div class="title-wrap section-title padding-bottom60 padding-top80">
			<h2 class="">
				<?php echo esc_html_e('Related Product', 'driveme' ); ?>
			</h2>  
			
		</div>   

		<div class="product-tabination">
			<div class="tabination">
				<div class="product-tabs" role="tabpanel">
					<!-- Nav tabs -->
					<ul role="tablist" class="nav nav-tabs navtab-horizontal">
						<li role="presentation" class="active">
							<a class="" data-toggle="tab" role="tab"  href="#related-product" aria-expanded="true"><?php echo esc_html_e( 'Related Products', 'driveme' );?></a>
						</li>
						<li class="" role="presentation">
							<a class="" data-toggle="tab" role="tab"  href="#recently-viewed" aria-expanded="false"><?php echo esc_html_e('Recently Viewed', 'driveme' ); ?></a>
						</li>                                       
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">                                       
						<!-- ====================== Related Products ======================== -->
						<div id="related-product" class="tab-pane fade active in" role="tabpanel">
							<div class="col-md-12 product-wrap default-box-shadow">
								<div class="poroduct-pagination">
									<span class="product-slide next"> <img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-left.png" alt="Owl Image"> </span>
									<span class="product-slide prev"> <img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-right.png" alt="Owl Image"> </span>
								</div>
								<div class="product-slider related-product related-product owl-carousel owl-theme">                                              
									<?php	
									$args = apply_filters( 'woocommerce_related_products_args', array(
										'post_type'            => 'product',
										'ignore_sticky_posts'  => 1,
										'no_found_rows'        => 1,
										'posts_per_page'       => $posts_per_page,
										'orderby'              => $orderby,
										'post__in'             => $related,
										'post__not_in'         => array( $product->id )
										) );

									$products = new WP_Query( $args );



									while ( $products->have_posts() ) : $products->the_post(); ?>

									<div class="tready-clothing">

											<?php wc_get_template_part( 'content', 'product' ); ?>
									</div>
										<?php endwhile; // end of the loop.
										wp_reset_query();
										?>			

									</div>
								</div>
							</div>
							<!-- ====================== Recently Viewed ======================== -->
							<div id="recently-viewed" class="tab-pane fade" role="tabpanel">
								<div class="col-md-12 product-wrap default-box-shadow">
									<div class="title-wrap">
										
										<div class="poroduct-pagination">
											<span class="product-slide next"> <img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-left.png" alt="Owl Image"> </span>
											<span class="product-slide prev"> <img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-right.png" alt="Owl Image"> </span>
										</div>
									</div>  
									<div class="product-slider related-product owl-carousel owl-theme">   

										<?php

										$args =  array(
											'post_type'            => 'product',
											'ignore_sticky_posts'  => 1,
											'no_found_rows'        => 1,
											'posts_per_page'       => $posts_per_page,
											'orderby'              => $orderby,
											'post__in'             => $related,
											'post__not_in'         => array( $product->id )
											);

										$products = new WP_Query( $args );



										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="tready-clothing">
												<?php wc_get_template_part( 'content', 'product' ); ?>
										</div>
										<?php // end of the loop.
										endwhile; 
										wp_reset_query();
										?>			

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>            
	</section>
	<!-- / Related Products Ends -->
	<?php

	wp_reset_postdata(); ?>
