<?php

/*

/** Template Name: Courses 

*/

global $theme_option;

$textdoimain = 'driveme';

get_header(); ?>

<!--======= BANNER =========-->

<div class="sub-banner">

  <div class="container">

    <h2><?php echo esc_attr($theme_option['courses_title']); ?></h2>

    <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>

  </div>

</div>

<!--======= CONTENT START =========-->

<div class="content"> 



  <!--======= INTRESTED =========-->

  <section class="courses">

    <div class="container"> 

      <!--======= TITTLE =========-->

      <div class="tittle">

        <h3><?php echo esc_attr($theme_option['courses_title']); ?></h3>

        <p><?php echo esc_attr($theme_option['courses_subtitle']); ?></p>

        <hr>

      </div>

      <div class="intres-lesson"> 



        <!--======= FORM =========-->

        <form method="post" action="<?php echo esc_url($theme_option['courses_linksearch']); ?>">

          <ul class="row">



            <!--======= INPUT NAME =========-->

            <li class="col-sm-3">

              <div class="form-group">

                <select class="form-control" name="courses-name">

                  <option value="null">Search</option>

                  <?php 

                  $args=array(

                    'post_type' => 'courses',

                    );

                  $wp_query=new WP_Query($args);

                  $i=1;

                 
                  $arr = array();
                  while($wp_query->have_posts()): $wp_query->the_post();
                   $name[0] = get_post_meta(get_the_ID(),'_cmb_courses_name', true);

                  $value = get_post_meta(get_the_ID(),'_cmb_courses_name', true);
                 $arr[] = $value; ?>

                   

                    <?php   $i++;

                    endwhile;
                    $results = array_unique($arr);
                    foreach ($results as  $result) {
                    ?>

                  
                     <option value="<?php echo esc_attr( $result ); ?>"><?php echo esc_html( $result ); ?></option>
                    <?php } ?>
                  </select>
                  <?php 
                  
                  //print_r($result);
                  ?>
                  <span class="fa fa-file-text-o"></span> </div>

                </li>

                

                <!--======= INPUT EMAIL =========-->

                <li class="col-sm-3">

                  <div class="form-group">

                    <select class="form-control" name="courses-address">

                      <option value="null">Select Location</option>

                      <?php 

                      $args=array(

                        'post_type' => 'courses',

                        );

                      $wp_query=new WP_Query($args);

                      $i=1;

                      $locations[0] = get_post_meta($id,'_cmb_courses_address', true);
                      $arr1 = array();
                      while($wp_query->have_posts()): $wp_query->the_post();

                      $value = get_post_meta(get_the_ID(),'_cmb_courses_address', true);
                      $arr1[] = $value;



                        endwhile;
                         $results1= array_unique($arr1);
                    foreach ($results1 as  $result) {
                    ?>

                  
                     <option value="<?php echo esc_attr( $result ); ?>"><?php echo esc_html( $result ); ?></option>
                    <?php } ?>
                        ?>

                        

                      </select>

                      <span class="fa fa-map-marker"></span> </div>

                    </li>

                    

                    <!--======= INPUT SELECT =========-->

                    <li class="col-sm-3">

                      <div class="form-group">

                        <select class="form-control" name="courses-type">

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

                        

                        <!--======= INPUT PHONE NUMBER =========-->

                       <!--  <li class="col-sm-2">

                          <div class="form-group">

                            <input type="text" class="form-control" id="datepicker" placeholder="Course From" name="courses-date">

                            <span class="fa fa-calendar"></span> </div>

                          </li> -->

                          <li class="col-sm-3">

                            <button type="submit" id="availability_submit" name="availability_submit" class="btn">Search</button>

                          </li>

                        </ul>

                      </form>

                    </div>

                    <?php 

  ?>

  <section class="products"> <ul class="row">

    <?php 
    $monts = array();

    $query = new WP_Query( array( 
      'post_type' => 'courses',
      'meta_query'  => array(
        array(
          'key' => '_cmb_mulitple_course_date',
          'value' => time(),
          'compare' => '>='
          )
        ),
      'order' => 'ASC',
      'orderby' => 'meta_value',
      'meta_key' => '_cmb_mulitple_course_date',
      ) );
	  $cnt=count($query->posts);
	$post_count=0;
    while($query->have_posts()): $query->the_post();
	$post_count++;
    $dates_course = get_post_meta( get_the_ID(), '_cmb_mulitple_course_date', true );


   

     $params = array( 'width' => 358, 'height' => 305 );
     $thumbnail = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
     $subtitle= get_post_meta(get_the_ID(), "_cmb_subtitle", true);
     $video= get_post_meta(get_the_ID(), "_cmb_link_video", true);

     $ratings=get_post_meta(get_the_ID(),'_cmb_courses_rate', true);

     $prices=get_post_meta(get_the_ID(),'_cmb_courses_price', true);



     $params = array( 'width' => 277, 'height' => 236 );

     $thumbnails = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

     $categorie_names ='';

     $categories = get_the_terms(get_the_ID(),'categories');

     foreach( (array)$categories as $categorie){

       if ( count( $categories ) == 1) {
        $categorie_names .= $categorie->name ;
      }
      elseif ( count( $categories ) > 1) { 
        $categorie_names .= '<span class="multi-cat">' . $categorie->name . ' , </span>';
      }

    }

    $course_start = date("M Y", $date_course['_cmb_courses_date']);
    $course_start_init = strtotime($course_start);
    $current_month = strtotime(date('M Y'));


    
    ?>



            

            <li class="col-sm-6 col-md-3">

              <div class="prodct"> 



                <!--======= IMAGE =========--> 

                <img class="img-responsive" src="<?php echo esc_url($thumbnails); ?>" alt=""> 
                 
                  <span class="c-like"><?php echo cc_love(); ?></span>

                <div class="pro-info"> 



                  <!--======= ITEM NAME / RATING =========-->

                  <div class="cate-name"> <span class="pull-left"><?php echo wp_kses_post($categorie_names)?></span>

                    <ul class="stars pull-right">

                      <li <?php if($ratings == 'zero'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                      <li <?php if($ratings == 'zero' || $ratings == 'one'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                      <li <?php if($ratings == 'zero' || $ratings == 'one' || $ratings == 'two'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                      <li <?php if($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                      <li <?php if($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three' || $ratings == 'four'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                    </ul>

                  </div>



                  <!--======= ITEM Details =========--> 

                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                  <hr>

                  <span class="price"><?php echo esc_attr($prices); ?></span> 

                  <?php  $courseid=get_the_ID();  booknow_button($courseid)?>

                  <a href="<?php the_permalink(); ?>" class="btn btn-1"><?php echo esc_attr($theme_option['courses_detail']); ?></a> </div>

                </div>

              </li>






      
      <?php
		if($post_count%4==0 && $cnt>$post_count){?>
        </ul>
        <ul class="row">
        <?php }
      endwhile; wp_reset_query();
      ?>



    </ul>
  </section>


  <div class="pagination-wrapper">

    <?php driveme_pagination(); ?>

  </div>


</div>
</section>

<?php get_footer();?>