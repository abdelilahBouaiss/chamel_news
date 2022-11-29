<?php
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 * @package zix
 * @since 1.0.0
 * @version 1.0.0
 * @author Droitthemes
 */

function zix_comment_template( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php esc_html__( 'Pingback:', 'zix' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'zix' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
        default :
            // Proceed with normal comments.
            global $post;
            ?>
                <li class="post_comment" id="comment-<?php comment_ID(); ?>">
                    <div class="media post_author mt_60">
                        <div class="media-left">
                            <?php echo get_avatar( $comment, 120 ); ?>
                        </div>
                        <div class="media-body">
                            <?php
                                comment_reply_link(
                                    array_merge( $args,
                                        array(
                                            'reply_text' => esc_html__( 'Reply', 'zix' ),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                            )
                                        )
                                    );
                            ?>
                            <div class="comment-meta">
                                <h5><?php comment_author_link(); ?></h5>
                                <h6><?php echo get_comment_date( 'F d, Y' ); ?></h6>
                            </div>
                            <?php comment_text(); ?>
                        </div>
                    </div>
            <?php
            break;
    endswitch; // end comment_type check
}


/**
 * Comment Form
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Droitthemes
 */


function zix_comment_form($args = array(), $post_id = null) {
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    $commenter      = wp_get_current_commenter();
    $user           = wp_get_current_user();
    $user_identity  = $user->exists() ? $user->display_name : '';
    $req            = get_option( 'comment_author_email' );
    $html_req       = ( $req ? " required='required'" : '' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $html5          = 'html5' === $args;
   // $post_id = get_post_id();
    $fields   =  array(
        'author'  => '<div class="col-md-6 form-group"><input id="author" class="form-control" name="author" type="text" placeholder="' . esc_attr__( 'Full Name', 'zix' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' /></div>',

        'email'   => '<div class="col-md-6 form-group"><input id="email" class="form-control" placeholder="' . esc_attr__( 'Email', 'zix' ) . '" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' /></div>',

        'url'     => '<div class="col-md-12 form-group"><input id="subject" class="form-control" placeholder="' . esc_attr__( 'Subject', 'zix' ) . '" name="subject" ' . ( $html5 ? 'type="subject"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></div>',
    );
    $comments_args = array(
        'fields'                => $fields,
        'title_reply'           => esc_html__( 'Leave a Comment', 'zix' ),
        'title_reply_before'    => '<h2 class="comment_form_title">',
        'title_reply_after'     => '</h2>',
        'label_submit'          => esc_html__( 'Leave Comment', 'zix' ),
        'comment_notes_before'  => '',
        'class_form'            => 'comment_form row',
        'class_submit'          => 'btn submit_btn',
        'submit_button'         => '<div class="col-md-12"><button name="%1$s" type="submit" id="%2$s" class="%3$s get_btn" value="%4$s" />' . esc_html__( 'Leave a Comment' ,'zix' ) . '</button></div>',
        'logged_in_as'         => '<div class="col-md-12 form-group"><p class="logged-in-as">' . sprintf(
                                      /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
                                      __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>','zix' ),
                                      get_edit_user_link(),
                                      /* translators: %s: user name */
                                      esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.','zix' ), $user_identity ) ),
                                      $user_identity,
                                      wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
                                  ) . '</p></div>',
        'submit_field'          => '%1$s %2$s',
        'comment_field'         => '<div class="col-md-12 form-group"><textarea id="comment" class="form-control" name="comment" placeholder="' . esc_attr__( 'Your Comment', 'zix' ) . '" cols="45" rows="5" aria-required="true"></textarea></div>',
        'comment_notes_after'   => '',
    );
    comment_form( $comments_args );
}