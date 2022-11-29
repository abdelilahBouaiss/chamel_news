<?php
Redux::set_section( 'zix_opt', array(
    'title'             => esc_html__( '404 Page', 'zix' ),
    'id'                => 'error-page',
    'icon'              => 'el el-warning-sign',
    'customizer_width'  => '450px',
    'fields'            => array(
        
        array(
            'id'        => 'heading_404',
            'type'      => 'text',
            'title'     => esc_html__( 'Error Header Heading', 'zix' ),
            'default'   => esc_html__( '404 Error', 'zix' )
        ),

        array(
            'id'        => 'error_heading',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Error Heading', 'zix' ),
            'description'=> esc_html__( 'You can use <span> tag for color & small font', 'zix' ),
            'default'   => __( '4<span>0</span>4', 'zix' )
        ),

        array(
            'id'        => 'error_subheading',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Error Subheading', 'zix' ),
            'description'=> esc_html__( 'You can use <span> tag for color & UPPERCASE font', 'zix' ),
            'default'   => __( '<span>Oh no!</span> There\'s not Much Left Here for you', 'zix' )
        ),

        array(
            'id'        => 'error_description',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Error Description Text', 'zix' ),
            'desc'      => esc_html__( 'Write something like get back to a link or visit our homepage' ,'zix')
        ),

    )
) );