<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo wpautop( $wrap_before );

	?>
	<div class="sub-banner">
                <div class="container">
                <?php 
				foreach ( $breadcrumb as $key => $crumb ) 
				?>
                    <h2><?php echo esc_html( $crumb[0] ); ?></h2>
                    <ul class="links">
                    <?php 
                    foreach ( $breadcrumb as $key => $crumb ) {
					echo wpautop( $before );

					if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
						echo '<li><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a> / </li>';
					} else {
						echo '<li> <a href="#">'. esc_html( $crumb[0] ).'</a></li>';
					}

					echo wpautop( $after );
				}
 ?>
                    </ul>
                </div>
            </div>


	
	<?php


	echo wpautop( $wrap_after );

}
?>
