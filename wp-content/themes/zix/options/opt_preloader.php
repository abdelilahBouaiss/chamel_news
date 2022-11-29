<?php
Redux::set_section( 'zix_opt', array(
    'title'            => esc_html__( 'Preloader Settings', 'zix' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'is_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'zix' ),
            'on'      => esc_html__( 'Enable', 'zix' ),
            'off'     => esc_html__( 'Disable', 'zix' ),
            'default' => true,
        ),

        /**
         * Text Preloader
         */
        array(
            'id'       => 'preloader_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Pre-loader Text', 'zix' ),
            'default'  => get_bloginfo( 'name' ),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),
        array(
            'title'     => esc_html__( 'Color', 'zix' ),
            'id'        => 'preloader_color',
            'type'      => 'color',
            'output'    => array( '#preloader .product_name' ),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),
        array(
            'title'         => esc_html__( 'Typography', 'zix' ),
            'id'            => 'preloader_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => false,
            'output'        => '#preloader .product_name',
            'required'      => array( 'is_preloader', '=', '1' ),
        ),

        array(
            'title'     => esc_html__( 'Border Color', 'zix' ),
            'id'        => 'pre_border_color',
            'type'      => 'color',
            'output'    => array( '.ctn-preloader .animation-preloader .txt-loading .letters-loading:before' ),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'zix' ),
            'id'        => 'pre_bg_color',
            'type'      => 'color',
            'output'    => array('background-color' => '#preloader:after, #preloader:before'),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),

    )
));