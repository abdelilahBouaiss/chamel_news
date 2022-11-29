<?php
Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( 'Team', 'zix' ),
    'id'                => 'team-opt',
    'icon'              => 'el el-group',
    'customizer_width'  => '450px',
    'fields'            => array(

        array(
            'title'     => esc_html__( 'Team Slug', 'zix' ),
            'id'        => 'team_slug',
            'type'      => 'text',
            'default'   => 'team'
        ),
        array(
            'title'     => esc_html__( 'Select Background Type', 'zix' ),
            'id'        => 'team_banner_type',
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
            'id'        => 'team_banner_bg_color',
            'output'    => '.single-team .breadcrumbs_area',
            'type'      => 'color',
            'mode'      => 'background',
            'required' => array (
                array ( 'team_banner_type', '=', 'solid' ),
            )
        ),
        array(
            'id'       => 'team_titlebar_bg_gradient',
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
                array ( 'team_banner_type', '=', 'gradient' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Team Page Title-bar Background', 'zix' ),
            'subtitle'  => esc_html__( 'Upload here the background image for Team page', 'zix' ),
            'id'        => 'team_banner_bg2',
            'type'      => 'media',
            'compiler'  => true,
            'required' => array (
                array ( 'team_banner_type', '=', 'image' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Background Overlay Color', 'zix' ),
            'id'        => 'team_banner_overlay_color',
            'output'    => array('background-color' => '.single-team .breadcrumbs_area:before'),
            'type'      => 'color_rgba',
            'required' => array (
                array ( 'team_banner_type', '=', 'image' ),
            )
        ),
        array(
            'id'        => 'team_page_heading',
            'type'      => 'text',
            'title'     => esc_html__( 'Page Title', 'zix' ),
            'default' => 'Meet Our Team'
        ),
        array(
            'title'         => esc_html__( 'Title font properties', 'zix' ),
            'id'            => 'team_titlebar_title_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.single-team .breadcrumb_content h2',
            'preview'       => array(
                'always_display' => false
            )
        ),
        array(
            'title'         => esc_html__( 'Breadcrumb font properties', 'zix' ),
            'id'            => 'team_breadcrumb_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.single-team .breadcrumb_content .breadcrumb li, .single-team .breadcrumb_content .breadcrumb li a, .single-team .breadcrumb_content .breadcrumb li a:after',
            'preview'       => array(
                'always_display' => false
            )
        ),
    )
) );