<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comment_section">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comment_form_title">
			<?php
			$zix_comment_count = get_comments_number();
			if ( '1' === $zix_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Comment( 01 )', 'zix' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( 'Comment( %1$s )', 'Comments( %1$s )', $zix_comment_count, 'comments title', 'zix' ) ),
					number_format_i18n( $zix_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ul class="comment-box list-unstyled">
			<?php
			wp_list_comments( array(
				'style'      	=> 'ul',
				'short_ping' 	=> true,
				'callback'		=> 'zix_comment_template'
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		

	endif; // Check for have_comments().
	
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'zix' ); ?></p>
		<?php
	endif;

	zix_comment_form();
	?>

</div><!-- #comments -->
