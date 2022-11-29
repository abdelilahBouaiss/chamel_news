<?php

Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Header', 'zix' ),
    'id'                => 'header',
    'customizer_width'  => '400px',
    'icon'              => 'el el-home'
) );

Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Logo', 'zix' ),
    'id'                => 'header-options',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'id'        => 'main_logo',
            'type'      => 'media',
            'title'     => esc_html__( 'Logo', 'zix' ),
            'compiler'  => true,
            'default'   => array(
                'url'   => get_template_directory_uri().'/assets/images/logo.jpg'
            )
        ),
        array(
            'title'     => esc_html__('Sticky header logo', 'zix'),
            'id'        => 'sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => get_template_directory_uri().'/assets/images/logo.jpg'
            )
        ),

        array(
            'title'     => esc_html__('Retina Logo', 'zix'),
            'subtitle'  => esc_html__('The retina logo should be double (2x) of your original logo', 'zix'),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => get_template_directory_uri().'/assets/images/logo-2x.png'
            )
        ),

        array(
            'title'     => esc_html__('Retina Sticky Logo', 'zix'),
            'subtitle'  => esc_html__('The retina logo should be double (2x) of your original logo', 'zix'),
            'id'        => 'retina_sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => get_template_directory_uri().'/assets/images/logo-2x.png'
            )
        ),

        array(
            'id'       => 'zix_logo_dimensions',
            'type'     => 'dimensions',
            'units'    => array('em','px','%'),
            'title'    => __('Logo Dimensions ( Desktop )', 'zix'),
            'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'zix'),
            'output'   => array( '.main_header_area_one .navbar .navbar-brand img' ),
        ),
        array(
            'id'       => 'zix_logo_dimension_mobile',
            'type'     => 'dimensions',
            'units'    => array('em','px','%'),
            'title'    => __('Logo Dimensions ( Mobile )', 'zix'),
            'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'zix'),
            'output'   => array( '.zix_mobile_class .main_header_area_one .navbar .navbar-brand img' ),
        ),
        array(
            'id'             => 'zix_logo_padding',
            'type'           => 'spacing',
            'output'         => array('.main_header_area_one .navbar .navbar-brand img'),
            'mode'           => 'padding',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'title'          => __('Logo Padding', 'zix'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'zix'),
            'default'            => array(
                'padding-top'     => '', 
                'padding-right'   => '', 
                'padding-bottom'  => '', 
                'padding-left'    => '',
                'units'          => 'px',
            )
        )

    )
) );

Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Header Content', 'zix' ),
    'id'                => 'header-content',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'id'        => 'is_header_search',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header search on/off', 'zix' ),
            'default'   => false
        ),
        array(
            'id'        => 'is_mini_cart',
            'type'      => 'switch',
            'title'     => esc_html__( 'Mini Cart on/off', 'zix' ),
            'default'   => false
        ),



    )
) );


