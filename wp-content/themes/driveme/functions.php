<?php

if (class_exists('ReduxFramework')) {
    require_once(get_template_directory() . '/ReduxFramework/sample/sample-config.php');
}

//Custom fields:
require_once get_template_directory() . '/framework/bfi_thumb-master/BFI_Thumb.php';

require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/love-count.php';

//Define Text Doimain
$textdomain = 'driveme';
$lang = get_template_directory_uri() . '/languages';
load_theme_textdomain($textdomain, $lang);

//Theme Set up:
function driveme_theme_setup()
{
    /*
    * This theme uses a custom image size for featured images, displayed on
    * "standard" posts and pages.
    */
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    add_theme_support('woocommerce');

    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    //Post formats
    add_theme_support('post-formats', array(
        'image', 'video'
    ));
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => 'Primary Navigation Menu',
        'onepage' => 'One Page Navigation Menu',
    ));

    // This theme uses its own gallery styles.
    add_filter('use_default_gallery_style', '__return_false');
}

add_action('after_setup_theme', 'driveme_theme_setup');
if (!isset($content_width))
    $content_width = 900;

function driveme_theme_scripts_styles()
{
    global $theme_option;
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style('fonts-googles', "$protocol://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400", true);

    if ($theme_option['rtl_settings']) {
        wp_enqueue_style('bootstrap-drive-css', get_template_directory_uri() . '/css/bootstrap.css');
        wp_enqueue_style('bootstrap-drive-rtl-css', get_template_directory_uri() . '/css/bootstrap-rtl.min.css');
        wp_enqueue_style('style', get_stylesheet_uri(), array(), '2015-24-3');
        wp_enqueue_style('style-rtl-css', get_template_directory_uri() . '/css/style-rtl.css');
        //wp_enqueue_style( 'owl-css', get_template_directory_uri().'/css/owl.carousel.css');
    } else {
        wp_enqueue_style('bootstrap-drive-css', get_template_directory_uri() . '/css/bootstrap.css');
        wp_enqueue_style('style', get_stylesheet_uri(), array(), '2015-24-3');
    }

    wp_enqueue_style('main-drive-css', get_template_directory_uri() . '/css/main.css');

    wp_enqueue_style('animate-drive-css', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('responsive-drive-css', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('fonr-awesome-drive-css', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('color-drive-css', get_template_directory_uri() . '/css/color/default.css');
    wp_enqueue_style('color-style-css', get_template_directory_uri() . '/css/style-color.css', '', '1.0.12');

    wp_enqueue_style('color', get_template_directory_uri() . '/framework/color.php');
    //if($theme_option['rtl']==1){wp_enqueue_style( 'rtl', get_template_directory_uri().'/rtl.css');	}

    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
    wp_enqueue_script("jquery");
    //Javascript

    wp_enqueue_script("jquery-1.11.0-drive-js", get_template_directory_uri() . "/js/jquery-1.11.0.min.js", array(), true, false);
    wp_enqueue_script("wow-min-js", get_template_directory_uri() . "/js/wow.min.js", array(), false, true);
    wp_enqueue_script("bootstrap-js", get_template_directory_uri() . "/js/bootstrap.min.js", array(), false, true);
    wp_enqueue_script("stellar-js", get_template_directory_uri() . "/js/jquery.stellar.js", array(), false, true);
    wp_enqueue_script("lightSlider-js", get_template_directory_uri() . "/js/jquery.lightSlider.min.js", array(), false, true);
    wp_enqueue_script("iostope-js", get_template_directory_uri() . "/js/jquery.isotope.min.js", array(), false, true);
    wp_enqueue_script("flexslider-min-js", get_template_directory_uri() . "/js/jquery.flexslider-min.js", array(), false, true);
    wp_enqueue_script("carousel-js", get_template_directory_uri() . "/js/owl.carousel.js", array(), false, true);
    wp_enqueue_script("sticky-js", get_template_directory_uri() . "/js/jquery.sticky.js", array(), false, true);
    if (!is_page_template('page-templates/template-otherpage.php')) {
        wp_enqueue_script("swithcher-js", get_template_directory_uri() . "/js/color-switcher.js", '', '1.1', true);
        wp_enqueue_script("bootstrap-hover-js", get_template_directory_uri() . "/js/bootstrap-hover-dropdown.js", array(), false, true);
    }
    wp_enqueue_script("jquery-ui-1.10.3-js", get_template_directory_uri() . "/js/jquery-ui-1.10.3.custom.js", array(), false, true);
    wp_enqueue_script("magnific-js", get_template_directory_uri() . "/js/jquery.magnific-popup.min.js", array(), false, true);
    if (is_page_template('page-templates/onepage.php')) {
        wp_enqueue_script("drive-me-plugin", get_template_directory_uri() . "/js/drive-me-plugin.js", array(), false, true);
        wp_enqueue_script("main1", get_template_directory_uri() . "/js/main1.js", array(), false, true);
    }
    if (is_singular('courses') || is_page_template('page-templates/template-otherpage.php')) {
        wp_enqueue_script("map-api", "$protocol://maps.google.com/maps/api/js?key=" . $theme_option['google_maps_api_key'], array(), false, true);
        wp_enqueue_script("mapmarker-js", get_template_directory_uri() . "/js/mapmarker.js", array(), false, true);
        //wp_enqueue_script("script-map-js", get_template_directory_uri()."/js/script-map.js",array(),false,true);   
    }


    if ($theme_option['rtl_settings']) {
        wp_enqueue_script("main-js", get_template_directory_uri() . "/js/main-rtl.js", '', '1.1.2', true);
    } else {
        wp_enqueue_script("main-js", get_template_directory_uri() . "/js/main.js", '', '1.1.2', true);
    }

    // if(is_singular('courses')){
    //   wp_enqueue_script("script-map-js", get_template_directory_uri()."/js/script-map.js",array(),false,true);   
    // }
    wp_enqueue_script("validate", get_template_directory_uri() . "/js/jquery.validate.min.js", array(), false, true);
    wp_enqueue_script("magnific-js", get_template_directory_uri() . "/js/verif.js", array(), false, true);
}

add_action('wp_enqueue_scripts', 'driveme_theme_scripts_styles');


/*
    *   load css js on footer
    * ----------------------------------------------------------------------------------------- */

add_action('wp_footer', 'cc_js_load_on_footer', 100);

function cc_js_load_on_footer()
{
?>
    <script>
        window.cc_ajax = "<?php echo admin_url('admin-ajax.php'); ?>";

        jQuery('.cc-love').on('click', function() {
            var el = jQuery(this);
            if (el.hasClass('loved'))
                return false;

            var post = {
                action: 'cc_love',
                post_id: el.attr('data-id')
            };

            jQuery.post(window.cc_ajax, post, function(data) {
                el.find('.updated-counter').html(data);
                el.addClass('loved');
            });

            return false;
        });
    </script>
<?php
}

if (!function_exists('driveme_custom_frontend_style')) {

    function driveme_custom_frontend_style()
    {
        global $theme_option;
        echo '<style type="text/css">' . $theme_option['custom-css'] . '</style>';
    }
}
add_action('wp_head', 'driveme_custom_frontend_style');

if (!function_exists('driveme_custom_frontend_scripts')) {

    function driveme_custom_frontend_scripts()
    {
        global $theme_option;
        echo esc_html($theme_option['google_id']);
    }
}
add_action('wp_footer', 'driveme_custom_frontend_scripts');

remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');

//Custom Excerpt Function
function driveme_do_shortcode($content)
{
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback("/$pattern/s", 'do_shortcode_tag', $content);
}

// Widget Sidebar
function driveme_widgets_init()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'driveme'),
        'id' => 'sidebar-1',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'driveme'),
        'id' => 'woo_sidebar',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="filter-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Column 1', 'driveme'),
        'id' => 'sidebar-2',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5><hr>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 2', 'driveme'),
        'id' => 'sidebar-3',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5><hr>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 3', 'driveme'),
        'id' => 'sidebar-4',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5><hr>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 4', 'driveme'),
        'id' => 'sidebar-5',
        'description' => __('Appears in the sidebar section of the site.', 'driveme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5><hr>'
    ));
}

