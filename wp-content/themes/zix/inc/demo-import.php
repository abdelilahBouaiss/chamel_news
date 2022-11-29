<?php

/* One Click Demo Import*/
add_filter( 'pt-ocdi/import_files', 'zix_import_files' );
function zix_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Main Demo (All Pages Included)', 'zix' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/widget.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/preview.png',
            'import_notice'                => wp_kses_post( '<img src="'.trailingslashit( get_template_directory_uri() ).'inc/demos/preview.jpg'.'" alt="demo preview">' ),
            'preview_url'                  => 'https://preview.droitthemes.net/wp/zix/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/settings.json',
                    'option_name' => 'zix_opt',
                ),
            ),
        ),


    );
}


function zix_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Studio' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );

    // Set the home page and blog page
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'zix_after_import_setup' );

