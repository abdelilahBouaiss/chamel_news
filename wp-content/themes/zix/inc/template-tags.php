<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PixX
 */

if ( ! function_exists( 'zix_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function zix_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'zix' ),
			'<a class="date" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="icon_clock_alt"></i>' . $time_string . '</a>'
		);

		return $posted_on; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'zix_comment_link' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function zix_comment_link() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			comments_popup_link( 'No Comment', '01 Comment', '% Comments', '', 'Comment Disabled' );
		}
	}
endif;

if ( ! function_exists( 'zix_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function zix_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'zix' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'zix_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function zix_entry_footer() {

	    $opt = get_option( 'zix_opt' );
	    $is_single_cats = isset( $opt['is_single_cats'] ) ? $opt['is_single_cats'] : '1';
	    $is_post_tag    = isset( $opt['is_post_tag'] ) ? $opt['is_post_tag'] : '1';
	    echo '<div class="zix_post_tag">';
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
            //the_tags();
            if( $is_single_cats ) {
                $categories_list = get_the_category_list(esc_html__(' ', 'zix'));
                if ($categories_list) {
                    /* translators: 1: list of categories. */
                    printf('<div class="post_category"><div class="post-name">' . esc_html__('Post Category: ', 'zix') . '</div>' . esc_html('%1$s') . '</div>', $categories_list); // WPCS: XSS OK.
                }
            }

            if( $is_post_tag ) {
                $tag_list = get_the_tag_list();
                if ($tag_list) {
                    /* translators: 1: list of categories. */
                    printf('<div class="post_category zix_post_tags"><div class="post-name">' . esc_html__('Post Tags: ', 'zix') . '</div>' . esc_html('%1$s') . '</div>', $tag_list); // WPCS: XSS OK.
                }
            }
		}
		echo '</div>';
	}
endif;

if ( ! function_exists( 'zix_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function zix_post_thumbnail() {
		global $zix_opt;

		$blog_style_select	= '';

		if ( class_exists( 'Redux_Framework_Plugin' ) ) {
		    $blog_style_select             = isset( $zix_opt['blog_style_select'] ) ? $zix_opt['blog_style_select'] : '';
		}
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :	?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('zix-blog-post-details'); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			if( $blog_style_select == '2-cols' ) {
				$blog_thumb = 'zix-blog-cols-thumb';
			} 
			if( $blog_style_select == '3-cols' ) {
				$blog_thumb = 'zix-blog-cols-thumb-three';
			} else {
				$blog_thumb = 'zix-blog-post-details';
			}
			the_post_thumbnail( $blog_thumb, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
				'class'	=> 'img-fluid img_radious'
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

