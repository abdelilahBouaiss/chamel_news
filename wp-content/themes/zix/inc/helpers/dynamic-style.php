<?php

if( ! function_exists( 'zix_custom_style' ) ) {
	function zix_custom_style() {

	    $opt = get_option( 'zix_opt' );

		$is_page_header     			= '';
		$default_menu_color     		= '';
		$sticky_menu_color     			= '';
		$page_header_bg        			= 'background-image: url('. get_template_directory_uri() . '/assets/images/service_bg.jpg )';
		$page_header_choose_color 		= '';
		$page_header_bg_solid_color 	= '';
		$page_header_bg_gradient_color 	= '';
		$page_titlebar_overlay_color 	= '';
		$accent_gradient_from           = !empty( $opt['accent-gradient']['from'] ) ? $opt['accent-gradient']['from'] : '';
		$accent_gradient_to             = !empty( $opt['accent-gradient']['to'] ) ? $opt['accent-gradient']['to'] : '';


		/* Page Header */
		if( function_exists( 'get_field' ) ) {
            $is_page_header     = get_field('is_banner');
            $page_header_bg     = !empty( get_field('header_image') ) ? get_field('header_image') : '';
            $page_titlebar_overlay = !empty( get_field('page_titlebar_overlay_color') ) ? get_field('page_titlebar_overlay_color') : '';
            $default_menu_color = !empty( get_field('menu_item_color') ) ? get_field('menu_item_color') : '';
        }


        if( is_home() && class_exists('ReduxFramework') ){
            if( $opt['background_type'] == 'image' ){
                $page_header_bg     = !empty( $opt['blog_banner_bg2']['url'] ) ? 'background-image: url('. $opt['blog_banner_bg2']['url'] .')' : '';
            }
            elseif ( $opt['background_type'] == 'gradient' ) {
                $color_from = $opt['blog_titlebar_bg_gradient']['from'];
                $color_to   = $opt['blog_titlebar_bg_gradient']['to'];
                $page_header_bg_gradient_color = "background-image: linear-gradient(-90deg, $color_from, $color_to)";
            }

        }
        elseif( class_exists( 'WooCommerce' ) && is_shop() && !empty( $opt['shop_header_bg']['url'] )  ){

            $page_header_bg = !empty($opt['shop_header_bg']['url']) ? 'background-image: url(' . $opt['shop_header_bg']['url'] . ')' : '';

        }
        elseif( !is_home() && $is_page_header == 1 && !empty( $page_header_bg )  ) {
            $page_header_bg     = !empty( $page_header_bg ) ? 'background-image: url('. $page_header_bg .')' : '';
            $page_titlebar_overlay_color = !empty( $page_titlebar_overlay ) ? 'background-color: '.$page_titlebar_overlay : '';
        }
        else{
            if( class_exists('ReduxFramework') ){
                if( $opt['page_header_bg_select'] == 'image' ) {
                    $page_header_bg = !empty($opt['page_header_image']['url']) ? 'background-image: url(' . esc_url($opt['page_header_image']['url']) . ')' : '';
                }
                elseif ( $opt['page_header_bg_select'] == 'gradient' ) {
                    $page_header_bg = isset($opt['page_header_bg_gradient_color']) ? 'background-image: -webkit-linear-gradient( 0deg, ' . esc_attr($opt['page_header_bg_gradient_color']['to']) . ' 0%, ' . esc_attr($opt['page_header_bg_gradient_color']['from']) . ' 100%) !important;' : '';
                }
                else{
                    $page_header_bg = !empty( $opt['page_header_bg_color'] ) ? 'background-color: '. esc_attr( $opt['page_header_bg_color'] ).'' : '';
                }
            }
        }

		wp_enqueue_style( 'zix-style', get_template_directory_uri() . '/assets/css/custom-style.css', array(), '1.0.0', 'all' );

        $dynamic_css = '';

        if( is_singular( 'portfolio' ) ){
            $portfolio_bg = '';
            if( $opt['portfolio_banner_type'] == 'gradient' ){
                $bg_to = $opt['portfolio_titlebar_bg_gradient']['to'];
                $bg_from = $opt['portfolio_titlebar_bg_gradient']['from'];
                $portfolio_bg = !empty( $bg_to && $bg_from ) ? 'background-image: linear-gradient(90deg, '.$bg_to.', '.$bg_from.' );' : '';
            }
            elseif ( $opt['portfolio_banner_type'] == 'image' ) {
                $portfolio_bg = !empty( $opt['portfolio_banner_bg2']['url'] ) ? 'background-image: url( '.$opt['portfolio_banner_bg2']['url'].' )' : '';
            }
            $dynamic_css .="
                .single-portfolio .breadcrumbs_area{
                    $portfolio_bg;
                }
            ";
        }
        if( is_singular( 'services' ) ){
            $service_bg = '';
            if( $opt['service_banner_type'] == 'gradient' ){
                $bg_to = $opt['service_titlebar_bg_gradient']['to'];
                $bg_from = $opt['service_titlebar_bg_gradient']['from'];
                $service_bg = !empty( $bg_to && $bg_from ) ? 'background-image: linear-gradient(90deg, '.$bg_to.', '.$bg_from.' );' : '';
            }
            elseif ( $opt['service_banner_type'] == 'image' ) {
                $service_bg = !empty( $opt['service_banner_bg2']['url'] ) ? 'background-image: url( '.$opt['service_banner_bg2']['url'].' )' : '';
            }
            $dynamic_css .="
                .single-services .breadcrumbs_area{
                    $service_bg;
                }
            ";
        }
        if( is_singular( 'team' ) ){
            $team_bg = '';
            if( $opt['team_banner_type'] == 'gradient' ){
                $bg_to = $opt['team_titlebar_bg_gradient']['to'];
                $bg_from = $opt['team_titlebar_bg_gradient']['from'];
                $team_bg = !empty( $bg_to && $bg_from ) ? 'background-image: linear-gradient(90deg, '.$bg_to.', '.$bg_from.' );' : '';
            }
            elseif ( $opt['team_banner_type'] == 'image' ) {
                $team_bg = !empty( $opt['team_banner_bg2']['url'] ) ? 'background-image: url( '.$opt['team_banner_bg2']['url'].' )' : '';
            }
            $dynamic_css .="
                .single-team .breadcrumbs_area{
                    $team_bg;
                }
            ";
        }
        if( is_home() ){
            $dynamic_css .="
                .blog .breadcrumbs_area{
                    $page_header_bg_gradient_color;
                }
            ";
        }

        $dynamic_css .= "
            .breadcrumbs_area {
                $page_header_bg
            }
            .navbar .menu > .nav-item > .nav-link{
                $default_menu_color
            }
            .breadcrumbs_area.page_overlay:before{
                $page_titlebar_overlay_color
            }
        ";



        if(function_exists('get_field')) {
            $is_menu_color = get_field( 'is_menu_color' );
            $menu_item_color = !empty( $is_menu_color['menu_item_color'] ) ? $is_menu_color['menu_item_color'] : '';
            $menu_item_active_color = !empty( $is_menu_color['menu_item_active_color'] ) ? $is_menu_color['menu_item_active_color'] : '';
            $sticky_menu_color = !empty( $is_menu_color['sticky_menu_color'] ) ? $is_menu_color['sticky_menu_color'] : '';
            $hamburger_m_normal = !empty( $is_menu_color['hamburger_menu_icon_color'] ) ? $is_menu_color['hamburger_menu_icon_color'] : '';
            $hamburger_m_sticky = !empty( $is_menu_color['hamburger_menu_icon_sticky'] ) ? $is_menu_color['hamburger_menu_icon_sticky'] : '';

            $logo_padding = get_field( 'main_logo_dimension' );
            $padding_top  = !empty( $logo_padding['logo_pt'] ) ? 'padding-top:'. $logo_padding['logo_pt'].'px !important;' : '';
            $padding_right = !empty( $logo_padding['logo_pr'] ) ? 'padding-right:'.$logo_padding['logo_pr'].'px !important;' : '';
            $padding_bottom = !empty( $logo_padding['logo_pb'] ) ? 'padding-bottom:'.$logo_padding['logo_pb'].'px !important;' : '';
            $padding_left = !empty( $logo_padding['logo_pl'] ) ? 'padding-left:'.$logo_padding['logo_pl'].'px !important;' : '';

            $sticky_logo_padding = get_field( 'sticky_logo_dimension' );
            $sticky_logo_pt  = !empty( $sticky_logo_padding['sticky_logo_pt'] ) ? 'padding-top:'. $sticky_logo_padding['sticky_logo_pt'].'px;' : '';
            $sticky_logo_pr = !empty( $sticky_logo_padding['sticky_logo_pr'] ) ? 'padding-right:'.$sticky_logo_padding['sticky_logo_pr'].'px;' : '';
            $sticky_logo_pb = !empty( $sticky_logo_padding['sticky_logo_pb'] ) ? 'padding-bottom:'.$sticky_logo_padding['sticky_logo_pb'].'px;' : '';
            $sticky_logo_pl = !empty( $sticky_logo_padding['sticky_logo_pl'] ) ? 'padding-left:'.$sticky_logo_padding['sticky_logo_pl'].'px;' : '';

            if ( $logo_padding ) {
                $dynamic_css .= "
                    header .navbar .navbar-brand{
                        $padding_top
                        $padding_right
                        $padding_bottom
                        $padding_left
                    }
                ";
            }
            if ( $logo_padding ) {
                $dynamic_css .= "
                    header.navbar_fixed .navbar-brand{
                        $sticky_logo_pt
                        $sticky_logo_pr
                        $sticky_logo_pb
                        $sticky_logo_pl
                    }
                ";
            }


            if ( $menu_item_color ) {
                $dynamic_css .= "
                .navbar .menu > .nav-item > .nav-link{
		           color: " . $menu_item_color . " !important;
		        }";
            }
            if ( $menu_item_active_color ) {
                $dynamic_css .= ".main_header_area_one .navbar .menu > .nav-item.active > .nav-link,
                .main_header_area_one .navbar .menu > .nav-item:hover > .nav-link,
                .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item:hover > .nav-link, .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item:focus > .nav-link, .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item.active > .nav-link  
                {
                   color: " . $menu_item_active_color . " !important;
                }
                .main_header_area_one .navbar .menu > .nav-item .nav-link:before{
                    background: ". $menu_item_active_color ." !important;
                }
                ";

            }
            if ( $sticky_menu_color ) {
                $dynamic_css .= "header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item .nav-link{
                    color: {$sticky_menu_color}
                }";
            }
            
            if( $hamburger_m_normal ){
                $dynamic_css .= "header .menu_toggle .hamburger span, header .menu_toggle .hamburger-cross span{
                    background: $hamburger_m_normal
                }
                ";
            }
            if( $hamburger_m_sticky ){
                $dynamic_css .= "header.navbar_fixed.main_header_area_one .navbar .menu_toggle .hamburger span, header.navbar_fixed.main_header_area_one .navbar .menu_toggle .hamburger-cross span{
                    background: $hamburger_m_sticky
                }
                ";
            }

            if( class_exists('ReduxFramework') ) {
                if( !empty( $opt['footer_bg_type'] == '2' && $opt['footer_bg_gradient']['to'] && $opt['footer_bg_gradient']['from'] ) ){
                    $to = $opt['footer_bg_gradient']['to'];
                    $from = $opt['footer_bg_gradient']['from'];
                    $degree= !empty( $opt['bg_angle'] ) ? $opt['bg_angle'] : '90';
                    $dynamic_css .= "
                        footer.footer_bg{
                            background-image: linear-gradient({$degree}deg, $to, $from);
                        }
                    ";
                }

                /*Accent Gradient Color*/
                if( !empty( $accent_gradient_from && $accent_gradient_to ) ){
                    /* Angle -45 */
                    $dynamic_css .="
                        .progress-two .progress-bar, .promo_area_two, .timeline_item .timeline_info span, .subscribe_area_two,
                        .search-form button, .tag_list li a:hover, .price_slider_wrapper .ui-slider .ui-slider-range
                        {
                            background-image: -moz-linear-gradient(0deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                            background-image: -webkit-linear-gradient(0deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                            background-image: -ms-linear-gradient(0deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                        }
                        .get_btn:before, .get_btn.pink, .get_btn.dark:before, .a_round, .promotion_tag,
                        .h_work_info .h_work_item .icon_number:before, .business_tips_slider .slick-dots li.slick-active button,
                        .skill_content .work_button .phone_btn:before, .protfolio_area_two .projects_gallery_one .projects_item .hover_content .img_overlay:before,
                        .pr_portfolio_gallery .pr_portfolio_item .portfolio_img .overlay, .question_info .card .card-header button,
                        .hover_color:before, .video_icon_one i, .error_content h1, .comment_form .get_btn:before,
                        .blog_pagination .page-numbers.prev:hover, .blog_pagination .page-numbers.next:hover, .hover_btn a:before,
                        .pricing_info .price_item:before, .creative_btn_two:before, .creative_about_img .text,
                        .h_work_info .h_work_item .icon_number
                        {
                            background-image: -moz-linear-gradient(-45deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                            background-image: -webkit-linear-gradient(-45deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                            background-image: -ms-linear-gradient(-45deg, $accent_gradient_from 0%, $accent_gradient_to 100%) !important;
                        }
                    ";
                }

            }


            // Page title heading color
            $page_title_color = get_field( 'page_title_color' );
            if( !empty( $page_title_color ) ){
                $dynamic_css .= "
                    .breadcrumb_content h2{
                        color: {$page_title_color}
                    }
                ";
            }

            // Page breadcrumb color
            $page_breadcrumb_color = get_field( 'page_breadcrumb_color' );
            if( !empty( $page_breadcrumb_color ) ){
                $dynamic_css .= "
                    .breadcrumb_content .breadcrumb li, .breadcrumb_content .breadcrumb li a{
                        color: {$page_breadcrumb_color}
                    }
                    .breadcrumb_content .breadcrumb li a:after{
                        background: {$page_breadcrumb_color}
                    }
                ";
            }


        }
        wp_add_inline_style( 'zix-style', $dynamic_css );
	}
}
add_action( 'wp_enqueue_scripts', 'zix_custom_style', 90 );