add_action('widgets_init', 'driveme_widgets_init');

function driveme_add_search_to_wp_menu($items, $args)
{
    global $theme_option;
    if ('primary' === $args->theme_location) {
        if ($theme_option['hide_menu_search'] != 1) {


            $items .= '<li class="dropdown"><a href="' . home_url('/') . '" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> </a>
                <ul class="dropdown-menu mega srch navbar-right animated-half fadeInUp">
                <li>
                <div class="form-group">';
            $items .= '<form method="get" action="' . home_url('/') . '" id="searchform">
                <input type="search" class="form-control" id="search s" placeholder="Search Here" name="s" /></form>';
            $items .= '       </div>
                </li>
                </ul>
                </li>
                ';
        }
        // $items .= driveme_woocommerce_cart_dropdown();
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'driveme_add_search_to_wp_menu', 10, 2);





/* ----------------------------------------------------------------------------------- */
/*  driveme cart ajax option 
    /*----------------------------------------------------------------------------------- */

function driveme_woocommerce_cart_dropdown()
{

    global $woocommerce;
?>
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> </a>
        <ul class="dropdown-menu  cart-popup navbar-right animated-half fadeInUp">
            <li>
                <?php
                if (sizeof($woocommerce->cart->cart_contents) > 0) {
                ?>
                    <table class="cart-popup-table">
                        <tbody>
                            <?php
                            foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
                                $_product = $cart_item['data'];
                                if ($_product->exists() && $cart_item['quantity'] > 0) {
                                    echo '';
                            ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail">
                                            <a href="single-product.html">
                                                <?php echo esc_html($_product->get_image()); ?>
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <div class="cart-product-title">
                                                <a href="<?php echo get_permalink($cart_item['product_id']); ?>"> <b><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product); ?> </b> </a>
                                            </div>
                                            <b> <?php echo wc_price($_product->get_price()); ?>
                                                <p class="fsz-16">Qty: <?php echo esc_html($cart_item['quantity']); ?>Pcs</p>
                                        </td>
                                        <td class="del-item">
                                            <?php
                                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                            $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);

                                            echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                '<a href="%s" class="delete fa fa-close" title="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                                esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                esc_html__('Remove this item', 'driveme'),
                                                esc_attr($product_id),
                                                esc_attr($_product->get_sku())
                                            ), $cart_item_key);
                                            ?>

                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="cart_total">
                                <td>
                                    <b>Subtotal</b>
                                </td>
                                <td class="total">
                                    <b><?php echo esc_html($woocommerce->cart->get_cart_total()); ?></b>
                                </td>
                                <td> </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="product-thumbnail">
                                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-small-1">Cart </a>
                                </td>
                                <td class="product-name">
                                    <a href="<?php echo wc_get_checkout_url(); ?>" class="btn default-btn"><?php esc_html_e('Checkout', 'driveme') ?></a>
                                </td>
                                <td> </td>
                            </tr>
                        </tfoot>
                    </table>
                <?php
                } else {
                    echo '<span class="empty">' . esc_html__('No products in the cart.', 'driveme') . '</span>';
                }
                ?>

            </li>
        </ul>
    </li>

    <?php
}

