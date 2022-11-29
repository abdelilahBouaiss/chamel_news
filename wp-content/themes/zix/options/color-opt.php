<?php

// Color option
Redux::set_section( 'zix_opt', array(
	'title'     => esc_html__( 'Color Settings', 'zix' ),
	'id'        => 'color',
	'icon'      => 'dashicons dashicons-admin-appearance',
	'fields'    => array(
        array(
            'id'          => 'primary_accent_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Primary Accent Color', 'zix' ),
            'output'      => array(
                'color' => '
                    .title span, .color_pink, .section_title h6, .product_name span, .top_social_info a:hover,
                    .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item:hover > .nav-link, 
                    .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item:focus > .nav-link, 
                    .navbar .menu > .nav-item.submenu .dropdown-menu > .nav-item.active > .nav-link,
                    .main_header_area_one .navbar .search_cart .shpping-cart .dropdown-menu .cart-single-item .cart-remove a:hover,
                    .main_header_area_one .navbar .search_cart .shpping-cart .dropdown-menu .cart-single-item:hover .cart-title a,
                    .main_header_area_six .navbar .menu > .nav-item:hover .nav-link,
                    header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item .nav-link:hover,
                    header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item.active > .nav-link,
                    .hero-text h1 span, .banner_content .h_text, .skill_content .work_skill .skill_item .counter,
                    .service_item:before, .promo_info .get_btn:hover, .projects_gallery_one .projects_item .hover_content .icon:hover,
                    .protfolio_area_two .projects_gallery_one .projects_item .category a, .portfolio_filter .work_portfolio_item .f_item:hover,
                    .portfolio_filter .work_portfolio_item.active .f_item, .project_content .c_link a, .projects_wrapper .pr_navbar a:hover,
                    .team_item_three .content h2:hover, .video_right .video_content h5, .timeline_item .timeline_content h6,
                    .recent_news_item .recent_news_content h3:hover, .post_meta a:hover, 
                    .recent_item .recent_news_item .hover_content .media .media-body .date, .creative_recent_news_item .hover_content h4:hover,
                    .creative_recent_news_item .hover_content .media .media-body .date, .recent_news_area_three .recent_item .recent_news_item .hover_content h4:hover,
                    .blog_item .blog_content .author_details .media-body .text, .blog_item .blog_content h3:hover, 
                    .blog_container .recent_news_content .reade_btn:hover, .post_details .recent_news_content .author_details .date,
                    .post_category a:hover, .blog_pagination .page-numbers:hover, .blog_pagination .page-numbers.current,
                    .widget_recent_entries ul li:hover h4, .sidbar_link_list li a:hover, .shop_text h5:hover, .shop_text .pr_price .amount,
                    .product_info .shop_wrapper .pr_single ins, .review .comment-box .post_author .media-body h5 span, 
                    .billing_details_area .return_option h4 i, .billing_form .select_check .create_box label, 
                    .order_box_price .payment_list .payment_list_item.place-order p a, .order_box_price .payment_list .price_single_cost li span,
                    .order_box_price .total_count h4 span, .condition .l_text a, .cart_table tbody tr td .total,
                    .cart_table tbody tr td ins, .table_footer .main_btn, .creative_banner_text .creative_btn:hover,
                    .creative_about_content h5, .dark_bg .portfolio_filter .work_portfolio_item.active .f_item, 
                    .dark_bg .portfolio_filter .work_portfolio_item:hover .f_item, .dark_bg .creative_recent_news_item .hover_content h4:hover,
                    .copy_wright_text a:hover, .link_list li a:hover, .f_creative_widget_link ul li a:hover, 
                    .f_creative_widget_info ul li a i, .creative_footer_area_two .creative_footer_about p a, figcaption a:hover,
                    .nav-links .page-numbers.current, .nav-links .page-numbers:hover, #cancel-comment-reply-link,
                    .blog_item .blog_content .author_details .media-body .text a, .blog_item .blog_content .author_details .media-body .text a:visited,
                    .blog_item .blog_content .author_details .media-body .text a:hover, .color_pink, .color_pink:hover, .color_pink:visited,
                    .f_widget li a:hover, .widget.widget_recent_comments ul#recentcomments li span a:hover ,
                    .widget.widget_recent_comments ul#recentcomments li a:hover, .widget.widget_archive ul li a:hover,
                    .widget.widget_categories ul li a:hover, .widget.widget_pages ul li a:hover,.widget.widget_meta ul li a:hover,
                    .widget.widget_rss ul li a:hover,.widget.widget_nav_menu ul li > a:hover, .widget.widget_recent_comments ul#recentcomments li span a:hover,
                    .blog_area .sticky .recent_news_content h3,.nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus,
                    .wp-block-calendar tfoot td a:hover, .calendar_wrap tfoot td a:hover, .woocommerce a.remove:hover,
                    .widget_product .media .media-body h3:hover, .widget_product .media .media-body .rate, 
                    .shop_sidebar .widget_layered_nav  ul li a:hover, .shop_sidebar .widget_product_categories  ul li a:hover,
                    .woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover, .woocommerce ul.product_list_widget li a:hover h3, .cart_table .price,
                    .recent_news_content .wp-block-column > ul > li:before, .widget_recent_comment .media:hover .comment_icon,
                    .media-body .re_comment a:hover, .service_item_one .media-body a:hover h4, .service_item h4 a:hover,
                    .title_color, .business_tips_slider .item ul li:before, .exprence_content ul li:before, 
                    .navbar .menu > .nav-item.submenu.mega_menu > .dropdown-menu .nav-item ul li a:hover, a:hover
                ',
                'background-color' => '
                    .main_header_area_six .navbar .menu > .nav-item:hover .nav-link:before,
                    header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item .nav-link:before,
                    .banner_content .get_btn:before, .h_work_info .h_work_item .icon_number .small_round,
                    .p_service_two, .testimonial_area_two .flex-control-nav li a.flex-active,
                    .flex-control-nav li a.flex-active, .flex-control-nav li a:hover,
                    .recent_item .recent_news_item .hover_content .border_left, .blog_container .recent_news_content .reade_btn:before,
                    .comment-box .post_author .replay:hover, .best_pr_tab .nav-item .nav-link:before, 
                    .best_pr_tab .nav-item .nav-link.active, .best_pr_tab .nav-item .nav-link:hover, .tab-content .shop_products_item .products_img .ribbon,
                    .creat_account input[type=checkbox]:checked ~ .check, #payment ul li input[type=radio]:before,
                    .cart_table tbody tr td .media .remove:hover, .link_list li a:hover:before, .blog_pagination li a:hover,
                    .blog_pagination li.active a, .search_box .search_btn, .f_widget li a:hover:before,
                    .footer_top_three .f_widget .mailpoet_paragraph .mailpoet_submit, .recent_news_content .post-password-form input[type="submit"],
                    .calendar_wrap tbody td a, .products-pagination .blog_pagination li a:hover, .products-pagination .blog_pagination li.active a,
                    .shop_sidebar .widget_layered_nav  ul li a:before, .shop_sidebar .widget_product_categories  ul li a:before,
                     .blog_container .recent_news_item.tag-sticky-2 .sticky_label
                ',
                'border-color' => '
                    .billing_form .form-group input:focus, .billing_form .form-group .nice_select.open, 
                    .billing_form .form-group .nice_select:focus, .billing_form .select_check .create_box input:focus,
                    .creat_account input[type=checkbox]:checked ~ .check, #payment ul li input[type=radio]:checked:after,
                    .table_footer .main_btn, .widget_recent_comment .media:hover .comment_icon
                ',
            ),
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Secondary Accent Color', 'zix' ),
            'output'      => array(
                'color' => '
                    .team_item .team_contents .team_social li a
                ',
                'background-color' => '
                    .nav-links .prev.page-numbers, .nav-links .next.page-numbers, blockquote, .comments-area .media-body blockquote,
                    .wp-block-button__link, .get_btn.dark, .main_header_area_one .navbar .search_cart .shpping-cart .num,
                    .banner_content .get_btn, .projects_gallery_one .projects_item .hover_content .icon,
                    .team_item .team_contents .team_social li a:hover, .timeline_item:nth-child(even) .timeline_info span,
                    .blockquote, .comment-box .post_author .replay, .comment_form .get_btn, .blog_pagination .page-numbers.prev,
                    .blog_pagination .page-numbers.next, .pricing_info .price_item.active .get_btn, .pricing_info .price_item:hover .get_btn,
                    .creative_btn_two
                ',
                'border-color' => '
                    .pricing_info .price_item.active .get_btn, .pricing_info .price_item:hover .get_btn
                ',
            ),
        ),
        array(
            'id'       => 'accent-gradient',
            'type'     => 'color_gradient',
            'title'    => __('Accent Gradient Color', 'zix'),
            'validate' => 'color',
            'default'  => array(
                'from' => '',
                'to'   => '',
            ),
        ),
       
	)
));

