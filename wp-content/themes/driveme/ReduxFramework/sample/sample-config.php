<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    // Uncomment to disable demo mode.
    Redux::disable_demo();  // phpcs:ignore Squiz.PHP.CommentedOutCode


    // Background Patterns Reader
    $sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
    $sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Driveme Options', 'driveme' ),
        'page_title'           => __( 'Driveme Options', 'driveme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        // 'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'driveme' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'driveme' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'driveme' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'driveme' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'driveme' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'driveme' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'driveme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'driveme' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'driveme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'driveme' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'driveme' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    

Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'driveme'),
                'fields' => array( 

                    array(
                        'id' => 'rtl_settings',
                        'type' => 'switch',
                        'title' => __('RTL Settings', 'driveme'),
                        'desc' => '',
                        'default' => ''
                    ),

                    array(
                        'id' => 'google_id',
                        'type' => 'textarea',
                        'title' => __('Google Analytics Code javascript', 'driveme'),
                        'subtitle' => __('Input Javascript Code', 'driveme'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'seo_des',
                        'type' => 'textarea',
                        'title' => __('SEO Description', 'driveme'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'seo_key',
                        'type' => 'textarea',
                        'title' => __('SEO Keywords', 'driveme'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => ''
                    ),
					array(
                        'id' => 'theme_preloader',
                        'type' => 'switch',
                        'title' => __('Preloader', 'driveme'),
                        'desc' => '',
                        'default' => false,
						'on'=>'Enabled',
						'off'=>'Disabled',
                    ),
 
                )
            ) );
            
            Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-picture',
                'title' => __('Logo & Favicon Settings', 'driveme'),
                'fields' => array(
                    array(
                        'id'       => 'logo_style',
                        'type'     => 'select',
                        'title'    => __('Select Style Logo', 'driveme'), 
                        'subtitle' => __('You can choose style Logo is Text Or Images', 'driveme'),
                        'desc'     => __('Select Style Logo', 'driveme'),
                        // Must provide key => value pairs for select options
                        'options'  => array(
                        'text' => 'Text',
                        'image' => 'Images',
                        ),
                        'default'  => 'image',
                    ),
                    array(
                        'id' => 'logo_text',
                        'type' => 'text',
                        'title' => __('Text Of Logo', 'driveme'),
                        'subtitle' => __('Text Of Logo Theme.Ex: driveme', 'driveme'),
                        'desc' => '',
                        'default' => 'driveme'
                    ),  
                    array(
                        'id' => 'logo_image',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo', 'driveme'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your logo.', 'driveme'),
                        'subtitle' => __('Recommended size: Height: 80px and Width: 100px', 'driveme'),
                        'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
                    ),  
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Custom Favicon', 'driveme'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Favicon.', 'driveme'),
                        'subtitle' => '',
                        'default' => array('url' => get_template_directory_uri().'/favicon.ico'),
                    ),                  
                    array(
                        'id' => 'apple_icon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 57x57', 'driveme'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 57x57.', 'driveme'),
                        'subtitle' => '',
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon.png'),
                    ),                  
                    array(
                        'id' => 'apple_icon_72',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 72x72', 'driveme'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 72x72.', 'driveme'),
                        'subtitle' => '',
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-72x72.png'),
                    ),
                    array(
                        'id' => 'apple_icon_114',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 114x114', 'driveme'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 114x114.', 'driveme'),
                        'subtitle' => '',
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-114x114.png'),
                    ),                      
                )
            ) );
            
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Blog Settings', 'driveme'),
                'fields' => array(
                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog Title', 'driveme'),
                        'subtitle' => __('Input Blog Title', 'driveme'),
                        'desc' => '',
                        'default' => 'Our Blog'
                    ),      
                    array(
                        'id' => 'blog_subtitle',
                        'type' => 'text',
                        'title' => __('Blog Subtitle', 'driveme'),
                        'subtitle' => __('Input Blog Subtitle', 'driveme'),
                        'desc' => '',
                        'default' => 'Lessons From just $20 Per Hour or 5 Lessons for $120 or 10 Hours For $180'
                    ),
                    array(
                        'id' => 'blog_by',
                        'type' => 'text',
                        'title' => __('Blog by', 'driveme'),
                        'subtitle' => __('Text By', 'driveme'),
                        'desc' => '',
                        'default' => 'By'
                    ),  
                    array(
                        'id' => 'blog_excerpt',
                        'type' => 'text',
                        'title' => __('Blog custom excerpt leng', 'driveme'),
                        'subtitle' => __('Input Blog custom excerpt leng', 'driveme'),
                        'desc' => '',
                        'default' => '30'
                    ),  
                    array(
                        'id' => 'blog_readmore',
                        'type' => 'text',
                        'title' => __('Blog Read More', 'driveme'),
                        'subtitle' => __('Read More', 'driveme'),
                        'desc' => '',
                        'default' => 'Read More'
                    ),  
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Courses Settings', 'driveme'),
                'fields' => array(
                    array(
                        'id' => 'courses_booknow',
                        'type' => 'text',
                        'title' => __('Text of button Book Now', 'driveme'),
                        'subtitle' => __('Book Now', 'driveme'),
                        'desc' => '',
                        'default' => 'Book Now'
                    ),
                    array(
                        'id' => 'courses_watchvideo',
                        'type' => 'text',
                        'title' => __('Text of button Watch Video', 'driveme'),
                        'subtitle' => __('Watch Video', 'driveme'),
                        'desc' => '',
                        'default' => 'Watch Video'
                    ),
                    array(
                        'id' => 'courses_releated',
                        'type' => 'text',
                        'title' => __('Text of Section Releated', 'driveme'),
                        'subtitle' => __('Releated Courses', 'driveme'),
                        'desc' => '',
                        'default' => 'Releated Courses'
                    ),
                    array(
                        'id' => 'courses_detail',
                        'type' => 'text',
                        'title' => __('Text Detail of section Releated.', 'driveme'),
                        'subtitle' => __('Text Detail', 'driveme'),
                        'desc' => '',
                        'default' => 'Detail'
                    ),
                    array(
                        'id' => 'courses_apply',
                        'type' => 'text',
                        'title' => __('Text Apply Now of section Releated.', 'driveme'),
                        'subtitle' => __('Apply Now', 'driveme'),
                        'desc' => '',
                        'default' => 'Apply Now'
                    ),
                     array(
                        'id' => 'courses_choose',
                        'type' => 'text',
                        'title' => __('Text Choose plan of block price.', 'driveme'),
                        'subtitle' => __('Apply Now', 'driveme'),
                        'desc' => '',
                        'default' => 'CHOOSE PLAN'
                    ),
                    array(
                        'id' => 'courses_number',
                        'type' => 'text',
                        'title' => __('Number of post Courses Do you want.', 'driveme'),
                        'subtitle' => __('Number: Ex 6', 'driveme'),
                        'desc' => '',
                        'default' => '6'
                    ),
                    array(
                        'id' => 'courses_title',
                        'type' => 'text',
                        'title' => __('Courses Title', 'driveme'),
                        'subtitle' => __('Input Courses Title', 'driveme'),
                        'desc' => '',
                        'default' => 'Our Courses'
                    ),      
                    array(
                        'id' => 'courses_subtitle',
                        'type' => 'text',
                        'title' => __('Courses Subtitle', 'driveme'),
                        'subtitle' => __('Input Courses Subtitle', 'driveme'),
                        'desc' => '',
                        'default' => 'Lessons From just $20 Per Hour or 5 Lessons for $120 or 10 Hours For $180'
                    ),
                    array(
                        'id' => 'courses_excerpt',
                        'type' => 'text',
                        'title' => __('Courses Number Excerpt in Booking Sidebar.', 'driveme'),
                        'subtitle' => __('Input Courses Number', 'driveme'),
                        'desc' => '',
                        'default' => '15'
                    ), 
                    array(
                        'id' => 'courses_linksearch',
                        'type' => 'text',
                        'title' => __('Link of page Search Courses.', 'driveme'),
                        'subtitle' => __('Ex: http://localhost/driveme/?page_id=40', 'driveme'),
                        'desc' => '',
                        'default' => 'http://vergatheme.com/demosd/driveme/?page_id=40'
                    ),
                    array(
                        'id' => 'courses_linkbooking',
                        'type' => 'text',
                        'title' => __('Link of page Booking Courses.', 'driveme'),
                        'subtitle' => __('Exx: http://localhost/driveme/?page_id=89', 'driveme'),
                        'desc' => '',
                        'default' => 'http://vergatheme.com/demosd/driveme/?page_id=89'
                    ),array(
                        'id' => 'courses_slug',
                        'type' => 'text',
                        'title' => __('Url slug for Courses.', 'driveme'),
                        'subtitle' => __('Url Slug', 'driveme'),
                        'desc' => '',
                        'default' => 'courses'
                    )
                 )
            ) );

            Redux::set_section( $opt_name, array(
                'icon'   => 'el-icon-usd',
                'title'  => __( 'Payments Settings', 'driveme' ),
                'fields' => array(
                    array(
                        'id'       => 'payment_enabled',
                        'type'     => 'checkbox',
                        'title'    => __( 'Allowed Payment Methods', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'stripe'  => 'Credit Cards via Stripe',
                            'paypal'  => 'PayPal',
                            'offline' => 'Offline Payment'
                        ),
                        'default'  => array(
                            'stripe'  => '1',
                            'paypal'  => '1',
                            'offline' => '1'
                        )
                    ),

                    array(
                        'id'       => 'payment_currency',
                        'type'     => 'text',
                        'title'    => __( 'Currency', 'driveme' ),
                        'subtitle' => __( 'ISO 4217 3 letters code (e.g. USD)', 'driveme' ),
                        'desc'     => '',
                        'default'  => 'USD'
                    ),
                    array(
                        'id'       => 'sku_prfx',
                        'type'     => 'text',
                        'title'    => __( 'SKU prefix', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'DRVM'
                    ),

                    array(
                        'id'       => 'section-start1',
                        'type'     => 'section',
                        'title'    => __( 'Credit Card - Stripe', 'driveme' ),
                        'subtitle' => __( 'You can find keys under "API Keys" tab of your Stripe Account settings', 'driveme' ),
                        'indent'   => true
                    ),
                    array(
                        'id'       => 'payment_cc_sk_test',
                        'type'     => 'text',
                        'title'    => __( 'Test Secret Key', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'payment_cc_pk_test',
                        'type'     => 'text',
                        'title'    => __( 'Test Publishable Key', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'      => 'payment_cc_testmode',
                        'type'    => 'switch',
                        'title'   => __( 'Test Mode', 'driveme' ),
                        'default' => true
                    ),
                    array(
                        'id'       => 'payment_cc_sk',
                        'type'     => 'text',
                        'title'    => __( 'Live Secret Key', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'payment_cc_pk',
                        'type'     => 'text',
                        'title'    => __( 'Live Publishable Key', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'payment_cc_button',
                        'type'     => 'text',
                        'title'    => __( 'Text for button', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'Proceed'
                    ),
                    array(
                        'id'       => 'payment_cc_note',
                        'type'     => 'textarea',
                        'title'    => __( 'Note for User', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'Payments powered by stripe.com. No card information is stored on this server.'
                    ),
                    array(
                        'id'     => 'section-end1',
                        'type'   => 'section',
                        'indent' => false
                    ),
                    array(
                        'id'       => 'section-start2',
                        'type'     => 'section',
                        'title'    => __( 'PayPal', 'driveme' ),
                        'subtitle' => '',
                        'indent'   => true
                    ),
                    array(
                        'id'      => 'payment_pp_sandbox',
                        'type'    => 'switch',
                        'title'   => __( 'Sandbox Mode', 'driveme' ),
                        'default' => true
                    ),
                    array(
                        'id'       => 'payment_pp_email',
                        'type'     => 'text',
                        'validate' => 'email',
                        'title'    => __( 'PayPal Account Email', 'driveme' ),
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'payment_pp_button',
                        'type'     => 'text',
                        'title'    => __( 'Text for button', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'Proceed'
                    ),
                    array(
                        'id'       => 'payment_pp_note',
                        'type'     => 'textarea',
                        'title'    => __( 'Note for User', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'     => 'section-end2',
                        'type'   => 'section',
                        'indent' => false
                    ),
                    array(
                        'id'       => 'section-start3',
                        'type'     => 'section',
                        'title'    => __( 'Offline Payment', 'driveme' ),
                        'subtitle' => '',
                        'indent'   => true
                    ),
                    array(
                        'id'       => 'payment_off_button',
                        'type'     => 'text',
                        'title'    => __( 'Text for button', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'Send Request'
                    ),
                    array(
                        'id'       => 'payment_off_note',
                        'type'     => 'textarea',
                        'title'    => __( 'Note for User', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => 'We will contact you after submitting.'
                    ),
                    array(
                        'id'     => 'section-end3',
                        'type'   => 'section',
                        'indent' => false
                    ),
                    array(
                        'id'       => 'section-start4',
                        'type'     => 'section',
                        'title'    => __( 'Messages & Notifications', 'driveme' ),
                        'indent'   => true
                    ),
                    array(
                        'id'       => 'payment_msg_success',
                        'type'     => 'textarea',
                        'title'    => __( 'Success Payment Message', 'driveme' ),
                        'default'  => 'Payment was successfully transferred. We will contact you as soon as possible during our working hours.'
                    ),
                    array(
                        'id'       => 'payment_msg_cancel',
                        'type'     => 'textarea',
                        'title'    => __( 'Cancel Payment Message', 'driveme' ),
                        'default'  => 'Payment attempt was failed. Please try again.'
                    ),
                    array(
                        'id'       => 'payment_msg_contact',
                        'type'     => 'textarea',
                        'title'    => __( 'Success Offline Request Message', 'driveme' ),
                        'default'  => 'Your contact information was successfully stored. We will contact you as soon as possible during our working hours.'
                    ),
                    array(
                        'id'       => 'notification_email',
                        'type'     => 'text',
                        'validate' => 'email',
                        'title'    => __( 'Notification Email', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'notification_subject',
                        'type'     => 'text',
                        'title'    => __( 'Notification Email Subject', 'driveme' ),
                        'subtitle' => '',
                        'desc'     => 'You can use same variables as in Notification Email Body',
                        'default'  => 'Payment or Request notification from %email%'
                    ),
                    array(
                        'id'       => 'notification_body',
                        'type'     => 'textarea',
                        'title'    => __( 'Notification Email Body', 'driveme' ),
                        'desc'     => 'Variables: %stamp%, %firstname%, %lastname%, %phone%, %email%, %course%, %date%, %message%, %processor%, %paid%, %amount%, %transaction%, %payment_raw%',
                        'default'  =>
                            implode(PHP_EOL, array(
                                'Payment/request info:',
                                '',
                                'When: %stamp%',
                                '',
                                'First Name: %firstname%',
                                'Last Name: %lastname%',
                                'Phone: %phone%',
                                'Email: %email%',
                                'Course: %course%',
                                'Date: %date%',
                                'Message:',
                                '%message%',
                                '',
                                'Processor: %processor%',
                                'Paid: %paid%',
                                'Mode: %mode%',
                                'Amount: %amount%',
                                'Transaction ID: %transaction%'
                            ))
                    ),
                    array(
                        'id'     => 'section-end4',
                        'type'   => 'section',
                        'indent' => false
                    ),
                )
            ));
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Gallery Settings', 'driveme'),
                'fields' => array(
                    array(
                        'id' => 'gallery_title',
                        'type' => 'text',
                        'title' => __('Gallery Title', 'driveme'),
                        'subtitle' => __('Input Gallery Title', 'driveme'),
                        'desc' => '',
                        'default' => 'Photo Gallery'
                    ),
                    array(
                        'id' => 'gallery_subtitle',
                        'type' => 'text',
                        'title' => __('Gallery Subtitle', 'driveme'),
                        'subtitle' => __('Input Gallery Subtitle', 'driveme'),
                        'desc' => '',
                        'default' => 'See our Photos and enoying times'
                    ),
                    array(
                        'id' => 'gallery_all',
                        'type' => 'text',
                        'title' => __('Gallery Show All', 'driveme'),
                        'subtitle' => __('Input Gallery Show all', 'driveme'),
                        'desc' => '',
                        'default' => 'All'
                    ),
                    array(
                        'id' => 'gallery_in',
                        'type' => 'text',
                        'title' => __('Gallery In', 'driveme'),
                        'subtitle' => __('Input Gallery Text In.', 'driveme'),
                        'desc' => '',
                        'default' => 'in'
                    ),
                    array(
                        'id' => 'gallery_one',
                        'type' => 'text',
                        'title' => __('Number post Gallery Do you want show.', 'driveme'),
                        'subtitle' => __('Input Gallery number.', 'driveme'),
                        'desc' => '',
                        'default' => '12'
                    ),
                    array(
                        'id' => 'gallery_two',
                        'type' => 'text',
                        'title' => __('Number post Gallery 2 Column Do you want show.', 'driveme'),
                        'subtitle' => __('Input Gallery number.', 'driveme'),
                        'desc' => '',
                        'default' => '4'
                    ),
                    array(
                        'id' => 'gallery_three',
                        'type' => 'text',
                        'title' => __('Number post Gallery 3 Column Do you want show.', 'driveme'),
                        'subtitle' => __('Input Gallery number.', 'driveme'),
                        'desc' => '',
                        'default' => '6'
                    ),
                    array(
                        'id' => 'gallery_five',
                        'type' => 'text',
                        'title' => __('Number post Gallery 5 Column Do you want show.', 'driveme'),
                        'subtitle' => __('Input Gallery number.', 'driveme'),
                        'desc' => '',
                        'default' => '10'
                    ),
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Inspectors Settings', 'driveme'),
                'fields' => array(
                    
                    array(
                        'id' => 'inspectors_title',
                        'type' => 'text',
                        'title' => __('Inspectors Title', 'driveme'),
                        'subtitle' => __('Input Inspectors Title', 'driveme'),
                        'desc' => '',
                        'default' => 'Course inspectors'
                    ),      
                    array(
                        'id' => 'inspectors_subtitle',
                        'type' => 'text',
                        'title' => __('Inspectors Subtitle', 'driveme'),
                        'subtitle' => __('Input Inspectors Subtitle', 'driveme'),
                        'desc' => '',
                        'default' => 'Lessons From just $20 Per Hour or 5 Lessons for $120 or 10 Hours For $180'
                    ),
                    array(
                        'id' => 'inspectors_number',
                        'type' => 'text',
                        'title' => __('Number post Teacher Do you want show.', 'driveme'),
                        'subtitle' => __('Input Inspectors number.', 'driveme'),
                        'desc' => '',
                        'default' => '4'
                    ),
                    array(
                        'id' => 'inspectors_excerpt',
                        'type' => 'text',
                        'title' => __('The Excerpt Teacher Do you want show in Sidebar Courses.', 'driveme'),
                        'subtitle' => __('Input Inspectors number.', 'driveme'),
                        'desc' => '',
                        'default' => '20'
                    ),
                    array(
                        'id' => 'inspectors_gallery',
                        'type' => 'text',
                        'title' => __('Number Post Teacher Do you want show in Sidebar Courses.', 'driveme'),
                        'subtitle' => __('Input Inspectors number.', 'driveme'),
                        'desc' => '',
                        'default' => '3'
                    ),
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Booking Sidebar Settings', 'driveme'),
                'fields' => array(
                    
                    array(
                        'id' => 'booking_title1',
                        'type' => 'text',
                        'title' => __('Booking Title When Where', 'driveme'),
                        'subtitle' => __('Input Booking Title', 'driveme'),
                        'desc' => '',
                        'default' => 'WHEN & WHERE'
                    ), 
                    array(
                        'id' => 'booking_title2',
                        'type' => 'text',
                        'title' => __('Booking Title Need ASSISTANCE ?', 'driveme'),
                        'subtitle' => __('Input Booking Title', 'driveme'),
                        'desc' => '',
                        'default' => 'Need ASSISTANCE ?'
                    ),     
                    array(
                        'id' => 'booking_subtitle',
                        'type' => 'text',
                        'title' => __('Booking Subtitle of Need ASSISTANCE.', 'driveme'),
                        'subtitle' => __('Input Text Subtitle', 'driveme'),
                        'desc' => '',
                        'default' => 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicit udin, lorem quis bibendum auctor, 90 850 876 2345'
                    ),
                    array(
                        'id' => 'booking_number',
                        'type' => 'text',
                        'title' => __('Phone Number of you.', 'driveme'),
                        'subtitle' => __('Input Phone number.', 'driveme'),
                        'desc' => '',
                        'default' => '90 850 876 2345'
                    ),
                    array(
                        'id' => 'booking_sidebarlink',
                        'type' => 'text',
                        'title' => __('Link to page Courses.', 'driveme'),
                        'subtitle' => __('Input Link of Page Courses.EX: http://vergatheme.com/demosd/driveme/?page_id=31', 'driveme'),
                        'desc' => '',
                        'default' => 'http://vergatheme.com/demosd/driveme/?page_id=31'
                    ),

                    array(
                        'id' => 'booking_sidebarlink_sent_msg',
                        'type' => 'text',
                        'title' => __('Link of sent message', 'driveme'),
                        'subtitle' => __('Please add sent message link here. it can be contact us page link', 'driveme'),
                        'desc' => ''
                    ),
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('404 Settings', 'driveme'),
                'fields' => array(
                     array(
                        'id' => '404_title',
                        'type' => 'text',
                        'title' => __('404 Title', 'driveme'),
                        'subtitle' => __('Input 404 Title', 'driveme'),
                        'desc' => '',
                        'default' => '4<span class="change">0</span>4'
                    ),                              
                     array(
                        'id' => '404_content',
                        'type' => 'editor',
                        'title' => __('404 Content', 'driveme'),
                        'subtitle' => __('Enter 404 Content', 'driveme'),
                        'desc' => '',
                        'default' => 'The page you are looking for no longer exists. Perhaps you can return back to the sites homepage see you can find what you are looking for.'
                    ),                   
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('Shop Settings', 'driveme'),
                'fields' => array(
                     array(
                        'id' => 'shop_banner',
                        'type' => 'media',
                        'title' => __('Banner', 'driveme'),
                        'desc' => '',
                    ),                              
                     array(
                        'id' => 'shop_banner_title',
                        'type' => 'text',
                        'title' => __('Banner title', 'driveme'),
                        'default' => 'END OF SEASON -50%'
                    ),    
                    array(
                        'id' => 'shop_banner_subtitle',
                        'type' => 'text',
                        'title' => __('Banner subtitle', 'driveme'),
                        'default' => 'PRE SEASON EVENT AT OUR NEW ARRIVAL'
                    ), 
                    array(
                        'id' => 'shop_banner_des',
                        'type' => 'text',
                        'title' => __('Banner description', 'driveme'),
                        'default' => 'Discount applied automatically at checkout'
                    ),                      
                 )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Header Left Sidebar Settings', 'driveme'),
                'fields' => array(                      
                    array(
                        'id' => 'headerl_text1',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Text 1', 'driveme'),
                        'subtitle' => __('Ex: About', 'driveme'),
                        'default' => 'About',
                    ),
                    array(
                        'id' => 'headerl_link1',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Link 1', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerl_text2',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Text 2', 'driveme'),
                        'subtitle' => __('Ex: Blog', 'driveme'),
                        'default' => 'Blog',
                    ),
                    array(
                        'id' => 'headerl_link2',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Link 2', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerl_text3',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Text 3', 'driveme'),
                        'subtitle' => __('Ex: FAQ', 'driveme'),
                        'default' => 'FAQ',
                    ),
                    array(
                        'id' => 'headerl_link3',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Link 3', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    
                    array(
                        'id' => 'headerl_facebook',
                        'type' => 'text',
                        'title' => __('Header left Sidebar link your Facebook.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerl_twitter',
                        'type' => 'text',
                        'title' => __('Header left Sidebar link your Twitter.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerl_linkedin',
                        'type' => 'text',
                        'title' => __('Header left Sidebar link your Linkedin.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerl_icon',
                        'type' => 'text',
                        'title' => __('Header left Sidebar Class Icon of your other social.', 'driveme'),
                        'subtitle' => __('Ex: fa-skype. View at here: http://fortawesome.github.io/Font-Awesome/cheatsheet/', 'driveme'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'headerl_link',
                        'type' => 'text',
                        'title' => __('Header left Sidebar link your other Social.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),

                            
                )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Header Right Sidebar Settings', 'driveme'),
                'fields' => array(                      
                    array(
                        'id' => 'headerr_text1',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Text Chat Now.', 'driveme'),
                        'subtitle' => __('Ex: Chat Now', 'driveme'),
                        'default' => 'Chat Now',
                    ),
                    array(
                        'id' => 'headerr_link1',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Link Chat Now.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerr_text2',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Number Phone', 'driveme'),
                        'subtitle' => __('Ex: + 90 888 777 5544', 'driveme'),
                        'default' => '+ 90 888 777 5544',
                    ),
                    array(
                        'id' => 'headerr_link2',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Link Phone', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerr_text3',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Text Support.', 'driveme'),
                        'subtitle' => __('Ex: support@driveme.com', 'driveme'),
                        'default' => 'support@driveme.com',
                    ),
                    array(
                        'id' => 'headerr_link3',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Link Support.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                    array(
                        'id' => 'headerr_icon',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar Class Icon of your other social.', 'driveme'),
                        'subtitle' => __('Ex: fa-skype. View at here: http://fortawesome.github.io/Font-Awesome/cheatsheet/', 'driveme'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'headerr_text4',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar text your other Social.', 'driveme'),
                        'subtitle' => __('Ex: Location.', 'driveme'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'headerr_link',
                        'type' => 'text',
                        'title' => __('Header Right Sidebar link your other Social.', 'driveme'),
                        'subtitle' => __('Ex: #', 'driveme'),
                        'default' => '#',
                    ),
                                                
                )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Footer Settings', 'driveme'),
                'fields' => array(      
                    array(
                            'id' => 'footer_title',
                            'type' => 'text',
                            'title' => __('Footer Text of Section Quote for Page Different Home Page', 'driveme'),
                            'subtitle' => __('Please enter Text.', 'driveme'),
                            'default' => 'Are You Looking For A Driving School In Manhattan/NYC',
                        ),  
                    array(
                            'id' => 'footer_quotetext',
                            'type' => 'text',
                            'title' => __('Footer Text Get A Quote of Section Quote for Page Different Home Page', 'driveme'),
                            'subtitle' => __('Please enter Text.', 'driveme'),
                            'default' => 'GET A QUOTE',
                        ), 
                    array(
                            'id' => 'footer_quotelink',
                            'type' => 'text',
                            'title' => __('Footer link Get A Quote of Section Quote for Page Different Home Page', 'driveme'),
                            'subtitle' => __('Please enter Text.Ex: http://vergatheme.com/demosd/driveme/?page_id=31', 'driveme'),
                            'default' => 'http://vergatheme.com/demosd/driveme/?page_id=31',
                        ),              
                    array(
                        'id' => 'footer_text',
                        'type' => 'editor',
                        'title' => __('Footer Text', 'driveme'),
                        'subtitle' => __('Copyright Text', 'driveme'),
                        'default' => 'All Rights Reserved © Driving Me | Designed & Developed By jThemes Studio',
                    ),

                    array(
                        'id' => 'footer_facebook',
                        'type' => 'text',
                        'title' => __('Facebook Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => 'https://www.facebook.com/',
                    ),
                    array(
                        'id' => 'footer_google',
                        'type' => 'text',
                        'title' => __('Google+ Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => 'https://plus.google.com',
                    ),
                    array(
                        'id' => 'footer_twitter',
                        'type' => 'text',
                        'title' => __('Twitter Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => 'https://twitter.com/',
                    ),
                    array(
                        'id' => 'footer_pinterest',
                        'type' => 'text',
                        'title' => __('Pinterest Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => ''
                    ),
                    array(
                        'id' => 'footer_linkedin',
                        'type' => 'text',
                        'title' => __('Linkedin Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => '',
                    ),
                    
                    array(
                        'id' => 'footer_vimeo',
                        'type' => 'text',
                        'title' => __('Vimeo Url', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => ''
                    ),
                    
                    array(
                        'id' => 'more_icon',
                        'type' => 'text',
                        'title' => __('More Social Text', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => ''
                    ),
                    array(
                        'id' => 'more_url',
                        'type' => 'text',
                        'title' => __('More Social URl.Check it: http://fortawesome.github.io/Font-Awesome/cheatsheet/', 'driveme'),
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default' => ''
                    ),
                            
                )
            ) );
            
            Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Button Option Settings', 'driveme'),
                'fields' => array(                      
                    array(
                        'id' => 'setting_panel',
                        'type' => 'checkbox',
                        'title' => __('On or Off Button Options.', 'driveme'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '1'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'st_link1',
                        'type' => 'text',
                        'title' => __('Link for Home Box Version.', 'driveme'),
                        'subtitle' => __('Link for Home Box Version.', 'driveme'),
                        'desc' => '',
                        'default' => 'http://vergatheme.com/demosd/driveme/?page_id=112'
                    ),
                    array(
                        'id' => 'st_link2',
                        'type' => 'text',
                        'title' => __('Link for Home Wide Version.', 'driveme'),
                        'subtitle' => __('Link for Home Wide Version.', 'driveme'),
                        'desc' => '',
                        'default' => 'http://vergatheme.com/demosd/driveme'
                    ),
                )
            ) );
            Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-website',
                'title' => __('Styling Options', 'driveme'),
                'fields' => array(
                    array(
                        'id' => 'main-color',
                        'type' => 'color',
                        'title' => __('Theme Main Color', 'driveme'),
                        'subtitle' => __('Pick the main color for the theme (default: #0096ff).', 'driveme'),
                        'default' => '#0096ff',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'header-topbar',
                        'type' => 'color',
                        'title' => __('Theme Top Bar Color', 'driveme'),
                        'subtitle' => __('Pick the Top Bar Background color for the theme (default: #647382).', 'driveme'),
                        'default' => '#647382',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'footer-bg',
                        'type' => 'color',
                        'title' => __('Theme Footer Color', 'driveme'),
                        'subtitle' => __('Pick the Footer Background color for the theme (default: #2d3237).', 'driveme'),
                        'default' => '#2d3237',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'footer-right',
                        'type' => 'color',
                        'title' => __('Theme Footer Right Color', 'driveme'),
                        'subtitle' => __('Pick the Footer Right Background color for the theme (default: #23282d).', 'driveme'),
                        'default' => '#23282d',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'body-font',
                        'type' => 'typography',
                        'output' => array('body'),
                        'title' => __('Body Font', 'driveme'),
                        'subtitle' => __('Specify the body font properties.', 'driveme'),
                        'line-height'   => false,
                        'google' => true,
                        'default' => array(
                            'color' => '#647382',
                            'font-size' => '14px',
                            'font-family' => "",
                        ),
                    ),
                     array(
                        'id' => 'custom-css',
                        'type' => 'ace_editor',
                        'title' => __('CSS Code', 'driveme'),
                        'subtitle' => __('Paste your CSS code here.', 'driveme'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default' => "#header{\nmargin: 0 auto;\n}"
                    ),
					array(
						'id'       => 'layout_style',
						'type'     => 'select',
						'title'    => __('Site Layout Style', 'driveme'), 
						'subtitle' => __('Layout Style', 'driveme'),
						'desc'     => '',
						'options'  => array(
							'wide' => 'Wide',
							'boxed' => 'Boxed'
						),
						'default'  => 'wide',
					)
                )
            ) );
			Redux::set_section( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Google Maps Setting', 'driveme'),
                'fields' => array(
                    array(
                        'id' => 'google_maps_api_key',
                        'type' => 'text',
                        'title' => __('Google Maps API Key', 'driveme'),
                        'subtitle' => __('API Key', 'driveme'),
                        'desc' => '',
                        'default' => ''
                    )
					)
					)
					);
		Redux::set_section( $opt_name, array(
                'icon' => ' el-icon-list',
                'title' => __('Menu Settings', 'driveme'),
                'fields' => array(                      
                    array(
                        'id' => 'hide_menu_search',
                        'type' => 'checkbox',
                        'title' => __('Hide search button in menu.', 'driveme'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'hide_menu_cart',
                        'type' => 'checkbox',
                        'title' => __('Hide cart button in menu.', 'driveme'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    
                )
            ) );
   
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'driveme' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'driveme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