// Handle cart in header fragment for ajax add to cart
add_filter('woocommerce_add_to_cart_fragments', 'cg_header_add_to_cart_fragment');

if (!function_exists('cg_header_add_to_cart_fragment')) {

    function cg_header_add_to_cart_fragment($fragments)
    {
        global $woocommerce;

        ob_start();
    ?>



        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> </a>
            <ul class="dropdown-menu  cart-popup navbar-right animated-half fadeInUp">
                <li>
                    <?php
                    if (sizeof($woocommerce->cart->cart_contents) > 0) {
                    ?>
                        <table class="cart-popup-table">
                            <tbody>
                                <?php
                                foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
                                    $_product = $cart_item['data'];
                                    if ($_product->exists() && $cart_item['quantity'] > 0) {
                                        echo '';
                                ?>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="single-product.html">
                                                    <?php echo esc_html($_product->get_image()); ?>
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <div class="cart-product-title">
                                                    <a href="<?php echo get_permalink($cart_item['product_id']); ?>"> <b><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product); ?> </b> </a>
                                                </div>
                                                <b> <?php echo wc_price($_product->get_price()); ?>
                                                    <p class="fsz-16">Qty: <?php echo esc_html($cart_item['quantity']); ?>Pcs</p>
                                            </td>
                                            <td class="del-item">
                                                <?php
                                                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);

                                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                    '<a href="%s" class="delete fa fa-close" title="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    esc_html__('Remove this item', 'driveme'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ), $cart_item_key);
                                                ?>

                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart_total">
                                    <td>
                                        <b>Subtotal</b>
                                    </td>
                                    <td class="total">
                                        <b><?php echo esc_html($woocommerce->cart->get_cart_total()); ?></b>
                                    </td>
                                    <td> </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        <a href="cart.html" class="btn btn-small-1">Cart </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="btn default-btn"><?php esc_html_e('Checkout', 'driveme') ?></a>
                                    </td>
                                    <td> </td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php
                    } else {
                        echo '<span class="empty">' . esc_html__('No products in the cart.', 'driveme') . '</span>';
                    }
                    ?>

                </li>
            </ul>
        </li>


    <?php
        $fragments['div#top-cart'] = ob_get_clean();

        return $fragments;
    }
}

