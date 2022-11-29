<?php
Redux::set_section( 'zix_opt', array(
    'title'     => esc_html__('Social links', 'zix'),
    'id'        => 'opt_social_links',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(
        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'title' => esc_html__('Facebook', 'zix'),
            'default'	 => ''
        ),
        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'title' => esc_html__('Twitter', 'zix'),
            'default'	  => ''
        ),
        array(
            'id'    => 'vimeo',
            'type'  => 'text',
            'title' => esc_html__('Vimeo', 'zix'),
            'default'	  => ''
        ),
        array(
            'id'    => 'linkedin',
            'type'  => 'text',
            'title' => esc_html__('LinkedIn', 'zix'),
            'default'	 => ''
        ),
        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'title' => esc_html__('Dribbble', 'zix'),
            'default'	  => ''
        ),
        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'title' => esc_html__('Youtube', 'zix'),
            'default'	 => ''
        ),
        array(
            'id'    => 'instagram',
            'type'  => 'text',
            'title' => esc_html__('Instagram', 'zix'),
            'default'	 => ''
        ),
    ),
));