<?php
Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Services', 'zix' ),
    'id'                => 'services-page',
    'icon'              => 'el el-cog',
    'customizer_width'  => '450px',
    'fields'            => array(
        
        array(
            'id'        => 'service_page_heading',
            'type'      => 'text',
            'title'     => esc_html__( 'Page Title', 'zix' ),
            'default' => 'Our Services'
        ),
        array(
            'title'     => esc_html__( 'Service Slug', 'zix' ),
            'id'        => 'service_slug',
            'type'      => 'text',
            'default'   => 'services'
        ),


        array(
            'title'     => esc_html__( 'Select Background Type', 'zix' ),
            'id'        => 'service_banner_type',
            'type'      => 'select',
            'options'   => [
                'solid'     => esc_html__( 'Background Solid Color', 'zix' ),
                'gradient'  => esc_html__( 'Background Gradient Color', 'zix' ),
                'image'     => esc_html__( 'Background Image', 'zix' ),
            ],
            'default'   => 'image',
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'zix' ),
            'id'        => 'service_banner_bg_color',
            'output'    => '.single-services .breadcrumbs_area',
            'type'      => 'color',
            'mode'      => 'background',
            'required' => array (
                array ( 'service_banner_type', '=', 'solid' ),
            )
        ),
        array(
            'id'       => 'service_titlebar_bg_gradient',
            'type'     => 'color_gradient',
            'title'    => __('Title-bar Gradient Color', 'zix'),
            'subtitle' => __('Only color validation can be done on this field type', 'zix'),
            'desc'     => __('This is the description field, again good for additional info.', 'zix'),
            'validate' => 'color',
            'default'  => array(
                'from' => '#1e73be',
                'to'   => '#00897e',
            ),
            'required' => array (
                array ( 'service_banner_type', '=', 'gradient' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Service Page Title-bar Background', 'zix' ),
            'subtitle'  => esc_html__( 'Upload here the background image for Service page', 'zix' ),
            'id'        => 'service_banner_bg2',
            'type'      => 'media',
            'compiler'  => true,
            'required' => array (
                array ( 'service_banner_type', '=', 'image' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Background Overlay Color', 'zix' ),
            'id'        => 'service_banner_overlay_color',
            'output'    => array('background-color' => '.single-services .breadcrumbs_area:before'),
            'type'      => 'color_rgba',
            'required' => array (
                array ( 'service_banner_type', '=', 'image' ),
            )
        ),
        array(
            'id'        => 'service_page_heading',
            'type'      => 'text',
            'title'     => esc_html__( 'Page Title', 'zix' ),
            'default' => 'Meet Our Team'
        ),
        array(
            'title'         => esc_html__( 'Title font properties', 'zix' ),
            'id'            => 'service_titlebar_title_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.single-services .breadcrumb_content h2',
            'preview'       => array(
                'always_display' => false
            )
        ),
        array(
            'title'         => esc_html__( 'Breadcrumb font properties', 'zix' ),
            'id'            => 'service_breadcrumb_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.single-services .breadcrumb_content .breadcrumb li, .single-services .breadcrumb_content .breadcrumb li a, .single-services .breadcrumb_content .breadcrumb li a:after',
            'preview'       => array(
                'always_display' => false
            )
        ),

    )
) );