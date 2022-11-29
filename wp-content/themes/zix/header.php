<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zix
 */
$opt = get_option('zix_opt');
$is_header_top = isset( $opt['is_header_top'] ) ? $opt['is_header_top'] : '';
$always_fixed  = function_exists('get_field') ? get_field('always_sticky') : '';
$always_fixed  = $always_fixed == 1 ? 'always_fixed' : '';

$menu_style = function_exists('get_field') ? get_field('menu_style') : '';

if ( $menu_style == 'style_2' ){
    $menu_class = 'main_header_area';
}
elseif( $menu_style == 'style_3' ){
    $menu_class = 'main_header_area_one main_header_area_two';
}
else{
    $menu_class = 'main_header_area_one header_one';
}


$menu_alignment  = function_exists('get_field') ? get_field('menu_alignment') : '';
$menu_alignment_class = 'justify-content-end';
if ( $menu_alignment == 'left' ) {
   $menu_alignment_class = 'justify-content-start';
} elseif ( $menu_alignment == 'center' ) {
    $menu_alignment_class = 'justify-content-center';
} elseif ( $menu_alignment == 'right' ) {
    $menu_alignment_class = 'justify-content-end';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<div class="body_wrapper">
    <header class="<?php echo esc_attr( $menu_class ) .' '. esc_attr( $always_fixed ) ?>">
    <?php
    if( $is_header_top ) {
        $top_bar = function_exists('get_field') ? get_field('is_header_top') : '';
        if ($top_bar == 1) { ?>
            <div class="top_header_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="header_top_info">
                                <?php
                                if( !empty( $opt['email_address'] ) ){
                                    echo '<a href="mailto:'.esc_attr( $opt['email_address'] ).'"><img src="'.get_template_directory_uri().'/assets/images/email2.png" alt="'. esc_attr__( 'Email Address', 'zix' ) .'">'. esc_html( $opt['email_address'] ) .'</a>';
                                }

                                if( !empty( $opt['phone_number'] ) ){
                                    echo '<a href="tell:'.esc_attr( $opt['phone_number'] ).'"><img src="'.get_template_directory_uri().'/assets/images/phone.png" alt="'. esc_attr__( 'Phone Number', 'zix' ) .'">'. esc_html( $opt['phone_number'] ) .'</a>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                            <?php
                            if( $opt['header_top_social'] == 1 ) { ?>
                                <div class="top_social_info">
                                    <span><?php echo esc_html__( 'Follow Us:', 'zix' )?></span>
                                    <?php zix_social_profile(); ?>
                                </div>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                $page_logo = function_exists('get_field') ? get_field('page_logo') : '';
                $page_logo = !empty( $page_logo ) ? $page_logo : '';
                $page_ratina_logo = function_exists('get_field') ? get_field('page_ratina_logo') : '';
                $page_ratina_logo = !empty( $page_ratina_logo ) ? 'srcset="'. esc_url( $page_ratina_logo ) .' 2x"' : '';
        
                $page_stickylogo = function_exists('get_field') ? get_field('headersticky_logo') : '';
                $page_stickylogo = !empty( $page_stickylogo ) ? $page_stickylogo : '';
                
                $ratina_sticky_logo = function_exists('get_field') ? get_field('ratina_sticky_logo') : '';
                $ratina_sticky_logo = !empty( $ratina_sticky_logo ) ? 'srcset="'. esc_url( $ratina_sticky_logo ) .' 2x"' : '';

                if (isset($opt['main_logo']['url'])) {
                    $main_logo = !empty( $opt['main_logo']['url']) ? $opt['main_logo']['url'] : '';
                    $retina_logo = !empty( $opt['retina_logo']['url'] ) ? 'srcset="'. esc_url( $opt['retina_logo']['url'] ) .' 2x"' : '';
                    
                    // Sticky Logo
                    $sticky_logo = !empty( $opt['sticky_logo']['url']) ? $opt['sticky_logo']['url'] : '';
                    $retina_sticky_logo = !empty( $opt['retina_sticky_logo']['url']) ? 'srcset="'. esc_url( $opt['retina_sticky_logo']['url'] ).' 2x"' : '';

                    if( $page_logo ){
                        echo '<img src="'. esc_url( $page_logo ) .'" '.$page_ratina_logo.' alt="'. esc_attr( get_bloginfo( 'name' ) ) .'">';
                        echo '<img src="'. esc_url( $page_stickylogo ) .'" '.$ratina_sticky_logo.' alt="'. esc_attr( get_bloginfo( 'name' ) ) .'">';
                    }else {
                        echo '<img src="'. esc_url( $main_logo ) .'" '.$retina_logo.' alt="'. get_bloginfo( 'name' ) .'">';
                        echo '<img src="'. esc_url( $sticky_logo ) .'" '.$retina_sticky_logo.' alt="'. get_bloginfo( 'name' ) .'">';
                    }
                }
                else{
                    echo '<h1 class="site_logo">'. esc_html( get_bloginfo( 'name' ) ) .'</h1>';
                }
                ?>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo esc_attr__( 'Toggle navigation', 'zix' ); ?>">
                <span class="menu_toggle">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="hamburger-cross">
                        <span></span>
                        <span></span>
                    </span>
                </span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'container'         => false,
                        'depth'             => 3,
                        'menu_class'        => 'navbar-nav menu '.$menu_alignment_class,
                        'walker'            => new Zix_Navwalker()
                    ) );
                }


               // Mini Cart ===============
                if(class_exists( 'WooCommerce' )):
                    get_template_part( 'template-parts/header/mini', 'cart' );
                endif;
            ?>
            </div>
            <?php
            // Action Button
            $action_btn = function_exists('get_field') ? get_field('customize_the_button') : '';
            $is_action_btn = $action_btn == 1 ? $action_btn : '';
            if( $is_action_btn ){
                $btn_label = !empty( get_field( 'action_btn_label' ) ) ? get_field( 'action_btn_label' ) : '';
                $btn_url   = !empty( get_field( 'action_btn_url' ) ) ? get_field( 'action_btn_url' ) : '';
                echo '<a href="'. esc_url( $btn_url ) .'" class="get_btn pink">'. esc_html( $btn_label ) .'</a>';
            }
            ?>
        </div>
    </nav>
</header>

    <?php
    $is_banner = '1';
    if ( is_home() ) {
        $is_banner = '1';
    } elseif ( is_page() ) {
        $is_banner = function_exists('get_field') ? get_field('is_banner') : '1';
        $is_banner = isset($is_banner) ? $is_banner : '1';
    }

    if( $is_banner == '1' ){
        if( !is_singular( 'post' ) ){
            get_template_part( 'template-parts/header/banner' );
        }
        elseif ( is_singular( 'post' ) ){
            get_template_part( 'template-parts/header/banner', 'post' );
        }
    }



