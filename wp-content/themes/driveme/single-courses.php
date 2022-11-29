<?php

/*
 * The Template for displaying all single posts
 */

global $theme_option; 

get_header(); 



?>

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



      <!--======= RODUCTS =========-->

      <section class="products prodct-single"> 



        <!--======= PRODUCTS ROW =========-->

        <div class="row">

          <?php 

          while(have_posts()) :the_post();

          $name= get_post_meta(get_the_ID(),"_cmb_courses_name",true);

          $address= get_post_meta(get_the_ID(),"_cmb_courses_address",true);

          $lat= get_post_meta(get_the_ID(),"_cmb_courses_lat",true);

          $long= get_post_meta(get_the_ID(),"_cmb_courses_long",true);

          $time= get_post_meta(get_the_ID(),"_cmb_courses_time",true);

          $city= get_post_meta(get_the_ID(),"_cmb_courses_city",true);

          // map location
          $locations_items = get_post_meta(get_the_ID(), '_cmb_location_map', true);

          

          $styles=get_post_meta(get_the_ID(),"_cmb_courses_sidebar",true); endwhile;

          if( $styles == 'left'){ ?>

            <!--======= RIGHT SIDEBAR =========-->

            <div class="col-sm-3"> 



              <!--======= RIGHT MAP =========-->

              <div class="right-map">

                <div id="map" class="g_map" style="height:280px;"></div>

                <div class="map-tittle"><i class="fa fa-map-marker"></i> <button class="map-open">Go to LOCATION</button>


                </div>

              </div>

              

              <!--======= When & Where =========-->

              <div class="where">

                <h6><?php echo esc_html_e('When &amp; Where', 'driveme' ); ?></h6>

                <p><strong><?php echo esc_attr($city);?></strong></p>

                <p> <?php echo esc_attr($name) ;?> </p>

                <p> <?php echo esc_attr($address) ;?></p>

                <p> <?php the_time('F d, Y');?></p>

                <p> from <?php echo esc_attr($time) ;?></p>

              </div>

              

              <!--======= TESTIMONIALS SMALL =========-->

              <div class="testi-small">

                <section id="testimonials">

                  <div class="testi-slide"> 



                    <?php

                    $args = array(

                      'paged' => $paged,

                      'posts_per_page'   => $theme_option['inspectors_gallery'],

                      'post_type'         => 'inspectors',

                      'order_by'          => 'date',

                      );

                    $wp_query = new WP_Query($args);

                    while($wp_query->have_posts()) : $wp_query->the_post();

                    $params = array( 'width' => 70, 'height' => 70 );

                    $thumbnails = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

                    $categorie_names ='';

                    $categories = get_the_terms(get_the_ID(),'specialized');

                    foreach( (array)$categories as $categorie){

                     if ( count( $categories ) == 1) {
                      $categorie_names .= $categorie->name;
                    }
                    elseif ( count( $categories ) > 1) { 

                      $categorie_names .= $categorie->name;

                    }

                  }

                  ?>

                  <!--======= SLIDE 1 =========-->

                  <div class="testi">

                    <div class="feed-text">

                      <p><?php if(isset($theme_option['inspectors_excerpt']) && $theme_option['inspectors_excerpt'] != ''){ echo driveme_excerpt($theme_option['inspectors_excerpt']); }else{ echo driveme_excerpt(20); } ?></p>

                      <h5><?php the_title(); ?> <span><?php echo esc_attr($categorie_names); ?> </span></h5>

                    </div>

                    <div class="avatr"> <img src="<?php echo esc_url($thumbnails); ?>" alt="" > </div>

                  </div>

                <?php endwhile;wp_reset_query(); ?>

              </div>

            </section>

          </div>

        </div>

        <?php }else{} 

        ?>



        <div class="col-md-9"> 

          <?php while(have_posts()) :the_post(); 

          $rating=get_post_meta(get_the_ID(),'_cmb_courses_rate', true);

          $price=get_post_meta(get_the_ID(),'_cmb_courses_price', true);

          $video=get_post_meta(get_the_ID(),'_cmb_courses_video', true);

          $styles=get_post_meta(get_the_ID(),"_cmb_courses_sidebar",true);

          $thumbn=get_post_meta(get_the_ID(),"_cmb_courses_timeline",true);

          $params = array( 'width' => 846, 'height' => 360 );

          $thumbnailss = bfi_thumb( $thumbn, $params );

          $categorie_name ='';

          $categories = get_the_terms(get_the_ID(),'categories');
          ?>

          <?php
		  
          foreach( (array)$categories as $categorie){

            if(count($categories) == 1){

              $categorie_name .= $categorie->name; 

            } else {

              $categorie_name .= '<span class="multi-cat">' . $categorie->name . ' , </span>';

            }
          }

          ?>

          <!--======= ITEM 1 =========-->

          <div class="prodct"> 



            <!--======= IMAGE =========--> 

            <img class="img-responsive" src="<?php echo esc_url($thumbnailss); ?>" alt="">

            <div class="pro-info"> 



              <!--======= ITEM NAME / RATING =========-->

              <div class="cate-name"> <span class="pull-left"><?php $catcount=0;if( ! is_wp_error($categories)&& $categories!==false){foreach( (array)$categories as $categorie){?>
              <span class="multi-cat"><a href="<?php echo get_term_link($categorie);?>"><?php echo wp_kses_post($categorie->name);?></a> <?php $catcount++;if($catcount<count($categories)){?>,<?php }?></span>
			  <?php }}//echo wp_kses_post($categorie_name); ?></span>

                <ul class="stars pull-right">

                  <li <?php if($rating == 'zero'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                  <li <?php if($rating == 'zero' || $rating == 'one'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                  <li <?php if($rating == 'zero' || $rating == 'one' || $rating == 'two'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                  <li <?php if($rating == 'zero' || $rating == 'one' || $rating == 'two' || $rating == 'three'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                  <li <?php if($rating == 'zero' || $rating == 'one' || $rating == 'two' || $rating == 'three' || $rating == 'four'){ echo 'class="no-rate"'; }else{}?>><i class="fa fa-star"></i></li>

                </ul>

              </div>



              <!--======= ITEM Details =========-->

              <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
              <span class="price pull-right"><?php echo esc_attr($price); ?></span>

              <hr>
             <?php  $dates_course = get_post_meta( get_the_ID(), '_cmb_mulitple_course_date', true );
			 if(is_array($dates_course)&& count($dates_course)>0){?>
				<?php $dates='';?>
               <?php 
                

				$cnt_dates=0;
                foreach ($dates_course as $date_course) {
                 if(array_key_exists('_cmb_courses_date',$date_course)&& $date_course['_cmb_courses_date']!=''){
				  $dates.= date("j ", $date_course['_cmb_courses_date']);
                  $dates.= date("F ", $date_course['_cmb_courses_date']);
                  $dates.= date("Y", $date_course['_cmb_courses_date']);
				  $cnt_dates++;
				  if($cnt_dates<count($dates_course)){
					  $dates.= ", ";
				  }
				 }
                }
              //the_time('d M, Y' ); ?><?php if($cnt_dates>0&&$dates!=''){?><div><b><?php esc_html_e('Available Dates: ', 'driveme' ); ?></b><?php echo esc_html( $dates );?></div><?php }?>
              <?php }?>
              <?php 
			  $maplocations=get_post_meta(get_the_ID(),'_cmb_location_map',true);
			  if(is_array($maplocations) && count($maplocations)){?>
              <div><b><?php esc_html_e('Locations: ', 'driveme' ); ?></b>
             <?php 
			  $cnt_loc=0;
                foreach ($maplocations as $location) {
                  echo esc_html( $location['location_details'] );
                 
				  $cnt_loc++;
				  if($cnt_loc<count($maplocations)){
					  echo ", ";
				  }
                }?>
			  </div>
              <?php }?>	
              <p><?php the_content();?></p>
              <?php booknow_button(get_the_ID())?>
              <?php if (!empty($video)){?>
              <a href="<?php echo esc_url($video); ?>" class="btn btn-1" target="_blank"><?php echo esc_attr($theme_option['courses_watchvideo']); ?></a> 
              <?php }?>
</div>
            </div>

          <?php endwhile;?>



          <!--======= RODUCTS =========-->

          <div class="related-course">

            <section class="products">

              <h3><?php echo esc_attr($theme_option['courses_releated']); ?></h3>

              <hr>

              <div class="owl-slide">

                <?php 

                $args=array(

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

                  );

                $wp_query=new WP_Query($args);

                $i=1;

                while($wp_query->have_posts()) : $wp_query->the_post();
                $dates_course = get_post_meta( get_the_ID(), '_cmb_mulitple_course_date', true );


                foreach ($dates_course as $date_course) {

                  $ratings=get_post_meta(get_the_ID(),'_cmb_courses_rate', true);

                  $prices=get_post_meta(get_the_ID(),'_cmb_courses_price', true);



                  $params = array( 'width' => 261, 'height' => 222 );

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

                $course_start = get_post_meta( get_the_ID(), '_cmb_courses_date', true );
                date_default_timezone_set('UTC');

                if(!empty($course_start)) {

                  if(date("M", $course_start) <= date('M') ) {

                    if( $i%3==1){

                      ?>

                      <div> 



                        <!--======= PRODUCTS ROW =========-->

                        <ul class="row">

                          <?php }?>      

                          <!--======= ITEM 1 =========-->

                          <li class="col-sm-4">

                            <div class="prodct"> 



                              <!--======= IMAGE =========--> 

                              <img class="img-responsive" src="<?php echo esc_url($thumbnails); ?>" alt=""> 
                              <span class="c-date"><?php 

                                echo esc_attr(date("j", $date_course['_cmb_courses_date'])); ?> <br>

                                <?php echo esc_attr(date("M", $date_course['_cmb_courses_date'])); ?></span> 
                                <span class="c-like"><?php echo cc_love(); ?></span>

                                <div class="pro-info"> 



                                  <!--======= ITEM NAME / RATING =========-->

                                  <div class="cate-name"> <span class="pull-left"><?php echo wp_kses_post($categorie_names); ?></span>

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
                                  <?php booknow_button(get_the_ID())?>
                                  <a href="<?php the_permalink(); ?>" class="btn btn-1"><?php echo esc_attr($theme_option['courses_detail']); ?></a> </div>

                                </div>

                              </li>

                              <?php if( $i%3==0){

                                ?>

                              </ul>

                            </div>                   

                            <?php }

                            $i++;
                          }

                        }
                      }

                      endwhile; ?>

                    </div>

                  </section>

                </div>

              </div>

              <?php 



              if( $styles == 'right'){  ?>

                <!--======= RIGHT SIDEBAR =========-->

                <div class="col-sm-3"> 



                  <!--======= RIGHT MAP =========-->

                  <div class="right-map">

                    <div id="map" class="g_map" style="height:280px;"></div>

                    <div class="map-tittle"><i class="fa fa-map-marker"></i> <button class="map-open"><?php esc_html_e('Go to LOCATION', 'driveme') ?></button></div>

                  </div>

                  <!-- Button trigger modal -->





                  <!--======= When & Where =========-->

                  <div class="where">

                    <h6><?php echo esc_html_e('When &amp; Where', 'driveme' ); ?></h6>

                    <p><strong><?php echo esc_attr($city);?></strong></p>

                    <p> <?php echo esc_attr($name) ;?> </p>

                    <p> <?php echo esc_attr($address) ;?></p>

                    <p> <?php the_time('F d, Y');?></p>

                    <p> from <?php echo esc_attr($time) ;?></p>

                  </div>



                  <!--======= TESTIMONIALS SMALL =========-->

                  <div class="testi-small">

                    <section id="testimonials">

                      <div class="testi-slide"> 



                        <?php

                        $args = array(

                          'paged' => $paged,

                          'posts_per_page'   => $theme_option['inspectors_gallery'],

                          'post_type'         => 'inspectors',

                          'order_by'          => 'date',

                          );

                        $wp_query = new WP_Query($args);

                        while($wp_query->have_posts()) : $wp_query->the_post();

                        $params = array( 'width' => 70, 'height' => 70 );

                        $thumbnails = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

                        $categorie_names ='';

                        $categories = get_the_terms(get_the_ID(),'specialized');

                        foreach( (array)$categories as $categorie){

                         if ( count( $categories ) == 1) {
                          $categorie_names .= $categorie->name ;
                        }
                        elseif ( count( $categories ) > 1) { 

                          $categorie_names .= $categorie->name;

                        }

                      }

                      ?>

                      <!--======= SLIDE 1 =========-->

                      <div class="testi">

                        <div class="feed-text">

                          <p><?php if(isset($theme_option['inspectors_excerpt']) && $theme_option['inspectors_excerpt'] != ''){ echo driveme_excerpt($theme_option['inspectors_excerpt']); }else{ echo driveme_excerpt(20); } ?></p>

                          <h5><?php the_title(); ?> <span><?php echo esc_attr($categorie_names); ?> </span></h5>

                        </div>

                        <div class="avatr"> <img src="<?php echo esc_url($thumbnails); ?>" alt="" > </div>

                      </div>

                    <?php endwhile; ?>

                  </div>

                </section>

              </div>

            </div>

            <?php }else{} 

            ?>

          </div>

        </section>

      </div>

    </section>

  </div>






  


  <div class="gmap-area">

   <div id="map-canvas"></div>
 </div>

 <script type="text/javascript">


  $(".map-open").on( 'click', function(e){
    $(".gmap-area").css('visibility', 'visible');
     $("body").addClass('map-overlay');
    e.stopPropagation();
  });

  $(".gmap-area").on( 'click', function(e){
    e.stopPropagation();
  });

  $(document).on( 'click', function(){
    $(".gmap-area").css('visibility', 'hidden');
    $("body").removeClass('map-overlay');
  });


/*   - Google Map - with support of gmaps.js 
--------------------------------------------------------------------*/
function initialize() {
  var locations = [

  <?php 
  $i = 0;
  if (is_array($locations_items)) {
   foreach ($locations_items as $key => $value) {
    $i++;
    ?>
    ['<div class="map-desc"><img src="<?php echo esc_url($value['location_logo']); ?>"><?php echo esc_html($value['location_details']); ?></div>', <?php echo esc_html($value['location_lat']); ?>,<?php echo esc_html($value['location_lan']); ?>, <?php echo esc_html( $i ); ?>],
    <?php } } ?>

    ];
    myLatlng = new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>);

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      scrollwheel: false,
      center: myLatlng, 
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i, locationadded;
	i=0;
	locationadded=false;
	if(locations.length>0){
    for (i = 0; i < locations.length; i++) { 
	if(locations[i][1]!='' &&  locations[i][2]!='' && typeof(locations[i][1])!='undefined' && typeof(locations[i][2])!= 'undefined' ){
		
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  map.setCenter(marker.getPosition());
	  locationadded=true;
	}
	if(!locationadded){
		i=0;
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>),
        icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
        map: map
      });
	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?php echo esc_html( $address )?>');
          infowindow.open(map, marker);
        }
      })(marker, i));
	}
    }
	}else
	{
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>),
        icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
        map: map
      });
	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?php echo esc_html( $address )?>');
          infowindow.open(map, marker);
        }
      })(marker, i));
	}
  }



  jQuery(function(){
    if(!window.google||!window.google.maps){
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = 'https://maps.googleapis.com/maps/api/js?v=3&' +
      'callback=initialize';
      document.body.appendChild(script);
    } else {
      initialize();

    }});


  /*   - Google Map - with support of gmaps.js End 
  --------------------------------------------------------------------*/


  /*
  *   modal
  * -----------------------------------------------------------------------------------------*/
  jQuery(document).ready(function(e) {

    var map;

    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {

      var locations = [

      <?php 
      $i = 0;
      if (is_array($locations_items)) {
       foreach ($locations_items as $key => $value) {
        $i++;
        ?>
        ['<div class="map-desc"><img src="<?php echo esc_url($value['location_logo']); ?>"><?php echo esc_html($value['location_details']); ?></div>', <?php echo esc_html($value['location_lat']); ?>,<?php echo esc_html($value['location_lan']); ?>, <?php echo esc_html( $i ); ?>],
        <?php } } ?>

        ];
        myLatlng = new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>);

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 14,
          scrollwheel: false,
          center: myLatlng, 
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i,locationadded;
		i=0;
		locationadded=false;
		if(locations.length>0){
        for (i = 0; i < locations.length; i++) {  
		if(locations[i][1]!='' &&  locations[i][2]!='' && typeof(locations[i][1])!='undefined' && typeof(locations[i][2])!= 'undefined' ){
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
		  map.setCenter(marker.getPosition());
		  locationadded=true;
		}
		if(!locationadded){
		i=0;
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>),
        icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
        map: map
      });
	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?php echo esc_html( $address )?>');
          infowindow.open(map, marker);
        }
      })(marker, i));
	}
        }
		
		}else
	{
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo esc_attr($lat); ?>, <?php echo esc_attr($long); ?>),
        icon: '<?php echo get_template_directory_uri();?>/images/map-locator.png',
        map: map
      });
	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?php echo esc_html( $address )?>');
          infowindow.open(map, marker);
        }
      })(marker, i));
	}
	
      }



    });
  </script>

  <?php get_footer();?>