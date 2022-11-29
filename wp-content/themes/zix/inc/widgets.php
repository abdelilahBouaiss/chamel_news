<?php
/**
 * PixX widget functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zix
 * @author Droitthemes
 * @link https://themeforest.net/user/droitthemes
 * @since 1.0.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function zix_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zix' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zix' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

    if( class_exists( 'WooCommerce') ) {
        register_sidebar(array(
            'name' => esc_html__( 'Shop sidebar', 'zix' ),
            'description' => esc_html__( 'Place widgets here for WooCommerce shop page.', 'zix' ),
            'id' => 'shop_sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        ));
    }

    $opt = get_option( 'zix_opt' );
    $footer_column = !empty( $opt['footer_column'] ) ? $opt['footer_column'] : '3';
    register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'zix' ),
		'id'            => 'footer_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'zix' ),
		'before_widget' => '<div id="%1$s" class="col-lg-'.$footer_column.' col-sm-6 footer_widgets %2$s"><div class="f_creative_widget_link">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="footer_title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'zix_widgets_init' );