/**
 * Output wishlist button on product archive only if yith_wcwl_add_to_wishlist plugin is installed
 *
 * @since 1.2.0
 * @return void
 */
function driveme_wishlist_button()
{
    if (function_exists('shortcode_exists') && shortcode_exists('yith_wcwl_add_to_wishlist') && class_exists('YITH_WCWL')) {
        global $yith_wcwl, $product;
        $url = $yith_wcwl->get_wishlist_url();
        $product_type = (version_compare(WC_VERSION, '3.0.0', '<') ? $product->product_type : $product->get_type());
        $exists = $yith_wcwl->is_product_in_wishlist($product->get_id());
        $classes = 'class="likeitem green-background fa fa-heart add_to_wishlist"';
        $html = '<div class="yith-wcwl-add-to-wishlist add-to-wishlist-' . $product->get_id() . '">';
        $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row
        $html .= $exists ? ' hide" style="display:none;"' : ' show"';
        $html .= '><a href="' . esc_url($yith_wcwl->get_wishlist_url()) . '" data-product-id="' . $product->get_id() . '" data-product-type="' . $product_type . '" ' . $classes . ' ></a>';
        $html .= '</div>';
        $html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="' . esc_url($url) . '"><i class="fa fa-check"></i></a></div>';
        $html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ($exists ? 'show' : 'hide') . '" style="display:' . ($exists ? 'block' : 'none') . '"><a href="' . esc_url($url) . '"><i class="fa fa-external-link"></i></a></div>';
        $html .= '<div style="clear:both"></div><div class="yith-wcwl-wishlistaddresponse"></div>';
        $html .= '</div>';
        $html .= '<div class="clear"></div>';
        //$html .= YITH_WCWL_UI::popup_message();
        return $html;
    }
}

//function tag widgets
function driveme_tag_cloud_widget($args)
{
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 11; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = array(20, 80, 92); //exclude tags by ID
    return $args;
}

add_filter('widget_tag_cloud_args', 'driveme_tag_cloud_widget');

function driveme_portfolio_excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

function driveme_excerpt($limit)
{

    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

//pagination
function driveme_pagination($prev = '<i class="fa fa-chevron-left"></i>', $next = '<i class="fa fa-chevron-right"></i>', $pages = '')
{
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    $pagination = array(
        'base' => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
        'format' => '',
        'current' => max(1, get_query_var('paged')),
        'total' => $pages,
        'prev_text' => $prev,
        'next_text' => $next, 
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3
    );
    $return = paginate_links($pagination);
    echo str_replace("<ul class='page-numbers'>", '<ul>', $return);
}

//Get thumbnail url
function driveme_thumbnail_url($size)
{
    global $post;
    //$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),$size );
    if ($size == '') {
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        return $url;
    } else {
        $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
        return $url[0];
    }
}

function driveme_post_nav()
{
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    if (!$next && !$previous)
        return;
    ?>
    <ul class="pager clearfix">
        <li class="previous">
            <?php previous_post_link('%link', _x(' &larr; Older Item', 'Previous post link', 'driveme')); ?>
        </li>
        <li class="next">
            <?php next_post_link('%link', _x('Newer Item &rarr;', 'Next post link', 'driveme')); ?>
        </li>
    </ul>
<?php
}

function driveme_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . home_url('/') . '" >  
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the site..." />
        <input type="submit" class="search_btn" id="searchsubmit" value="' . esc_attr__('Search', 'driveme') . '" />    
        </form>';
    return $form;
}

