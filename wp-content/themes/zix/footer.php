<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zix
 */

$opt = get_option( 'zix_opt' );
$footer_class   = !is_active_sidebar( ' footer_widgets' ) ? ' no_widget' : '';
$copyright_url = esc_url('https://droitthemes.com/');
$copyright_text = !empty($opt['footer_copyright']) ? $opt['footer_copyright'] : sprintf('@ Copyright 2021 Zix. Built with <i class="fa fa-heart"></i> by <a href="%s" rel="nofollow" target="_blank">DroitThemes</a>', $copyright_url);
?>

    <footer class="creative_footer_area footer_bg <?php echo esc_attr( $footer_class ); ?>">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('footer_widgets'); ?>
            </div>
            <div class="creative_footer_bottom">
                <?php
                if( $copyright_text ){
                    echo wp_kses_post( wpautop( $copyright_text ) );
                }
                ?>
            </div>
        </div>
    </footer>
</div>
<!-- search box css-->
<form class="search_boxs" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search_box_inner">
        <div class="close_icon">
            <i class="ti-close"></i>
        </div>
        <div class="input-group">
            <input type="text" name="s" class="form_control search-input" placeholder="Recipient's username" autofocus>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="ti-search"></i></button>
            </div>
        </div>
    </div>
</form>

<?php wp_footer(); ?>
</body>
</html>