Redux::set_section( 'zix_opt', array(
    'title'             => __( 'Page Header', 'zix' ),
    'id'                => 'page-header',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'id'        => 'is_page_header',
            'type'      => 'switch',
            'title'     => esc_html__( 'Page Header on/off', 'zix' ),
            'default'   => true
        ),
        array(
            'id'        => 'is_page_breadcrumb',
            'type'      => 'switch',
            'title'     => esc_html__( 'Page Header Breadcrumb on/off', 'zix' ),
            'default'   => true,
            'required'  => array( 'is_page_header', '=', '1' ),
        ),
        array(
            'id'       => 'page_header_bg_select',
            'type'     => 'select',
            'title'    => __('Select Page Header Option', 'zix'),
            'options'  => array(
                'solid'     => 'Background Solid',
                'gradient'  => 'Background Gradient',
                'image'     => 'Background Image'
            ),
            'required'  => array( 'is_page_header', '=', '1' ),
            'default'  => 'image',
        ),

        array(
            'id'        => 'page_header_image',
            'type'      => 'media',
            'title'     => esc_html__( 'Page Header Image', 'zix' ),
            'required'  => array( 'page_header_bg_select', '=', 'image' ),
            'output'    => array( '.breadcrumbs_area' ),
            'default'   => array(
                'url'   => get_template_directory_uri().'/assets/images/service_bg.jpg'
            )
        ),
        array(
            'id'        => 'page_header_overlay',
            'type'      => 'color_rgba',
            'title'     => esc_html__( 'Page Header Background Overlay Color', 'zix' ),
            'required'  => array( 'page_header_bg_select', '=', 'image' ),
            'output'    => array('background-color' => '.breadcrumbs_area.global_overlay:before')
        ),

        array(
            'id'        => 'page_header_bg_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Page Header Background Solid Color', 'zix' ),
            'required'  => array( 'page_header_bg_select', '=', 'solid' ),
        ),

        array(
            'id'        => 'page_header_bg_gradient_color',
            'type'      => 'color_gradient',
            'title'     => esc_html__( 'Page Header Background Gradient Color', 'zix' ),
            'required'  => array( 
                array( 'is_page_header', '=', '1' ),
                array( 'page_header_bg_select', '=', 'gradient' )
            ),
            'default'   => array(
                'from'  => '#4b0096',
                'to'    => '#8900c6'
            ),
        ),
        array(
            'title'         => esc_html__( 'Title font properties', 'zix' ),
            'id'            => 'zix_titlebar_title_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.breadcrumb_content h2',
            'preview'       => array(
                'always_display' => false
            )
        ),
        array(
            'title'         => esc_html__( 'Breadcrumb font properties', 'zix' ),
            'id'            => 'zix_breadcrumb_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.breadcrumb_content .breadcrumb li, .breadcrumb_content .breadcrumb li a, .breadcrumb_content .breadcrumb li a:after',
            'preview'       => array(
                'always_display' => false
            )
        )

    )
) );

Redux::set_section( 'zix_opt', array(
    'title'             => __( 'Header Top Bar', 'zix' ),
    'id'                => 'header_topbar',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(
        array(
            'id'        => 'is_header_top',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Top on/off', 'zix' ),
            'default'   => true
        ),
        array(
            'id'        => 'phone_number',
            'type'      => 'text',
            'title'     => esc_html__( 'Phone Number', 'zix' ),
            'default'   => '0123456789',
            'required'  => array( 'is_header_top', '=', '1' )
        ),
        array(
            'id'        => 'email_address',
            'type'      => 'text',
            'title'     => esc_html__( 'Email Address', 'zix' ),
            'default'   => 'user@domainname.com',
            'required'  => array( 'is_header_top', '=', '1' )
        ),
        array(
            'id'        => 'header_top_social',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Top Social Profile on/off', 'zix' ),
            'subtitle'  => esc_html__( 'Fillup sicial link from Zix Options > Sicial Links', 'zix' ),
            'default'   => true,
            'required'  => array( 'is_header_top', '=', '1' )
        ),

    )
) );


Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Menu Settings', 'zix' ),
    'id'                => 'menu-settings',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'id'        => 'menu_typography_options',
            'type'      => 'typography',
            'title'     => esc_html__( 'Menu Typography', 'zix' ),
            'output'    => array( '.main_header_area_one .navbar .menu > .nav-item .nav-link' )
        ),

        array(
            'id'        => 'menu_hover_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Menu Hover Color', 'zix' ),
            'default'   => '',
            'output'    => array(
                'color'   => '.navbar .menu > .nav-item.submenu:hover .nav-link',
            )
        ),
        array(
            'id'        => 'menu_hover_border_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Menu Hover Border Color', 'zix' ),
            'default'   => '',
            'output'    => array(
                'background-color'   => '.navbar .menu > .nav-item > .nav-link:before',
            )
        ),
        array(
            'id'        => 'sticky_menu_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Sticky Menu Color', 'zix' ),
            'default'   => '',
            'output'    => array(
                'color'   => 'header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item > .nav-link',
            )
        ),
        array(
            'id'        => 'sticky_menu_hover_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Sticky Menu Hover Color', 'zix' ),
            'default'   => '',
            'output'    => array(
                'color'   => 'header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item > .nav-link:hover, header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item.active > .nav-link',
            )
        ),
        array(
            'id'        => 'sticky_menu_hover_border_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Sticky Menu Hover Border Color', 'zix' ),
            'default'   => '',
            'output'    => array(
                'background-color'   => 'header.navbar_fixed.main_header_area_one .navbar .menu > .nav-item .nav-link:before',
            )
        ),

    )
) );