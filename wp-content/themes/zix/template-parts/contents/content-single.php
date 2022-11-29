<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

$post_view_count = '';
if( is_single() && function_exists( 'zix_post_views' ) ) {
    $post_view_count =  'data-view-count=' . zix_post_views( get_the_ID() );
} else {
    $post_view_count = '';
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'recent_news_content' ); ?> <?php echo esc_attr( $post_view_count ); ?>>
    <?php the_content(); ?>
</div>