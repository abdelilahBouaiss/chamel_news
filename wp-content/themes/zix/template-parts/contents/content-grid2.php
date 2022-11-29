<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */
    $opt = get_option( 'zix_opt' );
    $post_col = isset( $opt['blog_column'] ) ? $opt['blog_column'] : '6';
    $post_column = 'col-lg-'.$post_col.' col-md-'.$post_col;
    $post_title_length = isset( $opt['post_title_length'] ) ? $opt['post_title_length'] : '20';
    $is_post_date   = isset( $opt['is_post_date'] ) ? $opt['is_post_date'] : '1';
    $is_post_author = isset( $opt['is_post_author'] ) ? $opt['is_post_author'] : '1';
    ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class( $post_column ); ?> >
        <div class="blog_item">
            <?php
            if ( is_sticky() ) {
                echo '<span class="sticky_label">' . esc_html__('Sticky', 'zix') . '</span>';
            }
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'zix-blog-cols-thumb', array( 'class' => 'img-fluid img_radious' ) );
            } ?>
            <div class="blog_content">
                <a href="<?php the_permalink(); ?>">
                    <h3><?php zix_limit_latter( get_the_title(), $opt['post_title_length'] ); ?></h3>
                </a>
                <div class="media author_details">
                    <?php
                    if( $is_post_author ){ ?>
                        <div class="author-img">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 55 ); ?>
                        </div>
                        <?php
                    } ?>
                    <div class="media-body">
                        <?php
                        if( $is_post_author ){ ?>
                            <h5><?php the_author(); ?></h5>
                        <?php
                        }

                        if( $is_post_date ) {
                            the_time('F j, Y');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>