add_filter('get_search_form', 'driveme_search_form');

// Comment Form
function driveme_theme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
?>
    <li>
        <ul class="coments">
            <li>
                <div class="img-admin"> <?php echo get_avatar($comment, $size = '100', 'http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70'); ?> </div>
            </li>
            <li>
                <h4><?php printf(__('%s', 'driveme'), get_comment_author_link()) ?></h4>
                <span>Date : <?php
                                $d = "d M";
                                printf(get_comment_date($d))
                                ?> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                <p><?php comment_text(); ?></p>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.', 'driveme') ?></em>
                    <br />
                <?php endif; ?>
            </li>
        </ul>
    </li>
    <?php
}

function driveme_breadcrumbs()
{

    /* === OPTIONS === */
    $text['home'] = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['tax'] = 'Archive for "%s"'; // text for a taxonomy page
    $text['search'] = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag'] = 'Posts Tagged "%s"'; // text for a tag page
    $text['author'] = 'Articles Posted by %s'; // text for an author page
    $text['404'] = 'Error 404'; // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = ''; // delimiter between crumbs
    $before = '<li><a>'; // tag before the current crumb
    $after = '</a></li>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '<li typeof="v:Breadcrumb">';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>/' . $linkAfter;

    if (is_home() || is_front_page()) { //echo '<h2>'.$text['home'].'</h2>';
        if ($showOnHome == 1)
            echo '<h2><a href="' . $homeLink . '">' . $text['home'] . '</a></h2>';
    } else {
        if (is_single()) {
            if (get_post_type() == 'post') {
                echo '<h2>' . get_the_title() . '</h2>';
            }
        } 
        echo '<ul class="links" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;


        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo esc_html($cats);
            }
            echo '<li>' . sprintf($text['category'], single_cat_title('', false)) . '</li>';
        } elseif (is_tax()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo esc_html($cats);
            }
            echo '<li>' . sprintf($text['tax'], single_cat_title('', false)) . '</li>';
        } elseif (is_search()) {
            echo '<li>' . sprintf($text['search'], get_search_query()) . '</li>';
        } elseif (is_day()) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
            echo '<li>' . get_the_time('d') . '</li>';
        } elseif (is_month()) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo '<li>' . get_the_time('F') . '</li>';
        } elseif (is_year()) {
            echo '<li>' . get_the_time('Y') . '</li>';
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1)
                    echo '<li> ' . get_the_title() . '</li>';
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>/' . $linkAfter, $cats);
                echo esc_html($cats);
                if ($showCurrent == 1)
                    echo '<li>' . get_the_title() . '</li>';
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo '<li>' . $post_type->labels->singular_name . '</l';
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo esc_html($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1)
                echo '<li> ' . get_the_title() . '</li>';
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo '<li>' . get_the_title() . '</li>';
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo esc_html($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                    echo esc_html($delimiter);
            }
            if ($showCurrent == 1)
                echo '<li> ' . get_the_title() . '</li>';
        } elseif (is_tag()) {
            echo '<li>' . sprintf($text['tag'], single_tag_title('', false)) . '</li>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<li>' . sprintf($text['author'], $userdata->display_name) . '</l';
        } elseif (is_404()) {
            echo '<li>' . $text['404'] . '</li>';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo 'driveme ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</ul>';
    }
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'driveme_theme_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function driveme_theme_register_required_plugins()
{
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => 'WP Maximum Excution Time Exceeded', // The plugin name.
            'slug' => 'wp-maximum-execution-time-exceeded', // The plugin slug (typically the folder name).
            'source' => get_template_directory_uri() . '/framework/plugin/wp-maximum-execution-time-exceeded.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'WPBakery Visual Composer', // The plugin name.
            'slug' => 'js_composer', // The plugin slug (typically the folder name).
            'source' => get_template_directory_uri() . '/framework/plugin/js_composer.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Driveme Common', // The plugin name.
            'slug' => 'driveme-common', // The plugin slug (typically the folder name).
            'source' => get_template_directory_uri() . '/framework/plugin/driveme-common.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Redux Fremework',
            'slug' => 'redux-framework',
            'required' => true,
        ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name' => 'Twitter',
            'slug' => 'wolf-twitter',
            'source' => get_template_directory_uri() . '/framework/plugin/wolf-twitter.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'driveme'),
            'menu_title' => __('Install Plugins', 'driveme'),
            'installing' => __('Installing Plugin: %s', 'driveme'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'driveme'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'driveme'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'driveme'), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'driveme'), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'driveme'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'driveme'), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'driveme'), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'driveme'), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'driveme'), // %1$s = plugin name(s).
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'driveme'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'driveme'),
            'return' => __('Return to Required Plugins Installer', 'driveme'),
            'plugin_activated' => __('Plugin activated successfully.', 'driveme'),
            'complete' => __('All plugins installed and activated successfully. %s', 'driveme'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa($plugins, $config);
}

