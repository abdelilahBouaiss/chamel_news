<?php
/*
 * Template Name: Other Page
 * Description: A Page Template with a Page Builder design.
 */
$textdoimain = 'driveme';
get_header(); ?>
<div class="sub-banner">
    <div class="container">
      <h2><?php the_title();?></h2>
      <ul class="links">
        <li><a href="<?php echo home_url(); ?>">Home</a>/</li>
        <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
      </ul>
    </div>
  </div>
<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>

			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		echo 'Page Canvas For Page Builder'; 
	}?>

<?php get_footer('home'); ?>