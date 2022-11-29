<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

get_header();
?>

    <section class="blog_area sec_pad zix_archive">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_container blog_details row">
                        <?php
                        if ( have_posts() ) :

                            if ( is_home() && ! is_front_page() ) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php
                            endif;

                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-6 col-md-6 recent_news_item' ); ?> >
                                    <?php
                                    if( is_sticky() ){
                                        echo '<span class="sticky_label">'. esc_html__( 'Sticky', 'zix' ) .'</span>';
                                    }
                                    the_post_thumbnail( 'zix_archive_355x317', array('class'=>'img_radious') ); ?>

                                    <div class="recent_news_content">
                                        <div class="post_meta">
                                            <?php echo zix_posted_on(); ?>
                                            <a href="<?php comments_link(); ?>"><i class="icon_comment_alt"></i><?php zix_comment_count( get_the_ID() ); ?></a>
                                        </div>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                        <p> <?php echo strip_shortcodes( zix_excerpt( 'blog_excerpt', false)); ?> </p>

                                        <div class="read_more">
                                            <a href="<?php the_permalink(); ?>" class="reade_btn"><?php echo esc_html__( 'Read More', 'zix' ) ?> <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            <?php
                            endwhile;
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                    <div class="archive_pagination">
                        <?php zix_pagination(); ?>
                    </div>
                </div>
                <?php
                get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();