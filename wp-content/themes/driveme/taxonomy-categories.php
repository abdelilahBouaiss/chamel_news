<?php
/*
/**
*/
global $theme_option;
get_header(); ?>
<div class="sub-banner">

  <div class="container">

    <h2><?php printf(__('%s', 'driveme'), single_cat_title('', false)); ?></h2>

    <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>

  </div>

</div>

<div class="content">



  <!--======= INTRESTED =========-->

  <section class="courses">
    <div class="container">

      <section class="products">
        <ul class="row">
          <?php
          while (have_posts()) : the_post();
            $params = array('width' => 770, 'height' => 385);
            $thumbnail = bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()), $params);
          ?>
            <div class="col-sm-12">
              <div class="prodct artical">

                <div class="col-md-4 no-padding">
                  <img class="img-responsive" src="<?php echo esc_url($thumbnail); ?>" alt="">

                  <span class="c-like"><?php echo cc_love(); ?></span>

                  <!--======= IMAGE =========-->

                </div>


                <div class="col-md-8 no-padding">
                  <div class="pro-info">



                    <!--======= ITEM NAME / RATING =========-->

                    <div class="cate-name"> <span class="pull-left"><?php echo wp_kses_post($categorie_names) ?></span>

                      <ul class="stars pull-right">

                        <li <?php if ($ratings == 'zero') {
                              echo 'class="no-rate"';
                            } else {
                            } ?>><i class="fa fa-star"></i></li>

                        <li <?php if ($ratings == 'zero' || $ratings == 'one') {
                              echo 'class="no-rate"';
                            } else {
                            } ?>><i class="fa fa-star"></i></li>

                        <li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two') {
                              echo 'class="no-rate"';
                            } else {
                            } ?>><i class="fa fa-star"></i></li>

                        <li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three') {
                              echo 'class="no-rate"';
                            } else {
                            } ?>><i class="fa fa-star"></i></li>

                        <li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three' || $ratings == 'four') {
                              echo 'class="no-rate"';
                            } else {
                            } ?>><i class="fa fa-star"></i></li>

                      </ul>

                    </div>



                    <!--======= ITEM Details =========-->

                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <hr>
                    <?php the_excerpt(); ?>
                    <span class="price"><?php echo esc_attr($prices); ?></span>

                    <?php booknow_button(get_the_ID()) ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn-1"><?php echo esc_attr($theme_option['courses_detail']); ?></a>
                  </div>

                </div>
              </div>
            </div>

          <?php endwhile;    ?>
      </section>
    </div>
</div>
</section>
<?php
get_footer();
