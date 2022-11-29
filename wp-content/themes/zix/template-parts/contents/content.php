<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

$opt = get_option( 'zix_opt' );
$is_post_comment_count   = isset( $opt['is_post_comment_count'] ) ? $opt['is_post_comment_count'] : '1';
$is_post_date   = isset( $opt['is_post_date'] ) ? $opt['is_post_date'] : '1';
$read_more_text = isset( $opt['read_more_text'] ) ? $opt['read_more_text'] : esc_html__( 'Read More', 'zix' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'recent_news_item' ); ?>>
    <?php
    if( is_sticky() ){
        echo '<span class="sticky_label">'. esc_html__( 'Sticky', 'zix' ) .'</span>';
    }
    zix_post_thumbnail(); ?>

    <div class="recent_news_content">
        <div class="post_meta">
            <?php
            if( $is_post_date ) {
                echo zix_posted_on();
            }
            if( $is_post_comment_count ) { ?>
                <a href="<?php comments_link(); ?>"><i class="icon_comment_alt"></i><?php zix_comment_count( get_the_ID() ); ?></a>
                <?php
            } ?>
        </div>
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <p> <?php echo strip_shortcodes( zix_excerpt( 'blog_excerpt', false)); ?> </p>
        <div class="read_more">
            <a href="<?php the_permalink(); ?>" class="reade_btn"><?php echo esc_html( $read_more_text ) ?> <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</article>
