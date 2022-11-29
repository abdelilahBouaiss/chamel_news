<?php

Redux::set_section( 'zix_opt', array(
    'title'            => esc_html__( 'Typography Settings', 'zix' ),
    'id'               => 'zix_typo_opt',
    'icon'             => 'dashicons dashicons-editor-textcolor',
    'fields'           => array(

        array(
            'id'        => 'typo_note',
            'type'      => 'info',
            'style'     => 'success',
            'title'     => esc_html__( 'Important Note:', 'zix' ),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => esc_html__( 'This tab contains general typography options. Additional typography options for specific areas can be found within other tabs. Example: For menu typography options go to the Menu Settings tab.', 'zix' )
        ),

        array(
            'id'        => 'body_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for the body text globally.', 'zix' ),
            'description' => sprintf (
                '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                esc_html__( 'You can add your own custom font', 'zix' ),
                get_admin_url(null, 'edit-tags.php?taxonomy=dt_custom_fonts' ),
                esc_html__( 'here.', 'zix' ),
                esc_html__( 'You can get the custom fonts in the Typography\'s Font Family list.', 'zix' )
            ),
            'output'    => 'body'
        ),
    )
));


/*** Headers Typography ***/
Redux::set_section( 'zix_opt', array(
    'title'            => esc_html__( 'Headers Typography', 'zix' ),
    'id'               => 'headers_typo_opt',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'        => 'typo_note_headers',
            'type'      => 'info',
            'style'     => 'success',
            'title'     => esc_html__( 'Important Note:', 'zix' ),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => esc_html__( 'This tab contains general typography options. Additional typography options for specific areas can be found within other tabs. Example: For menu typography options go to the Menu Settings tab.', 'zix' )
        ),

        array(
            'id'        => 'h1_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H1 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H1 Headers.', 'zix' ),
            'output'    => 'h1'
        ),

        array(
            'id'        => 'h2_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H2 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H2 Headers. The h2 title tag used in the most section title.', 'zix' ),
            'output'    => 'h2'
        ),
        array(
            'id'        => 'h3_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H3 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H3 Headers.', 'zix' ),
            'output'    => 'h3'
        ),

        array(
            'id'        => 'h4_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H4 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H4 Headers.', 'zix' ),
            'output'    => 'h4'
        ),

        array(
            'id'        => 'h5_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H5 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H5 Headers.', 'zix' ),
            'output'    => 'h5'
        ),

        array(
            'id'        => 'h6_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H6 Headers Typography', 'zix' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H6 Headers.', 'zix' ),
            'output'    => 'h6'
        ),
    )
));