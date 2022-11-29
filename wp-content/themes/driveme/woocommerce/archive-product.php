<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
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
		// do_action( 'woocommerce_before_main_content' );
		woocommerce_breadcrumb();
		woocommerce_output_content_wrapper();

		
		
		?>


		<section class="container">
			
			

			<aside class="col-md-9 col-sm-8 shop-wrap">
				<div class="shop-banner">
					<?php global $theme_option;  ?>
					<img class="" src="<?php echo esc_url( $theme_option['shop_banner']['url'] ); ?>" alt="shop-banner">
					<div class="banner-content">
						<div class="banner-mask">
							<div class="reltv-div">
								<h2 class="title"><?php echo esc_html( $theme_option['shop_banner_title'] ); ?></h2>
								<p class="fsz-16"><?php echo esc_html( $theme_option['shop_banner_subtitle'] ); ?></p>
								<i><?php echo esc_html( $theme_option['shop_banner_des'] ); ?></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row spcbt-30">
					<div class="col-lg-4 col-sm-6 sorter">
						<ul class="nav-tabs tabination view-tabs">

							<li class="active">
								<a href="#grid-view" data-toggle="tab" aria-expanded="true">
									<i class="fa fa-th" aria-hidden="true"></i>
								</a>
							</li>

							<li class="">
								<a href="#list-view" data-toggle="tab" aria-expanded="false">
									<i class="fa fa-th-list"></i>
								</a>
							</li>
						</ul>

						<?php woocommerce_catalog_ordering(); ?>
					</div>

					<div class="col-lg-4 col-sm-6 woocommerce-result-count">
						<?php woocommerce_result_count(); ?>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 view-wrap">

						<?php

						global $wp_query;
						echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
							'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
							'format'       => '',
							'add_args'     => '',
							'current'      => max( 1, get_query_var( 'paged' ) ),
							'total'        => $wp_query->max_num_pages,
							'prev_text'    => '<i class="fa fa-angle-left"></i>',
							'next_text'    => '<i class="fa fa-angle-right"></i>',
							'type'         => 'list',
							'end_size'     => 3,
							'mid_size'     => 3
							) ) );
							?>

						</div>

					</div>
					<?php
					/**
					 * woocommerce_archive_description hook
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
					<?php if ( have_posts() ) : ?>
						


						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							// woocommerce_catalog_ordering();
							//do_action( 'woocommerce_before_shop_loop' );
							?>

							<?php woocommerce_product_loop_start(); ?>
							<ul>
								<?php woocommerce_product_subcategories(); ?>
							</ul>

							<div id="grid-view" class="tab-pane fade active in" role="tabpanel">
								<div class="codenegar-shop-loop-wrapper row text-center hvr2 clearfix">


									<?php woocommerce_product_loop_start(); ?>
									<?php while ( have_posts() ) : the_post(); ?>

										<?php wc_get_template_part( 'content', 'product' ); ?>

											<?php endwhile; // end of the loop. 
											wp_reset_query(); 
											?>
											<?php woocommerce_product_loop_end(); ?>
										</div>
									</div>

									<div id="list-view" class="tab-pane fade" role="tabpanel">

										<div class="codenegar-shop-loop-wrapper row hvr2 clearfix">
											<?php woocommerce_product_loop_start(); ?>
											<div class="cat-list-view">											
												<?php while ( have_posts() ) : the_post(); ?>
													<div class="hvr2 row">
														<div class="portfolio-wrapper">
															<div class="col-md-4 col-sm-6">
																<div class="port-over">
																	<div class="product-shop-image">
																		<?php 
																		do_action( 'woocommerce_before_shop_loop_item_title' );
																		?>
																	</div>
																	<div class="over-info"> 
																		<!--======= POP UP IMAGE =========-->
																		<a href="#"><i class="fa fa-shopping-cart"></i></a> 
																		<div class="gallery-pop"> <a href="images/product/cat.jpg" data-source="images/img-2.jpg" title="Tittle Goes Here"><i class="fa fa-search"></i></a> </div>
																		<!--======= HEART =========--> 
																		<a href="#."><i class="fa fa-heart"></i></a> 
																	</div>
																</div>
															</div>
															<div class="col-md-8 col-sm-6">
																<div class="product-content">
																	<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
																	<div class="rating">                                           <?php woocommerce_template_loop_rating(); ?>
																	</div>
																	<p class="font-3">Price: <span class="thm-clr"> <?php woocommerce_template_loop_price(); ?>	</span> </p>    
																	<p class="font-3"> Available:<span class="red-clr"> 
																		<?php 
																		// Availability
																		$availability      = $product->get_availability();
																		$availability_html = empty( $availability['availability'] ) ? 'Available' :  esc_html( $availability['availability']);
																		?>
																	</span>  </p>
																	<?php woocommerce_template_single_excerpt(); ?>
																	<?php woocommerce_template_loop_add_to_cart(); ?>
																</div>
															</div>
														</div>
													</div>
												<?php endwhile; 
												wp_reset_query(); 
												?> 
											</div>
											<?php woocommerce_product_loop_end(); ?>
										</div>
									</div>
									
									

								<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

									<?php wc_get_template( 'loop/no-products-found.php' ); ?>

								<?php endif; ?>
								<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
							?>	
						</aside>


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
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
					?>


				</section>	

				<?php get_footer( 'shop' ); ?>
