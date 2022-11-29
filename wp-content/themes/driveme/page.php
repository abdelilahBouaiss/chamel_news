<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>
  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="container">
    <h2><?php the_title(); ?></h2>
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
          <h3><?php the_title(); ?></h3>
          <hr>
        </div>
        <div class="news-artical products blog">
          <div class="row">
          <?php if(is_woocommerce_activated()){if((is_woocommerce() || is_cart()) ) { ?>
    				<div class="col-md-12">
            <?php } }else { ?>
              <div class="col-md-8">
              <?php } ?>
              <div class="blog-post">
        				<?php while(have_posts()) : the_post(); ?>
        						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
        							<?php if ( has_post_thumbnail() ) { ?>
        								<?php the_post_thumbnail(); ?>
        							<?php }?>
        							<?php the_content();?>
        							
        							<?php wp_link_pages(); ?>
        						</div>					
        					<?php endwhile; ?>		
              </div>				
    				</div>

            <?php if(is_shop()) { ?>
    				<div class="col-md-4">
    					<div class="blog-side-bar"> 
    					<?php get_sidebar();?>
    					</div>
    				</div>
            <?php }elseif(is_cart() || is_checkout()){

              }else{ ?>
            <div class="col-md-4">
    					<div class="blog-side-bar"> 
    					<?php get_sidebar();?>
    					</div>
    				</div>
            <?php }?>

			     </div>
        </div>
      </div>
    </section>
    
  </div>			

<?php
get_footer();
