<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Zix
 */

get_header();
?>
    <section class="projects_details_area">
        <?php
        if( have_posts() ){
            while ( have_posts() ){
                the_post();
                the_content();
            }

        }
        ?>
    </section>

<?php
get_footer();