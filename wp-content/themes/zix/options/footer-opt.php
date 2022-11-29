<?php
$copyright_link = esc_url( 'https://themeforest.net/user/droitthemes/portfolio/' );

Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Footer', 'zix' ),
    'id'                => 'footer',
    'customizer_width'  => '400px',
    'icon'              => 'el el-website'
) );

Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Footer', 'zix' ),
    'id'                => 'footer-options',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(
        array(
            'title'     => esc_html__( 'Footer Column', 'zix' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '3',
            'options'   => array(
                '6' => esc_html__( 'Two Column', 'zix' ),
                '4' => esc_html__( 'Three Column', 'zix' ),
                '3' => esc_html__( 'Four Column', 'zix' ),
            )
        ),

        array(
            'id'        => 'footer_copyright',
            'type'      => 'editor',
            'desc'      => esc_html__( 'You are allowed to write HTML', 'zix' ),
            'title'     => esc_html__( 'Footer Copyright', 'zix' ),
            'default'   => sprintf( '@ Copyright 2020 Zix. Built with <i class="fas fa-heart"></i> by <a href="%s" target="_blank">DroitThemes</a>', $copyright_link )
        ),


    )
) );
Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Footer Style', 'zix' ),
    'id'                => 'footer-style-options',
    'subsection'        => true,
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'id'        => 'widget_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Title Typography', 'zix' ),
            'output'    => 'footer .footer_title'
        ),
        array(
            'id'        => 'widget_text_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Font Typography', 'zix' ),
            'output'    => array( '.footer_widgets .nav-link', '.creative_footer_bottom p a', '.creative_footer_bottom p', '.f_creative_widget_info .textwidget p', '.textwidget ul li', '.textwidget ul li a')
        ),

        array(
            'id'       => 'footer_bg_type',
            'type'     => 'button_set',
            'title'    => __('Footer Background Type', 'zix'),
            'desc'     => __('Select Footer Background Type', 'zix'),
            'options' => array(
                '1' => 'Classic',
                '2' => 'Gradient',
            ),
            'default' => '1'
        ),
        array(
            'id'       => 'footer_bg_gradient',
            'type'     => 'color_gradient',
            'title'    => __('Background Gradient Color', 'zix'),
            'validate' => 'color',
            'default'  => array(
                'from' => '#1e73be',
                'to'   => '#00897e',
            ),
            'required'   => array( 'footer_bg_type', '=', '2' )
        ),
        array(
            'id'        => 'bg_angle',
            'type'      => 'slider',
            'title'     => __('Gradient Angle', 'zix'),
            "default"   => 90,
            "min"       => 1,
            "step"      => 1,
            "max"       => 360,
            'display_value' => 'label',
            'required'   => array( 'footer_bg_type', '=', '2' )
        ),

        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __('Footer Background', 'zix'),
            'subtitle' => __('Footer background with image, color, etc.', 'zix'),
            'output'    => 'footer.footer_bg',
            'default'  => array(
                'background-color' => '#130f38',
            ),
            'required'   => array( 'footer_bg_type', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Overlay Color', 'zix' ),
            'id'        => 'footer_bg_overlay_color',
            'output'    => 'footer.footer_bg:before',
            'type'      => 'color_rgba',
            'mode'      => 'background',
            'required'   => array( 'footer_bg_type', '=', '1' )
        ),

    )
) );

