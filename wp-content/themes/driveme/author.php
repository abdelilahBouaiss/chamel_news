<?php
/*
/**
*/
global $theme_option;
get_header(); ?>
  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="container">
      <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>
    </div>
  </div>
  
  <!--======= CONTENT START =========-->
  <div class="content"> 
    
    <!--======= NEWS / FAQS =========-->
    <section class="news">
      <div class="container"> 
        
        <!--======= TITTLE =========-->
        <div class="tittle">
          <h3><?php
                /*
                 * Queue the first post, that way we know what author
                 * we're dealing with (if that is the case).
                 *
                 * We reset this later so we can run the loop properly
                 * with a call to rewind_posts().
                 */
                the_post();

                printf( __( 'All posts by %s', 'driveme' ), get_the_author() );
            ?></h3>         
          <hr>
        </div>
        <div class="news-artical products blog">
          <div class="row"> 
            
            <!--======= NEWS ARTICALS =========-->
            <div class="col-md-8">
              <ul class="row">
                <?php 
                    $args=array(
                    'post_type' => 'post',
                    );
                $wp_query=new wp_query($args);
                $i=1;
                while( $wp_query -> have_posts()) : $wp_query -> the_post();        
                    $params = array( 'width' => 358, 'height' => 305 );
                    $thumbnail = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
                    $subtitle= get_post_meta(get_the_ID(), "_cmb_subtitle", true);
                    $video= get_post_meta(get_the_ID(), "_cmb_link_video", true);
                ?>
                <?php  $format = get_post_format($post->ID);?>
                <!--======= NEWS SLIDER 1 =========-->
                <li class="col-md-6" <?php if($i%2==1){?> style="clear: both;" <?php }else{}?>>
                  <div class="prodct artical"> 
                    
                    <!--======= IMAGE =========--> 
                    <img class="img-responsive" src="<?php echo esc_url($thumbnail); ?>" alt=""> 
                    <div class="pro-info"> 
                      
                      <!--======= ITEM NAME / RATING =========-->
                      <div class="cate-name"> <span class="pull-left"><?php the_time('F d, Y') ?></span>
                        <ul class="heart pull-right">
                          <li><i class="fa fa-heart"></i></li>
                        </ul>
                      </div>
                      
                      <!--======= ITEM Details =========--> 
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      <hr>
                      <p><?php if(isset($theme_option['blog_excerpt']) && $theme_option['blog_excerpt'] != ''){ echo driveme_excerpt($theme_option['blog_excerpt']); }else{ echo driveme_excerpt(30); } ?></p>
                      <a href="<?php the_permalink(); ?>" class="btn btn-1"><?php echo esc_attr($theme_option['blog_readmore']);?></a> </div>
                  </div>
                </li>
                <?php $i++; endwhile; ?>                
              </ul>
              <div class="pagination-wrapper">
                <?php driveme_pagination(); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="blog-side-bar"> 
                
                <?php get_sidebar();?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>    		
    <?php
get_footer();
