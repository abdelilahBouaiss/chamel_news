<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zix
 */

global $zix_opt;

get_header();

    $allow_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'span' => array(
            'class' => array()
        ),
        'strong' => array(),
    );

    // Error Page Options
    $error_heading  	= !empty( $zix_opt['error_heading'] ) ? $zix_opt['error_heading'] : '4<span>0</span>4';
    $error_subheading  	= !empty( $zix_opt['error_subheading'] ) ? $zix_opt['error_subheading'] : '<span>Oh no!</span> There\'s not Much Left Here for you';
    $error_description 	= !empty( $zix_opt['error_description'] ) ? $zix_opt['error_description'] : '';


?>

    <section class="error_area">
        <div class="container">
            <div class="error_content text-center">
                <h1><?php echo wp_kses( $error_heading, $allow_html ); ?></h1>
                <h2><?php echo wp_kses( $error_subheading, $allow_html ); ?></h2>
                <?php echo wp_kses( $error_description, $allow_html ); ?>
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                    <div class="input-group subcribes">
                        <input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search your Keyword......', 'zix' )?>">
                        <button class="btn subscrib_btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
get_footer();
