<?php
/*
/** Template Name: Teacher
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
    
    <!--======= INSPECTORS =========-->
    <section class="inspectors">
      <div class="container"> 
        
        <!--======= TITTLE =========-->
        <div class="tittle">
          <h3><?php echo esc_attr($theme_option['inspectors_title']); ?></h3>
          <p><?php echo esc_attr($theme_option['inspectors_subtitle']); ?> </p>
          <hr>
        </div>
        
        <!--======= TAB PANEL START =========-->
        <div role="tabpanel">
          <div class="nav-tabs">
            <ul class="nav nav-pills">
            <?php 
				$skills = get_terms('specialized');$i=1;   
					foreach( (array)$skills as $skill){
						$cat_name = $skill->name;
						$cat_slug = $skill->slug;
			?>
              <li role="presentation" class="<?php if($i == 1){echo 'active';}else{} ?>"><a href="#<?php echo esc_attr($cat_slug); ?>" aria-controls="founder" role="tab" data-toggle="tab"><?php echo esc_attr($cat_name); ?></a></li>
            <?php $i++; } ?>
            </ul>
          </div>
          
          <!--======= TAB CONTENT =========-->
          <div class="tab-content"> 
            <?php 
				$skills = get_terms('specialized');$i=1;   
					foreach( (array)$skills as $skill){
						$cat_name = $skill->name;
						$cat_slug = $skill->slug;
			?>
            <!--======= FOUNDER =========-->
            <div role="tabpanel" class="tab-pane <?php if($i == 1){echo 'active';}else{} ?>" id="<?php echo esc_attr($cat_slug); ?>"> 
              <!--======= INSPECTORS ROW =========-->
              
                  <ul class="row">
                    <?php  
						$args = array(   
							'post_type' => 'inspectors',  
							'posts_per_page'	=> -1,
							'taxonomy'	=> 'specialized',
							'term' => $cat_slug,

						);  
						$wp_query = new WP_Query($args);
						$cnt=count($wp_query->posts);
						$j=0;
						while ($wp_query -> have_posts()) : $wp_query -> the_post(); $j++;
						$in_fb= get_post_meta(get_the_ID(), '_cmb_inspectors_fb',true);
						$in_tw= get_post_meta(get_the_ID(), '_cmb_inspectors_tw',true);
						$in_gg= get_post_meta(get_the_ID(), '_cmb_inspectors_gg',true);
						$in_ld= get_post_meta(get_the_ID(), '_cmb_inspectors_ld',true);
						$in_it= get_post_meta(get_the_ID(), '_cmb_inspectors_it',true);
						$in_icon= get_post_meta(get_the_ID(), '_cmb_inspectors_icon',true);
						$in_social= get_post_meta(get_the_ID(), '_cmb_inspectors_social',true);

						$cates = get_the_terms(get_the_ID(),'specialized');
						$cate_name ='';
						$cate_slug = '';
							  foreach((array)$cates as $cate){
								if(count($cates)>0){
									$cate_name .= $cate->name.' ' ;
									$cate_slug .= $cate->slug .' ';     
								} 
						}
				        $params=array('width' => 270,'height' => 270);
				        $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); 
					?>
                    
                    <li class="col-sm-6 col-md-3">
                      <div class="teach">
                        <div class="img-sec"> <img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="" > 
                          
                          <!--=======  TEACHER HOVER =========-->
                          <div class="teach-over"> <a href="#."><i class="fa fa-plus"></i></a> </div>
                        </div>
                        <h6><?php the_title(); ?></h6>
                        <p><span><?php echo esc_attr($cate_name); ?></span></p>
                        <p><?php the_content(); ?></p>
                        
                        <!--======= SOCIAL ICON =========-->
                        <ul class="social_icons">
                        <?php if($in_fb != ''){ ?>
                          <li class="facebook"><a href="<?php echo esc_url($in_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php }else{} ?>
                        <?php if($in_tw != ''){ ?>
                          <li class="twitter"><a href="<?php echo esc_url($in_tw); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php }else{} ?>
                        <?php if($in_gg != ''){ ?>
                          <li class="googleplus"><a href="<?php echo esc_url($in_gg); ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php }else{} ?>
                        <?php if($in_ld != ''){ ?>
                          <li class="linkedin"><a href="<?php echo esc_url($in_ld); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php }else{} ?>
                        <?php if($in_it != ''){ ?>
                          <li class="instagram"><a href="<?php echo esc_url($in_it); ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php }else{} ?>
                        <?php if($in_icon != ''){ ?>
                          <li><a href="<?php echo esc_url($in_social); ?>"><i class="fa <?php echo esc_attr($in_icon); ?>"></i></a></li>
                        <?php }else{} ?>
                        </ul>
                      </div>
                    </li>
                    <?php
					if($j%4==0 && $cnt>$j)
					{
					?>
                    </ul>
                    <ul class="row">
                    <?php
					}
					?>
                    <?php endwhile; ?>
                  </ul>
             
            </div>
            <?php $i++; } ?>

          </div>
        </div>
      </div>
    </section>
    
    <!--======= INTRESTED =========-->
    <section class="intrested intrested-2">
      <div class="container"> 
        
        <!--======= LESSON =========-->
        <div class="intres-lesson">
          <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis biben<br>
            dum auctor, nisi elit consequat ipsum, massa nisl quis neque. Suspendisse in orci enim.</h3>
          
          <!--======= FORM =========-->
          <form method="post" action="<?php echo home_url(); ?>/?page_id=40">
            <ul class="row">
              
              <!--======= INPUT NAME =========-->
              <li class="col-sm-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="Name" placeholder="Your Name">
                  <span class="fa fa-user"></span> </div>
              </li>
              
              <!--======= INPUT EMAIL =========-->
              <li class="col-sm-3">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Your Email">
                  <span class="fa fa-envelope"></span> </div>
              </li>
              
              <!--======= INPUT PHONE NUMBER =========-->
              <li class="col-sm-3">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone">
                  <span class="fa fa-phone"></span> </div>
              </li>
              
              <!--======= INPUT SELECT =========-->
              <li class="col-sm-3">
                <div class="form-group">
                  <select name="courses-type">
                    <?php 
                      $args=array(
                      'post_type' => 'courses',
                                  );
                      $wp_query=new WP_Query($args);
                        $i=1;
                        $countrys=array();
                        $countrys[0]=$name1;
                        while($wp_query->have_posts()): $wp_query->the_post();
                        $cat_name='';
                        $categories=get_the_terms(get_the_ID(), 'categories');
                        if ( $categories && ! is_wp_error( $categories ) ) : 
                        foreach((array)$categories as $categorie){                            
                            $cat_name=$categorie->name; 
                            $slug=$categorie->slug;                                                                
                            }
                        endif; 
                        if (!in_array($cat_name, $countrys) && $cat_name!='') {
                        $countrys[$i] = $cat_name;
                        $i++;
                        echo '<option value="'.$cat_name.'">'.$cat_name.'</option>';
             
                       }
                        endwhile;?>
                  </select>
                  <span class="fa fa-file-text-o"></span> </div>
              </li>
            </ul>
            
            <!--======= BUTTON =========-->
            <div class="text-center">
              <button class="btn">GET A QUOTE</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    
    <!--======= INSPECTORS =========-->
    <section class="inspectors">
      <div class="container"> 
        
        <!--======= INSPECTORS ROW =========-->
        <div class="row">
          <div class="col-md-12">
            <ul class="row">
              <?php  
              		$numb=$theme_option['inspectors_number'];
					$args = array(   
						'post_type' => 'inspectors',  
						'posts_per_page'	=> $numb,

					);  
					$wp_query = new WP_Query($args);
					$cnt=count($wp_query->posts);
					$c=0;
					while ($wp_query -> have_posts()) : $wp_query -> the_post(); $c++;
					$in_fb= get_post_meta(get_the_ID(), '_cmb_inspectors_fb',true);
					$in_tw= get_post_meta(get_the_ID(), '_cmb_inspectors_tw',true);
					$in_gg= get_post_meta(get_the_ID(), '_cmb_inspectors_gg',true);
					$in_ld= get_post_meta(get_the_ID(), '_cmb_inspectors_ld',true);
					$in_it= get_post_meta(get_the_ID(), '_cmb_inspectors_it',true);
					$in_icon= get_post_meta(get_the_ID(), '_cmb_inspectors_icon',true);
					$in_social= get_post_meta(get_the_ID(), '_cmb_inspectors_social',true);

					$cates = get_the_terms(get_the_ID(),'specialized');
					$cate_name ='';
					$cate_slug = '';
						  foreach((array)$cates as $cate){
							if(count($cates)>0){
								$cate_name .= $cate->name.' ' ;
								$cate_slug .= $cate->slug .' ';     
							} 
					}
			        $params=array('width' => 270,'height' => 270);
			        $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); 
				?>
              
                <li class="col-sm-6 col-md-3">
                  <div class="teach">
                    <div class="img-sec"> <img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="" > 
                      
                      <!--=======  TEACHER HOVER =========-->
                      <div class="teach-over"> <a href="#."><i class="fa fa-plus"></i></a> </div>
                    </div>
                    <h6><?php the_title(); ?></h6>
                    <p><span><?php echo esc_attr($cate_name); ?></span></p>
                    <p><?php the_content(); ?></p>
                    
                    <!--======= SOCIAL ICON =========-->
                    <ul class="social_icons">
                    <?php if($in_fb != ''){ ?>
                      <li class="facebook"><a href="<?php echo esc_url($in_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php }else{} ?>
                    <?php if($in_tw != ''){ ?>
                      <li class="twitter"><a href="<?php echo esc_url($in_tw); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php }else{} ?>
                    <?php if($in_gg != ''){ ?>
                      <li class="googleplus"><a href="<?php echo esc_url($in_gg); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php }else{} ?>
                    <?php if($in_ld != ''){ ?>
                      <li class="linkedin"><a href="<?php echo esc_url($in_ld); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php }else{} ?>
                    <?php if($in_it != ''){ ?>
                      <li class="instagram"><a href="<?php echo esc_url($in_it); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php }else{} ?>
                    <?php if($in_icon != ''){ ?>
                      <li><a href="<?php echo esc_url($in_social); ?>"><i class="fa <?php echo esc_attr($in_icon); ?>"></i></a></li>
                    <?php }else{} ?>
                    </ul>
                  </div>
                </li>
                <?php
					if($c%4==0 && $cnt>$c)
					{
					?>
                    </ul>
                    <ul class="row">
                    <?php
					}
				?>
                <?php endwhile; ?>
              
            </ul>
          </div>
        </div>
        <div class="text-center margin-t-80"> <a href="#." class="btn">JOIN our team</a> </div>
      </div>
    </section>
</div>
<?php get_footer(); ?>