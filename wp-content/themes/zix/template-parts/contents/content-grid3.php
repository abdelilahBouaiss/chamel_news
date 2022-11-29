<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */
    $opt = get_option( 'zix_opt' );
    $post_col       = isset( $opt['blog_column'] ) ? $opt['blog_column'] : '6';
    $post_column    = 'col-lg-'.$post_col.' col-md-'.$post_col;
    $blog_excerpt   = isset( $opt['blog_excerpt'] ) ? $opt['blog_excerpt'] : '20';
    $is_post_comment_count   = isset( $opt['is_post_comment_count'] ) ? $opt['is_post_comment_count'] : '1';
    $is_post_date   = isset( $opt['is_post_date'] ) ? $opt['is_post_date'] : '1';
    $is_post_author = isset( $opt['is_post_author'] ) ? $opt['is_post_author'] : '1';
    ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class( $post_column ); ?> >
        <div class="recent_news_item">
            <?php
            if ( is_sticky() ) {
                echo '<span class="sticky_label">' . esc_html__('Sticky', 'zix') . '</span>';
            } ?>
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'zix_post_grid_370x240', array( 'class' => 'img-fluid img_radious' ) );
            } ?>
            <div class="recent_news_content">
                <div class="author_details">
                    <?php
                    if( $is_post_author ){ ?>
                        <div class="author-img">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 55 ); ?>
                        </div>
                        <span class="text"><?php echo esc_html__( 'Posted By ', 'zix' ); the_author(); ?></span>
                        <?php
                    } ?>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <h3><?php zix_limit_latter( get_the_title(), $opt['post_title_length'] ); ?></h3>
                </a>
                <?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content(), $blog_excerpt, '' ) ) ); ?>
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
            </div>
        </div>
    </div>