//Payments
function dm_sanitize_payment_data(&$source)
{

    global $theme_option;

    $fields = array('cid', 'email', 'firstname', 'lastname', 'message', 'phone', 'date', 'amount', 'processor', 'amount', 'currency', 'course', 'payment_raw');

    $data = array();
    foreach ($fields as $f) {
        $data[$f] = is_array($source) && array_key_exists($f, $source) ? trim($source[$f]) : '';
    }

    $data['cid'] = intval($data['cid']);

    if ($data['cid']) {
        $course_post = get_post($data['cid']);
        if (!is_null($course_post)) {
            $price = get_post_meta($data['cid'], '_cmb_courses_price', true);
            $data['course'] = $course_post->post_title . ' [' . $price . ']';
            $data['currency'] = $theme_option['payment_currency'];
            $data['amount'] = floatval(preg_replace('/[^0-9,]/', '', str_replace('.', '.', $price)));
        } else
            $data['cid'] = 0;
    }

    return $data;
}



function wp_driveme_trx_save($id, $processor, $data, $testmode = false, $date = 0)
{

    $content = 'For search: ' . PHP_EOL . $processor . PHP_EOL . json_encode($data);

    if (!empty($data['trx'])) {

        global $wpdb;
        $post_id = $wpdb->get_results($wpdb->prepare("SELECT `post_id` FROM {$wpdb->postmeta} WHERE `meta_value` = %s LIMIT 1", $data['trx']), ARRAY_N);
        if (!empty($post_id))
            $post_id = array_shift($post_id);
    }

    $update = array(
        'post_content' => $content
    );

    if ($date)
        $update['post_date'] = date('Y-m-d H:i:s', $date);
    if ($date)
        $update['post_date_gmt'] = gmdate('Y-m-d H:i:s', $date);


    if (empty($post_id)) {

        $update['post_type'] = 'wp-driveme-trx';
        $update['post_author'] = 1;
        $update['post_title'] = $id;
        $update['post_status'] = 'publish';

        $post_id = wp_insert_post($update);
    } else {
        $update['ID'] = $post_id;
        $update['post_status'] = 'publish';
        $update['post_title'] = $id;

        $post_id = wp_update_post($update);
    }

    update_post_meta($post_id, 'wp-driveme-trx-firstname', $data['firstname']);
    update_post_meta($post_id, 'wp-driveme-trx-lastname', $data['lastname']);
    update_post_meta($post_id, 'wp-driveme-trx-email', $data['email']);
    update_post_meta($post_id, 'wp-driveme-trx-phone', $data['phone']);
    update_post_meta($post_id, 'wp-driveme-trx-message', $data['message']);
    update_post_meta($post_id, 'wp-driveme-trx-course', $data['course']);
    update_post_meta($post_id, 'wp-driveme-trx-date', $data['date']);

    update_post_meta($post_id, 'wp-driveme-trx-mode', $processor == 'offline' ? 'OFFLINE' : ($testmode || !empty($data['testmode']) ? 'TEST' : 'LIVE'));
    update_post_meta($post_id, 'wp-driveme-trx-paid', $processor == 'offline' || !$data['paid'] ? 'NO' : 'YES');
    update_post_meta($post_id, 'wp-driveme-trx-processor', $processor);
    update_post_meta($post_id, 'wp-driveme-trx-amount', $data['amount']);
    update_post_meta($post_id, 'wp-driveme-trx-transaction', !empty($data['trx']) ? $data['trx'] : '');
    update_post_meta($post_id, 'wp-driveme-trx-currency', strtoupper($data['currency']));
    update_post_meta($post_id, 'wp-driveme-trx-payment_raw', $data['payment_raw']);

    do_action('wp_driveme_on_after_transfer_save', $post_id);
}

