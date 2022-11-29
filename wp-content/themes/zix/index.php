<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zix
 */

global $zix_opt;

$blog_style	= 'right';
$post_style = 'list';
if ( class_exists( 'Redux_Framework_Plugin' ) ) {
    $blog_style   = isset( $zix_opt['select_blog_layout'] ) ? $zix_opt['select_blog_layout'] : '';
    $post_style   = isset( $zix_opt['blog_style_select'] ) ? $zix_opt['blog_style_select'] : '';
}
if( $blog_style == 'full' ){
    $blog_col = '12';
}else{
    $blog_col = !is_active_sidebar('sidebar-1') ? '12' : '9';
}


get_header();
?>

    <section class="blog_area sec_pad">
        <div class="container">
            <div class="row">
                <?php
                if( $blog_style == 'left' ){
                    get_sidebar();
                }
                
                if ( have_posts() ) {
                    ?>
                    <div class="col-lg-<?php echo esc_attr($blog_col) ?>">
                        <div class="blog_container">
                            <?php
                            if ($post_style == 'grid') {
                                echo '<div class="row">';
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/contents/content', 'grid2');
                                }
                                echo '</div>';
                            } elseif ($post_style == 'masonry') {
                                echo '<div class="row">';
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/contents/content', 'grid3');
                                }
                                echo '</div>';
                            } else {
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/contents/content', get_post_format());
                                }
                            }
                             ?>
                        </div>
                        <?php zix_pagination(); ?>
                    </div>
                    <?php
                }
                
                if( $blog_style == 'right' ){
                    get_sidebar();
                }
                ?>
            </div>
        </div>
    </section>
<?php
get_footer();
