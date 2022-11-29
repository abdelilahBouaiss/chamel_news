<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Zix
 */

get_header();
?>
<section class="blog_area blog_search sec_pad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="blog_container">
					<?php 
					if( have_posts() ){
						while (have_posts()) {
							the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'recent_news_item' ); ?> >
							<?php
							if( is_sticky() ){
								echo '<span class="sticky_label">'. esc_html__( 'Sticky', 'zix' ) .'</span>';
							}

							zix_post_thumbnail(); ?>

							<div class="recent_news_content">
								<div class="post_meta">
									<?php echo zix_posted_on(); ?>
									<a href="<?php comments_link(); ?>"><i class="icon_comment_alt"></i><?php zix_comment_count( get_the_ID() ); ?></a>
								</div>
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
								<?php
									echo wp_kses_post( wpautop( wp_trim_words( get_the_content(), 40, '' ) ) );
								?>
								<a href="<?php the_permalink(); ?>" class="reade_btn"><?php echo esc_html__( 'Read More', 'zix' ) ?><i class="fa fa-angle-right"></i></a>
							</div>
						</article>
						<?php 
						} 
						// Post Pagination ==================
						zix_pagination();
					} 
					else{
						get_template_part('template-parts/content', 'none');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
