<?php
/**
 * Template Name: Zix Full Width
 */

get_header(); 


$page_comment = 0;
if( function_exists( 'get_field' ) ) {
    $page_comment     = get_field('page_comment');
}
?>

<!--  start main content section  -->
<div class="content-area template-full-width">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'template' );

		// If comments are open or we have at least one comment, load up the comment template.
		if($page_comment == 1) {
			if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		}
		


	endwhile; // End of the loop.
	?>
	<!-- end main conent  -->
</div>
<!--  end main content section  -->

<?php
get_footer();
