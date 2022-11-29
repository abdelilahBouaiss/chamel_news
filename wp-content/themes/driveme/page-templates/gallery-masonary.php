<?php
/*
/** Template Name: Gallery Masonary
*/
 global $theme_option;
 $textdoimain = 'driveme';
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
    
    <div class="gallery-page">
    
    <!--======= PORTFOLIO =========-->
    <section id="portfolio">
      <div class="portfolio portfolio-filter">
        <div class="container"> 
          
          <!--======= TITTLE =========-->
          <div class="tittle">
            <h3><?php echo esc_attr($theme_option['gallery_title']); ?></h3>
            <p><?php echo esc_attr($theme_option['gallery_subtitle']); ?></p>
            <hr>
          </div>
        </div>
        
        <!--======= PORTFOLIO ITEMS =========-->
        <div class="portfolio-wrapper">
          <div class="container"> 
            
            <!--======= PORTFOLIO FILTER =========-->
            <ul class="filter">
              <li><a class="active" href="#." data-filter="*"><?php echo esc_attr($theme_option['gallery_all']) ?></a></li>
            <?php 
				$skills = get_terms('skills');   
					foreach( (array)$skills as $skill){
						$cat_name = $skill->name;
						$cat_slug = $skill->slug;
			?>
              <li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?> </a></li>
            <?php } ?>
            </ul>
        <div class="row">
          
              <?php 
          $postper= $theme_option['gallery_one'];  
					$args = array(   
						'post_type' => 'gallery',  
						'posts_per_page'	=> 8,
					);  
					$wp_query = new WP_Query($args);$i=1;
					while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $style_ms = get_post_meta(get_the_ID(),'_cmb_gallery_masonary',true);
					$cates = get_the_terms(get_the_ID(),'skills');
					$cate_name ='';
					$cate_slug = '';
						  foreach((array)$cates as $cate){
							if(count($cates)>0){
								$cate_name .= $cate->name.' ' ;
								$cate_slug .= $cate->slug .' ';     
							} 
					}
			        $params=array('width' => 204,'height' => 204);
			        $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); 
				?>
        <?php if($i%4 == 1) { ?>
            <div class="col-md-6">
              <ul class="items">
        <?php } ?>
              <!--======= PORTFOLIO ITEM =========-->
              <li class="item width-<?php if($style_ms == 'half'){ echo '50'; }elseif ($style_ms == 'full') {
                echo '100';
              }?>  <?php echo esc_attr($cate_slug); ?>">
                <div class="port-over"> <img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id())?>" alt="" >
                  <div class="over-info">
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo esc_attr($theme_option['gallery_in']);?> <?php echo get_post_meta(get_the_ID(),'_cmb_gallery_location',true); ?></p>
                    <!--======= POP UP IMAGE =========-->
                    <div class="gallery-pop"> <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id())?>" data-source="<?php echo wp_get_attachment_url(get_post_thumbnail_id())?>" title="Into The Blue" ><i class="fa fa-search"></i></a> </div>
                    <!--======= HEART =========-->
                    <a href="#."><i class="fa fa-heart"></i></a> </div>
                </div>
              </li>
        <?php if($i%4 == 0) { ?>
            </ul>
        </div> 
        <?php } ?>
              <?php $i++; endwhile; ?>
          </div>     
             
          </div>
        </div>
      </section>
  </div>
</div>
<?php  get_footer();?>