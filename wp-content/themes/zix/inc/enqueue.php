<?php
/**
 * Zix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zix
 * @author Droitthemes
 * @link https://themeforest.net/user/droitthemes
 * @since 1.0.0
 */


/*
 * Register Custom fonts
 */
function zix_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* Body font */
    if ( 'off' !== 'on' ) {
        $fonts = [
            'Poppins:300,400,500,600,700,800',
            'Mulish:400,500,600,700',
            'Montserrat:400,500,600,700,800'
        ];
    }

    $is_ssl = is_ssl() ? 'https' : 'http';

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), "$is_ssl://fonts.googleapis.com/css" );
    }

    return $fonts_url;
}


/**
 * Enqueue scripts and styles.
 */
function zix_scripts() {
    $opt = get_option('zix_opt');

	wp_enqueue_style( 'fontawesome', ZIX_DIR_ASSETS . '/vendors/font-awesome/css/all.min.css', false, '5.9.0', 'all' );
	wp_enqueue_style( 'bootstrap', ZIX_DIR_ASSETS . '/vendors/bootstrap/css/bootstrap.min.css', false, '4.1.3', 'all' );
	wp_enqueue_style( 'flexslider', ZIX_DIR_ASSETS . '/vendors/flex/css/flexslider.css', false, '2.7.1', 'all' );
	wp_enqueue_style( 'slick_theme', ZIX_DIR_ASSETS . '/vendors/slick/slick-theme.css', false, '1.9.0', 'all' );
    wp_enqueue_style( 'slick', ZIX_DIR_ASSETS . '/vendors/slick/slick.css', false, '1.9.0', 'all' );
	wp_enqueue_style( 'owl-carousel', ZIX_DIR_ASSETS . '/vendors/owl-carousel/assets/owl.carousel.min.css', false, '2.3.4', 'all' );
	wp_enqueue_style( 'nice-select', ZIX_DIR_ASSETS . '/vendors/nice-select/nice-select.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'themify-icon', ZIX_DIR_ASSETS . '/vendors/themify-icon/themify-icons.css', false, '1.0.0', 'all' );

    wp_deregister_style( 'elementor-animations' );

	wp_enqueue_style( 'elagent-icon', ZIX_DIR_ASSETS . '/vendors/elagent/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'icomoon', ZIX_DIR_ASSETS . '/vendors/icomoon/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'typing-animate', ZIX_DIR_ASSETS . '/vendors/typing/animate.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'magnifypop', ZIX_DIR_ASSETS . '/vendors/magnify-pop/magnific-popup.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'splitting', ZIX_DIR_ASSETS . '/vendors/spiling/splitting.css', false, '1.0.0', 'all' );
    wp_enqueue_style( 'zix-fonts', zix_fonts_url(), array(), null );
    
	// WooCmmerce Style ============================
    if( class_exists( 'WooCommerce' ) ){
        wp_register_style( 'zix-shop', ZIX_DIR_ASSETS. '/css/zix-shop.css' );
        if (  is_shop() || is_tax( 'product_cat'  ) || is_singular( 'product'  ) || is_tax( 'product_tag'  ) || is_cart() || is_checkout()  ) {
            wp_enqueue_style( 'zix-shop' );
        }
    }
    
	if( !is_rtl() ) {
        wp_enqueue_style('zix-theme', ZIX_DIR_ASSETS . '/css/theme.css', false, '1.0.0', 'all');
        wp_enqueue_style('zix-gutenberg', ZIX_DIR_ASSETS . '/css/zix-gutenberg.css', false, '1.0.0', 'all');
        wp_enqueue_style('zix-responsive', ZIX_DIR_ASSETS . '/css/responsive.css', false, '1.0.0', 'all');
    }
    wp_enqueue_style('zix-wpstyle', ZIX_DIR_ASSETS . '/css/wpstyle.css', false, '1.0.0', 'all');
    wp_enqueue_style( 'zix-style', get_stylesheet_uri() );
	$dynamic_css = '';

    $dynamic_css .= '
	    blockquote:before{
	        background-image: url('.ZIX_DIR_ASSETS.'/images/icon.png'.');
	    }
	';

	wp_add_inline_style( 'zix-theme', $dynamic_css );

    /*JS*/
    wp_enqueue_script( 'bootstrap', ZIX_DIR_ASSETS . '/vendors/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '4.1.3', true );
    wp_enqueue_script( 'jquery-parallax-scroll', ZIX_DIR_ASSETS . '/vendors/sckroller/jquery.parallax-scroll.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'isotope', ZIX_DIR_ASSETS . '/vendors/isotope/isotope-min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'owl-carousel', ZIX_DIR_ASSETS . '/vendors/owl-carousel/owl.carousel.min.js', false, '2.3.4', 'all' );
    wp_enqueue_script( 'jquery-flexslider', ZIX_DIR_ASSETS . '/vendors/flex/js/jquery.flexslider.js', array( 'jquery' ), '2.7.1', true );
    wp_enqueue_script( 'slick-main', ZIX_DIR_ASSETS . '/vendors/slick/slick.min.js', array( 'jquery' ), '1.9.0', true );
    wp_enqueue_script( 'slick', ZIX_DIR_ASSETS . '/vendors/slick/slick.js', array( 'jquery' ), '1.9.0', true );
    wp_enqueue_script( 'jquery-waypoints', ZIX_DIR_ASSETS . '/vendors/counterup/jquery.waypoints.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'jquery-counterup', ZIX_DIR_ASSETS . '/vendors/counterup/jquery.counterup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'apear', ZIX_DIR_ASSETS . '/vendors/counterup/apear.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'jquery-stellar', ZIX_DIR_ASSETS . '/vendors/stellar/jquery.stellar.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'jquery-lettering', ZIX_DIR_ASSETS . '/vendors/typing/jquery.lettering.js', array( 'jquery' ), '0.6.1', true );
    wp_enqueue_script( 'jquery-textillate', ZIX_DIR_ASSETS . '/vendors/typing/jquery.textillate.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'jquery-magnific-popup', ZIX_DIR_ASSETS . '/vendors/magnify-pop/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'wow', ZIX_DIR_ASSETS . '/vendors/wow/wow.min.js', array( 'jquery' ), '2.7.1', true );
    wp_enqueue_script( 'jquery-nice-select', ZIX_DIR_ASSETS . '/vendors/nice-select/jquery.nice-select.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'parallax', ZIX_DIR_ASSETS . '/vendors/stellar/parallax.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'splitting', ZIX_DIR_ASSETS . '/vendors/spiling/splitting.min.js', array( 'jquery' ), '1.0.0', true );
    if( is_rtl() ){
        wp_enqueue_script( 'zix-custom', ZIX_DIR_ASSETS . '/js/theme-rtl.js', array( 'jquery' ), '1.0.0', true );
    }else {
        wp_enqueue_script('zix-custom', ZIX_DIR_ASSETS . '/js/custom.js', array('jquery'), '1.0.0', true);
    }

    $dynamic_js = '';
    if( class_exists( 'WPCF7' ) ){
        $dynamic_js .= "jQuery('form.wpcf7-form').addClass('contact_form comment_form'); \n";
    }

    wp_add_inline_script('zix-custom', $dynamic_js);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'zix_scripts' );


/**
 * Admin dashboard style and scripts
 */
add_action('admin_enqueue_scripts', function() {

    wp_register_style( 'zix-admin-fonts', zix_fonts_url(), array(), null);
    wp_enqueue_style( 'zix-admin-fonts' );
    wp_enqueue_style('zix_admin', ZIX_DIR_ASSETS.'/css/admin_css.css');


    $dynamic_admin_css = '';
    $dynamic_admin_css .= '
        blockquote:before,
        blockquote.wp-block-quote:after{
            background-image: url('.ZIX_DIR_ASSETS.'/images/icon.png'.');
        }
    ';
    wp_add_inline_style('zix_admin', $dynamic_admin_css);
});

