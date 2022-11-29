<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Zix
 */

get_header();
$opt = get_option( 'zix_opt' );
$is_author_bio = isset( $opt['is_author_bio'] ) ? $opt['is_author_bio'] : '';
$blog_col = !is_active_sidebar('sidebar-1') ? '12' : '9';

?>
    <section class="blog_details_area sec_pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-<?php echo esc_attr( $blog_col ) ?>">
                    <div class="blog_details">
                        <div class="post_details">
							<?php
                            while ( have_posts() ) :
                                the_post_thumbnail( 'full', array( 'class' => 'zix_single_thumb' ) );

								the_post();

                                get_template_part( 'template-parts/contents/content-single', get_post_type() );
                                
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'zix' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'zix' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                ));

	                            zix_entry_footer();
                                $user_desc = get_the_author_meta('user_description');

                                if ( !empty($user_desc) && $is_author_bio ) { ?>
                                    <div class="media post_author mt_70">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 140, '', get_the_author_meta('display_name'), array('class' => 'rounded-circle')); ?>
                                        <div class="media-body">
                                            <h4 class="post_author_name"> <?php echo get_the_author_meta('display_name'); ?> </h4>
                                            <p class="user_description"> <?php echo get_the_author_meta('user_description'); ?> </p>
                                        </div>
                                    </div>
                                <?php
                                }

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
                        </div>
                    </div>
	            </div>
            	<?php
				get_sidebar(); ?>
	        </div>
	    </div>
	</section>

<?php
get_footer();