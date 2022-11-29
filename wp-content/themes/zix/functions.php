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

define( 'ZIX_DIR', get_template_directory_uri() );
define( 'ZIX_DIR_ASSETS', get_template_directory_uri() . '/assets' );
define( 'ZIX_DIR_IMG', get_template_directory_uri() . '/assets/images' );

if ( ! function_exists( 'zix_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function zix_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on PixX, use a find and replace
         * to change 'zix' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'zix', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );


        add_theme_support( 'woocommerce' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'zix-blog-default-post-thumbnail', 970, 400, true );
        add_image_size( 'zix-blog-post-details', 840, 470, true );
        add_image_size( 'zix-blog-cols-thumb', 570, 352, true );
        add_image_size( 'zix-blog-cols-thumb-three', 370, 240, true );
        add_image_size( 'zix-blog-shortcode', 410, 352, true );
        add_image_size( 'zix-blog-shortcode-big', 700, 352, true );
        add_image_size( 'zix-testimonial_quote', 50, 40, true );
        add_image_size( 'zix-team_thumb', 248, 278, true );
        add_image_size( 'zix-team_single', 370, 400, true );
        add_image_size( 'zix_300x350', 300, 350, true );
        add_image_size( 'zix_archive_355x317', 355, 317, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'zix' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'zix_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        add_theme_support( 'editor-styles' );
        add_editor_style( 'style-editor.css' );

    }
endif;
add_action( 'after_setup_theme', 'zix_setup' );

function zix_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'zix_content_width', 640 );
}
add_action( 'after_setup_theme', 'zix_content_width', 0 );



/*===== Implement the widgets. ============*/
require get_template_directory() . '/inc/widgets.php';

/*===== Implement the theme scripts. =========*/
require get_template_directory() . '/inc/enqueue.php';

/*===== Implement the Custom Header feature. =========*/
require get_template_directory() . '/inc/custom-header.php';

/*===== Custom template tags for this theme. =========*/
require get_template_directory() . '/inc/template-tags.php';

/*===== Functions which enhance the theme by hooking into WordPress. =========*/
require get_template_directory() . '/inc/template-functions.php';

/*===== Navwalker =========*/
require get_template_directory() . '/inc/Zix_Navwalker.php';

/*====== Customizer additions. =========*/
require get_template_directory() . '/inc/customizer.php';

/*====== Redux options config file =========*/
require get_template_directory() . '/options/options-config.php';

require get_template_directory() . '/inc/functions.php';

/*===== Redux options config file =========*/
require get_template_directory() . '/inc/plugin_activation.php';


/*===== Style PHP file ===========*/
require get_template_directory() . '/inc/helpers/dynamic-style.php';
require get_template_directory() . '/inc/helpers/comment-template.php';
require get_template_directory() . '/inc/helpers/pagination.php';



// Helpers file init
require get_template_directory() . '/inc/helpers/breadcrumbs.php';// Breadcrumbs init
require get_template_directory() . '/inc/demo-import.php';// Helpers file init

require get_template_directory() . '/inc/woo_config.php';// Helpers file init

