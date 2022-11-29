<?php
$opt = get_option('zix_opt');
$titlebar_align = !empty($opt['titlebar_align']) ? $opt['titlebar_align'] : 'center';
$is_date        = isset( $opt['is_single_post_date'] ) ? $opt['is_single_post_date'] : '';
$is_comment_count = isset( $opt['is_single_comment_meta'] ) ? $opt['is_single_comment_meta'] : '';

function zix_post_bg_image() {
    $background_image = function_exists('get_field') ? get_field('header_image') : '';
    if ($background_image) {
        echo 'style="background: url(' . get_field('header_image') . ') no-repeat scroll center 0 / cover;"';
    }else {
        echo '';
    }
}

while(have_posts()) : the_post();  ?>

    <section class="breadcrumbs_area_three d-flex align-items-center">
        <div class="blog_overlay_bg"></div>
        <div class="p_absoulte banner_bg parallax-effect" data-parallax="scroll" data-bleed="5" <?php zix_post_bg_image(); ?>></div>
        <div class="container">
            <div class="breadcrumb_content text-center">
                <h2><?php the_title(); ?></h2>
                <div class="post_meta">
                    <?php
                    if( $is_date ){ ?>
                        <a href="<?php zix_day_link(); ?>"><i class="icon_clock_alt"></i><?php the_time('F j, Y'); ?></a>
                        <?php
                    }
                    if( $is_comment_count ){ ?>
                        <a href="<?php comments_link(); ?>"><i class="icon_comment_alt"></i><?php zix_comment_count( get_the_ID() ); ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
endwhile;