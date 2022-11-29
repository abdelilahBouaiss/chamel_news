<?php
Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__( 'Blog settings', 'zix' ),
    'id'        => 'blog_page',
    'icon'      => 'dashicons dashicons-admin-post',
));


Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__( 'Title-bar', 'zix' ),
    'id'        => 'blog_titlebar_settings',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Select Background Type', 'zix' ),
            'id'        => 'background_type',
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
            'id'        => 'blog_banner_bg_color',
            'output'    => '.blog .breadcrumbs_area',
            'type'      => 'color',
            'mode'      => 'background',
            'required' => array (
                array ( 'background_type', '=', 'solid' ),
            )
        ),
        array(
            'id'       => 'blog_titlebar_bg_gradient',
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
                array ( 'background_type', '=', 'gradient' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Blog Page Title-bar Background', 'zix' ),
            'subtitle'  => esc_html__( 'Upload here the background image for Blog page', 'zix' ),
            'id'        => 'blog_banner_bg2',
            'type'      => 'media',
            'compiler'  => true,
            'required' => array (
                array ( 'background_type', '=', 'image' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Background Overlay Color', 'zix' ),
            'id'        => 'blog_banner_overlay_color',
            'output'    => array('background-color' => '.blog .breadcrumbs_area:before'),
            'type'      => 'color_rgba',
            'required' => array (
                array ( 'background_type', '=', 'image' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Blog page title', 'zix' ),
            'subtitle'  => esc_html__( 'Controls the title text that displays in the page title bar only if your front page displays your latest post in "Settings > Reading".', 'zix' ),
            'id'        => 'blog_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Blog List', 'zix' )
        ),
        array(
            'title'         => esc_html__( 'Title font properties', 'zix' ),
            'id'            => 'blog_titlebar_title_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.blog .breadcrumb_content h2',
            'preview'       => array(
                'always_display' => false
            )
        ),
    )
));


Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__( 'Header', 'zix' ),
    'id'        => 'blog_navbar',
    'icon'      => '',
    'subsection'=> true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Menu Item Color', 'zix' ),
            'subtitle'  => esc_html__( 'Menu item font color', 'zix' ),
            'id'        => 'blog_menu_font_color',
            'output'    => '.blog .header_area .navbar .navbar-nav .menu-item a',
            'type'      => 'color',
        ),
        array(
            'title'     => esc_html__( 'Use Sticky Logo Only', 'zix' ),
            'subtitle'  => esc_html__( 'Use only the sticky logo on normal and sticky mode instead of the two different logos in the blog page.', 'zix' ),
            'id'        => 'is_blog_sticky_logo',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'zix' ),
            'off'       => esc_html__( 'No', 'zix' ),
            'default'   => '1',
        ),
    )
));


Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__( 'Blog archive', 'zix' ),
    'id'        => 'blog_meta_opt',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Blog Layout', 'zix' ),
            'subtitle'  => esc_html__( 'The Blog layout will also apply on the blog category and tag pages.', 'zix' ),
            'id'        => 'select_blog_layout',
            'type'      => 'image_select',
            'options'   => array(
                'right'     => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/sidebar_right.jpg'
                ),
                'left'      => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/sidebar_left.jpg'
                ),
                'full'      => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/list.jpg'
                ),
                
            ),
            'default' => 'right'
        ),
        array(
            'title'     => esc_html__( 'Posts Layout', 'zix' ),
            'subtitle'  => esc_html__( 'The Posts layout will also apply on the blog category and tag pages.', 'zix' ),
            'id'        => 'blog_style_select',
            'type'      => 'image_select',
            'options'   => array(
                'full'      => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/list.jpg'
                ),
                'grid'    => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/grid-2.jpg'
                ),
                'masonry'    => array(
                    'img'   => ZIX_DIR_IMG . '/layouts/grid-3.jpg'
                ),
            ),
            'default' => 'right'
        ),
        array(
            'title'     => esc_html__( 'Column', 'zix' ),
            'id'        => 'blog_column',
            'type'      => 'select',
            'options'   => [
                '6' => esc_html__( 'Two', 'zix' ),
                '4' => esc_html__( 'Three', 'zix' ),
                '3' => esc_html__( 'Four', 'zix' ),
            ],
            'default'   => '6',
            'required' => array (
                array ( 'blog_style_select', '=', array( 'grid', 'masonry' ) ),
            )
        ),
        array(
            'title'     => esc_html__( 'Post title length', 'zix' ),
            'subtitle'  => esc_html__( 'Blog post title length in character', 'zix' ),
            'id'        => 'post_title_length',
            'type'      => 'slider',
            'default'   => 20,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text',
            'required' => array (
                array ( 'blog_style_select', '=', array( 'grid', 'masonry' ) ),
            )
        ),
        array(
            'title'     => esc_html__( 'Post word excerpt', 'zix' ),
            'subtitle'  => esc_html__( 'If post excerpt empty, the excerpt content will take from the post content. Define here how much word you want to show along with the each posts in the blog page.', 'zix' ),
            'id'        => 'blog_excerpt',
            'type'      => 'slider',
            'default'   => 40,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text'
        ),
        array(
            'title'     => esc_html__( 'Read More Text', 'zix' ),
            'id'        => 'read_more_text',
            'type'      => 'text',
            'default'   => 'Read More',
        ),
        array(
            'title'     => esc_html__( 'Post date', 'zix' ),
            'id'        => 'is_post_date',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Post Comment Count', 'zix' ),
            'id'        => 'is_post_comment_count',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Post Author', 'zix' ),
            'id'        => 'is_post_author',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
    )
));


Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__( 'Blog single', 'zix' ),
    'id'        => 'blog_single_opt',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Post Tag', 'zix' ),
            'id'        => 'is_post_tag',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1'
        ),
        array(
            'title'     => esc_html__( 'Categories', 'zix' ),
            'id'        => 'is_single_cats',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Author Bio', 'zix' ),
            'id'        => 'is_author_bio',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Comment Count Text', 'zix' ),
            'id'        => 'is_single_comment_meta',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Post Date', 'zix' ),
            'id'        => 'is_single_post_date',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'zix' ),
            'off'       => esc_html__( 'Hide', 'zix' ),
            'default'   => '1',
        )

    )
));