add_action('wp_driveme_on_transfer', 'wp_driveme_trx_save', 10, 5);



add_action('admin_init', 'driveme_transactions_admin_init');

function driveme_transactions_admin_init()
{

    wp_register_style('dmmodal', get_template_directory_uri() . '/css/modal.css');
    wp_register_script('dmmodal', get_template_directory_uri() . '/js/modal.js');
}


function driveme_transactions_load_styles()
{
    wp_enqueue_style('dmmodal');
}

function driveme_transactions_load_scripts()
{
    wp_enqueue_script('dmmodal');
}

//Code Visual Compurso.
include(get_template_directory() . '/vc_shortcode.php');

//if(class_exists('WPBakeryVisualComposerSetup')){
function driveme_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag)
{
    if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
        $class_string = preg_replace('/vc_col-sm-12/', 'col-md-12', $class_string);
        $class_string = preg_replace('/vc_col-sm-6/', 'col-md-6', $class_string);
        $class_string = preg_replace('/vc_col-sm-4/', 'col-md-4', $class_string);
        $class_string = preg_replace('/vc_col-sm-3/', 'col-md-3', $class_string);
        $class_string = preg_replace('/vc_col-sm-5/', 'col-md-5', $class_string);
        $class_string = preg_replace('/vc_col-sm-7/', 'col-md-7', $class_string);
        $class_string = preg_replace('/vc_col-sm-8/', 'col-md-8', $class_string);
        $class_string = preg_replace('/vc_col-sm-9/', 'col-md-9', $class_string);
        $class_string = preg_replace('/vc_col-sm-10/', 'col-md-10', $class_string);
        $class_string = preg_replace('/vc_col-sm-11/', 'col-md-11', $class_string);
        $class_string = preg_replace('/vc_col-sm-1/', 'col-md-1', $class_string);
        $class_string = preg_replace('/vc_col-sm-2/', 'col-md-2', $class_string);
    }
    return $class_string;
}

// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'driveme_custom_css_classes_for_vc_row_and_vc_column', 10, 2);
// Add new Param in Row
if (function_exists('vc_add_param')) {

    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Section Title', 'driveme'),
        "param_name" => "ses_title",
        "value" => "",
        "description" => esc_html__("Title of Section, Leave a blank do not show frontend.", "driveme"),
    ));
    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Section Desc', 'driveme'),
        "param_name" => "ses_desc",
        "value" => "",
        "description" => esc_html__("Desc of Section, Leave a blank do not show frontend.", "driveme"),
    ));
    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Section ID', 'driveme'),
        "param_name" => "ses_id",
        "value" => "",
        "description" => esc_html__("Section ID", "driveme"),
    ));
    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Section class', 'driveme'),
        "param_name" => "ses_class",
        "value" => "",
        "description" => esc_html__("Section class", "driveme"),
    ));
    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Text', 'driveme'),
        "param_name" => "text",
        "value" => "",
        "description" => esc_html__("Text", "driveme"),
    ));
    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__('Link', 'driveme'),
        "param_name" => "link",
        "value" => "",
        "description" => esc_html__("Link", "driveme"),
    ));
    vc_add_param('vc_row', array(
        'type' => 'attach_image',
        'heading' => __('Image Background', 'driveme'),
        'param_name' => 'ses_image',
        'value' => '',
        'description' => __('Select image from media library to do your signature.', 'driveme')
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__('Animation', 'driveme'),
        'param_name' => 'animation',
        'value' => array(
            esc_html__('No', 'driveme') => 'no',
            esc_html__('Yes', 'driveme') => 'yes',
        ),
        'description' => esc_html__('Select animation', 'driveme')
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__('Chosen type row', 'driveme'),
        'param_name' => 'type_row',
        'value' => array(
            esc_html__('None Section', 'driveme') => 'type4',
            esc_html__('Banner Slider', 'driveme') => 'type2',
            esc_html__('Testimonials 1', 'driveme') => 'type1',
            esc_html__('Testimonials 2', 'driveme') => 'type21',
            esc_html__('Testimonials 3', 'driveme') => 'type22',
            esc_html__('Features', 'driveme') => 'type3',
            esc_html__('Container', 'driveme') => 'type5',
            esc_html__('License', 'driveme') => 'type6',
            esc_html__('Contact', 'driveme') => 'type7',
        ),
        'description' => esc_html__('Select type row', 'driveme')
    ));

    // Add new Param in Column  
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Column Title', 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title of column", "driveme"),
        )
    );
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Column Desc', 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", "driveme"),
        )
    );
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Container Class', 'driveme'),
            "param_name" => "wap_class",
            "value" => "",
            "description" => esc_html__("Container Class", "driveme"),
        )
    );
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Column id', 'driveme'),
            "param_name" => "column_id",
            "value" => "",
            "description" => esc_html__("Column ID, Only use for content slider.", "driveme"),
        )
    );
    vc_add_param('vc_column', array(
        'type' => 'dropdown',
        'heading' => esc_html__('Type', 'driveme'),
        'param_name' => 'type',
        'value' => array(
            esc_html__('Normal', 'driveme') => 'normal',
            esc_html__('Column', 'driveme') => 'column',
            esc_html__('Faqs', 'driveme') => 'faqs',
            esc_html__('Faqs 2', 'driveme') => 'faqs2',
            esc_html__('Testimonials Left', 'driveme') => 'test_left',
            esc_html__('Testimonials Right', 'driveme') => 'test_right',
        ),
        'description' => esc_html__('Select type section content', 'driveme')
    ));
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Text', 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", "driveme"),
        )
    );
    vc_add_param(
        'vc_column',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Link', 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", "driveme"),
        )
    );
    vc_add_param('vc_column', array(
        'type' => 'dropdown',
        'heading' => esc_html__('Animation', 'driveme'),
        'param_name' => 'animation',
        'value' => array(
            esc_html__('No', 'driveme') => 'no',
            esc_html__('Yes', 'driveme') => 'yes',
        ),
        'description' => esc_html__('Select animation', 'driveme')
    ));
}
@session_start();
if (isset($_POST['slider_search']) && $_POST['slider_search'] == 1) {
    foreach ($_POST as $key => $val) {
        $_SESSION['driveme'][$key] = $val;
    }
}

//book now button

function booknow_button($courseid)
{
    global $theme_option;
    $bookingtype = get_post_meta($courseid, '_cmb_booking_type', true);
    if ($bookingtype == 'default' || empty($bookingtype)) { ?>
        <form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
            <button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
            <input type="hidden" name="booking_title" value="<?php echo esc_attr($courseid); ?>" />
        </form>
        <?php } elseif ($bookingtype == 'external') {
        $external_link = get_post_meta($courseid, '_cmb_booknow_externallink', true);
        if ($external_link != '') {
        ?>
            <a href="<?php echo esc_url($external_link); ?>" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></a>
        <?php } else { ?>
            <form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
                <button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
                <input type="hidden" name="booking_title" value="<?php echo esc_attr($courseid); ?>" />
            </form>
        <?php }
    } elseif ($bookingtype == 'woocommerce') {
        $woo_product_id = get_post_meta($courseid, '_cmb_booknow_woocommerce', true);
        if ($woo_product_id != '') { ?>
            <a href="<?php echo site_url() . '/?add-to-cart=' . $woo_product_id ?>" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></a>
        <?php } else { ?>
            <form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
                <button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
                <input type="hidden" name="booking_title" value="<?php echo esc_attr($courseid); ?>" />
            </form>
<?php }
    }
}

if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated()
    {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('driveme_filter_wp_title')) {
    function driveme_filter_wp_title($title, $sep)
    {
        global $theme_option;
        global $wp_query;

        $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
        if ($seo_title != '') $title = $seo_title;

        return $title;
    }
}
add_filter('wp_title', 'driveme_filter_wp_title', 10, 2);
