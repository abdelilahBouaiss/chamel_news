<?php
// Shop page
Redux::set_section( 'zix_opt', array(
    'title'            => esc_html__( 'Shop Settings', 'zix' ),
    'id'               => 'shop_opt',
    'icon'             => 'dashicons dashicons-cart',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Title bar background', 'zix' ),
            'subtitle'  => esc_html__( 'Upload image file as Shop page title bar background', 'zix' ),
            'id'        => 'shop_header_bg',
            'type'      => 'media',
        ),
        array(
            'title'     => esc_html__( 'Page title', 'zix' ),
            'subtitle'  => esc_html__( 'Give here the shop page title', 'zix' ),
            'desc'      => esc_html__( 'This text will show on the shop page banner', 'zix' ),
            'id'        => 'shop_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Shop', 'zix' ),
        ),
        array(
            'id'        => 'shop_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Shop Page Titlebar Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for the Shop page.', 'zix' ),
            'output'    => '.woocommerce .breadcrumb_content h2'
        ),
        array(
            'id'        => 'shop_breadcrumb_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Shop Page Breadcrumb Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for the Shop page Breadcrumb.', 'zix' ),
            'output'    => '.woocommerce .breadcrumb_content .breadcrumb li, .woocommerce .breadcrumb_content .breadcrumb li a, .woocommerce .breadcrumb_content .breadcrumb li a:after'
        ),
        array(
            'title'     => esc_html__( 'Layout', 'zix' ),
            'subtitle'  => esc_html__( 'Select the product view layout', 'zix' ),
            'id'        => 'shop_layout',
            'type'      => 'image_select',
            'options'   => array(
                'shop_list' => array(
                    'alt' => esc_html__( 'List Layout', 'zix' ),
                    'img' => ZIX_DIR_ASSETS.'/images/layouts/list.jpg'
                ),
                'shop_grid' => array(
                    'alt' => esc_html__( 'Grid Layout', 'zix' ),
                    'img' => ZIX_DIR_ASSETS.'/images/layouts/grid-2.jpg'
                ),
            ),
            'default' => 'shop_grid'
        ),
        array(
            'title'     => esc_html__( 'Sidebar', 'zix' ),
            'subtitle'  => esc_html__( 'Select the sidebar position of Shop page', 'zix' ),
            'id'        => 'shop_sidebar',
            'type'      => 'image_select',
            'options'   => array(
                'left' => array(
                    'alt' => esc_html__( 'Left Sidebar', 'zix' ),
                    'img' => ZIX_DIR_ASSETS.'/images/layouts/sidebar_left.jpg'
                ),
                'right' => array(
                    'alt' => esc_html__( 'Right Sidebar', 'zix' ),
                    'img' => ZIX_DIR_ASSETS.'/images/layouts/sidebar_right.jpg',
                ),
                'full' => array(
                    'alt' => esc_html__( 'Full Width', 'zix' ),
                    'img' => ZIX_DIR_ASSETS.'/images/layouts/fullwidth.png',
                ),
            ),
            'default' => 'left'
        ),

    ),
));


// Product Single Options
Redux::set_section( 'zix_opt', array(
    'title'            => esc_html__( 'Product Single', 'zix' ),
    'id'               => 'product_single_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Related Products Title', 'zix' ),
            'id'        => 'related_products_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Related products', 'zix' ),
        ),

    )
));