<?php
$opt = get_option( 'zix_opt' );

$blog_title             = !empty( $opt['blog_title'] ) ? $opt['blog_title'] : esc_html__( 'Our Blog', 'zix' );
$portfolio_page_heading = !empty( $opt['portfolio_page_heading'] ) ? $opt['portfolio_page_heading'] : esc_html__( 'Project Details', 'zix' );
$team_page_heading      = !empty( $opt['team_page_heading'] ) ? $opt['team_page_heading'] : esc_html__( 'Meet Our Team', 'zix' );
$service_page_heading   = !empty( $opt['service_page_heading'] ) ? $opt['service_page_heading'] : esc_html__( 'Our Services', 'zix' );
$heading_404            = !empty( $opt['heading_404'] ) ? $opt['heading_404'] : esc_html__( '404 Error', 'zix' );
$header_breadcrumb      = !empty( $opt['is_page_breadcrumb'] ) ? '1' : '';

$overlay_class = 'global_overlay';
if( function_exists( 'get_field' ) ) {
    $overlay_class = !empty( get_field('header_image') ) ? 'page_overlay' : 'global_overlay';
}

    ?>
    <section class="breadcrumbs_area d-flex align-items-center <?php echo esc_attr( $overlay_class ) ?>">
        <div class="p_absoulte banner_bg parallax-effect" data-parallax="scroll" data-bleed="10"></div>
        <div class="container">
            <div class="breadcrumb_content text-center">
                <h2>
                    <?php
                    if (is_archive()) {
                        the_archive_title();
                    }elseif( is_singular('portfolio') ){
                        echo esc_html( $portfolio_page_heading );
                    }elseif( is_singular('team') ){
                        echo esc_html( $team_page_heading );
                    }elseif( is_singular('services') ){
                        echo esc_html( $service_page_heading );
                    }elseif ( is_home() ) {
                        echo esc_html( $blog_title );
                    }elseif ( is_singular( 'post' ) ) {
                        the_title();
                    } elseif (is_page()) {
                        the_title();
                    } elseif (is_search()) {
                        echo esc_html__('Search Result', 'zix');
                    } elseif (is_404()) {
                        echo esc_html($heading_404);
                    } else {
                        the_title();
                    }


                    ?>
                </h2>
                <?php
                if (is_search()) {
                    echo '<p>' . sprintf(esc_html__('Search Result for: %s', 'zix'), '<span>' . get_search_query() . '</span>') . '</p>';
                } else {
                    if( $header_breadcrumb ) {
                        zix_breadcrumbs();
                    }
                } ?>
            </div>
        </div>
    </section>