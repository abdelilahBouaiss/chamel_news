<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>
<div class="comments">
      <h3><?php comments_popup_link(__(' 0 comment', 'driveme'),__(' 1 comment', 'driveme'),__(' % comment', 'driveme')); ?></h3>
      <ul class="comme-peo">
			<?php wp_list_comments('callback=driveme_theme_comment'); ?>
		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<nav class="navigation comment-navigation" role="navigation">		   
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'driveme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'driveme' ) ); ?></div>
			</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'driveme' ); ?></p>
		<?php endif; ?>
    </ul>
</div>
<?php endif; ?>		
		<!-- //COMMENTS -->

<!-- LEAVE A COMMENT -->
<div class="commnet-form">
    <h3><?php esc_html_e('Leave A Comment', 'driveme') ?></h3>
<?php
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'contact_form',                                
                'title_reply'=> '',
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<ul class="row">
                                    <li class="col-md-6">
                                    <input type="text" name="author" id="author" class="form-control" placeholder="Your Name">
                                </li>',
                    'email' => '<li class="col-md-6">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </li>', 
                    'website' => '<li class="col-md-12">
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Website">
                                </li>',                                                                            
                ) ),                                
                 'comment_field' => '<li class="col-md-12">
                                    <textarea name="comment"'.$aria_req.' id="comment" class="span8" placeholder="Post Your Comment"></textarea></li></ul>',                                                   
                 'label_submit' => 'SUBMIT COMMENT',
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',               
        )
    ?>
    <?php comment_form($comment_args); ?>
</div>
              
