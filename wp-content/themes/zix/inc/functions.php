<?php
// Search page search form
function zix_search_page_search_form() {
    ?>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
        <input type="text" name="s" class="form-control search-field" id="search" placeholder="<?php esc_attr_e( 'Enter here your search query', 'zix' ); ?>" value="<?php echo get_search_query() ?>">
        <button type="submit" class="search-submit search_btn"> <?php esc_html_e( 'Search', 'zix' ); ?> </button>
    </form>
    <?php
}

add_filter('wp_list_categories', 'zix_cat_count_span');
function zix_cat_count_span($links) {
  $links = str_replace('</a> (', '<span>(', $links);
  $links = str_replace(')', ')</span> </a>', $links);
  return $links;
}

add_filter('zix_wp_get_archives', 'zix_archives_count_span');
function archives_count_span($links) {
  $links = str_replace('</a> (', '<span>(', $links);
  $links = str_replace(')', ')</span> </a>', $links);
  return $links;
}

// Post's excerpt text
function zix_excerpt($settings_key, $echo = true) {
    $opt = get_option( 'zix_opt' );
    $excerpt_limit = !empty($opt[$settings_key]) ? $opt[$settings_key] : 40;
    $post_excerpt = get_the_excerpt();
    $excerpt = (strlen(trim($post_excerpt)) != 0) ? wp_trim_words(get_the_excerpt(), $excerpt_limit, '') : wp_trim_words(get_the_content(), $excerpt_limit, '');
    if(  $echo == true ) {
        echo wp_kses_post($excerpt);
    } else {
        return wp_kses_post($excerpt);
    }
}

/* Limit Letter================ */
function zix_limit_latter($string, $limit_length, $suffix = '...' ) {
    if (strlen($string) > $limit_length) {
        echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
    } else {
        echo strip_shortcodes(esc_html($string));
    }
}

function zix_post_class( $classes ) {
  global $post;
  if( !has_post_thumbnail() ) {
      $classes[] = 'no-post-thumbnail';
  }
  return $classes;
}
add_filter( 'post_class', 'zix_post_class' );

// Get comment count text
function zix_comment_count($post_id, $no_comments = 'No Comments') {
    $comments_number = get_comments_number($post_id);
    if($comments_number == 0) {
        $comment_text = $no_comments;
    }elseif($comments_number == 1) {
        $comment_text = esc_html__('1 Comment', 'zix');
    }elseif($comments_number > 1) {
        $comment_text = $comments_number.esc_html__(' Comments', 'zix');
    }
    echo esc_html($comment_text);
}

// Day link to archive page
function zix_day_link() {
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}

function zix_pagination() {
    the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
        'next_text'          => '<i class="fa fa-angle-double-right"></i>',
        'before_page_number' => '0',
    ));
}


/**
 * Moving the comments text field to bottom
 */
function zix_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'zix_move_comment_field_to_bottom' );

/* WP Color Picker Issue soluation */
if( is_admin() ){
	add_action( 'wp_default_scripts', 'wp_default_custom_scripts' );
	function wp_default_custom_scripts( $scripts ){
		$scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.js", array( 'iris' ), false, 1 );
		did_action( 'init' ) && $scripts->localize(
			'wp-color-picker',
			'wpColorPickerL10n',
			array(
				'clear'            => __( 'Clear', 'zix' ),
				'clearAriaLabel'   => __( 'Clear color', 'zix' ),
				'defaultString'    => __( 'Default', 'zix' ),
				'defaultAriaLabel' => __( 'Select default color', 'zix' ),
				'pick'             => __( 'Select Color', 'zix' ),
				'defaultLabel'     => __( 'Color value', 'zix' ),
			)
		);
	}
}


/**
 * Body classes
 */
add_filter( 'body_class', function($classes) {
    $opt = get_option( 'zix_opt' );
    $is_header_top = isset( $opt['is_header_top'] ) ? $opt['is_header_top'] : '';
    $my_theme = wp_get_theme();
    $theme_name = strtolower($my_theme->get('Name'));
    $theme_version = $theme_name.'-'.$my_theme->get( 'Version' );
    if ( !has_nav_menu( 'main_menu' ) ) {
        $classes[] = 'no_main_menu';
    }
    if ( $is_header_top == '1' && ( !empty( $opt['ht_left_content']) || !empty($opt['ht_right_content']) ) ) {
        $classes[] = 'header_top_shown';
    }
    if ( !is_user_logged_in() ) {
        $classes[] = 'not_logged_in';
    }
    if ( is_home() && isset( $opt['blog_layout'] ) ) {
        $classes[] = $opt['blog_layout'] == 'list' ? 'blog-list-layout' : '';
    }
    if ( is_page_template('page-job-apply-form.php') ) {
        $classes[] = 'page-job-apply';
    }

    $classes[] = $theme_version;

    return $classes;
});