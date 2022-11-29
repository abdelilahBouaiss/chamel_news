<?php

/*

 * Template Name: Shortcode

 */

$textdoimain = 'driveme';

get_header(); ?>

<!--======= BANNER =========-->

  <div class="sub-banner">

    <div class="container">

        <h2><?php echo esc_attr($theme_option['courses_title']); ?></h2>

        <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>

    </div>

  </div>

		<?php while (have_posts()) : the_post()?>

			<?php echo do_shortcode(the_content()); ?>

		<?php endwhile; ?>



<?php get_footer(); ?>