<?php
/*
 * Template Name: Boxed
 * Description: A Page Template with a Page Builder design.
 */
$textdoimain = 'driveme';
get_header('boxed'); ?>

<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		echo 'Page Canvas For Page Builder'; 
	}?>

<?php get_footer('boxed'); ?>