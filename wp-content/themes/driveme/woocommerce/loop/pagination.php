<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;


$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>

<div class="products-number-selector">
	
			<div class="pagination-wrapper">
				
					<?php
					echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
						'format'       => '',
						'add_args'     => '',
						'current'      => max( 1, $current ),
						'total'        => $total,
						'prev_text'    => '<i class="fa fa-angle-left"></i>',
						'next_text'    => '<i class="fa fa-angle-right"></i>',
						'type'         => 'list',
						'end_size'     => 3,
						'mid_size'     => 3
						) ) );
						?>
						

				</div>
			
	</div>