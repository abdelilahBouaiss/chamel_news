<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php 
global $theme_option; 
global $wp_query;
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_keywords", true);
?>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Page Title 
  ================================================== -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <!-- For SEO -->
  <?php if($seo_description!="") { ?>
  <meta name="description" content="<?php echo esc_attr($seo_description); ?>">
  <?php }elseif($theme_option['seo_des']){ ?>
  <meta name="description" content="<?php echo esc_attr($theme_option['seo_des']); ?>">
  <?php } ?>
  <?php if($seo_keywords!="") { ?>
  <meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>">
  <?php }elseif($theme_option['seo_key']){ ?>
  <meta name="keywords" content="<?php echo esc_attr($theme_option['seo_key']); ?>">
  <?php } ?>
  <!-- End SEO-->
  
  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="<?php if(isset($theme_option['favicon']['url'])){ echo esc_url($theme_option['favicon']['url']);}else{} ?>" type="image/png">
  <link rel="apple-touch-icon" href="<?php if(isset($theme_option['apple_icon']['url'])){ echo esc_url($theme_option['apple_icon']['url']);}else{} ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php if(isset($theme_option['apple_icon_72']['url'])){ echo esc_url($theme_option['apple_icon_72']['url']);}else{} ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php if(isset($theme_option['apple_icon_114']['url'])){ echo esc_url($theme_option['apple_icon_114']['url']);}else{} ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php if(isset($theme_option['apple_icon_144']['url'])){ echo esc_url($theme_option['apple_icon_144']['url']);}else{} ?>">
  
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php if(get_post_meta($wp_query->get_queried_object_id(), "_cmb_disable_preloader", true)!='on' && $theme_option['theme_preloader']){
?>
<div class="work-in-progress">
            <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
<?php }?>
<?php if( $theme_option['setting_panel'] == 1 ){ ?>
<!--======= COLOR SWITCHER =========-->
<div class="color-switcher" id="choose_color"> <a href="#." class="picker_close"><i class="fa fa-gear fa-spin" ></i></a>
  <div class="theme-colours">
    <p>Settings</p>
    <ul>
      <li class="change"><a data-color-hex="#5687bf" id="blue-1" href="#" title="blue-1" style="background-color: rgb(86, 135, 191);"><strong>blue-1</strong></a></li>
      <li class="change"><a data-color-hex="#a0913d" id="gold" href="#" title="gold" style="background-color: rgb(160, 145, 61);"><strong>gold</strong></a></li>
      <li class="change"><a data-color-hex="#dc143c" id="red-1" href="#" title="red-1" style="background-color: rgb(220, 20, 60);"><strong>red-1</strong></a></li>
      <li class="change"><a data-color-hex="#3c3c3c" id="gray" href="#" title="gray" style="background-color: rgb(60, 60, 60);"><strong>gray</strong></a></li>
      <li class="change"><a data-color-hex="#d80018" id="red-2" href="#" title="red-2" style="background-color: rgb(216, 0, 24);"><strong>red-2</strong></a></li>
      <li class="change"><a data-color-hex="#22A7F0" id="blue-2" href="#" title="blue-2" style="background-color: rgb(34, 167, 240);"><strong>blue-2</strong></a></li>
      <li class="change"><a data-color-hex="#2e9063" id="green-1" href="#" title="green-1" style="background-color: rgb(46, 144, 99);"><strong>green-1</strong></a></li>
      <li class="change"><a data-color-hex="#89c144" id="green-2" href="#" title="green-2" style="background-color: rgb(137, 193, 68);"><strong>green-2</strong></a></li>
      <li class="change"><a data-color-hex="#f1be03" id="yellow-1" href="#" title="yellow-1" style="background-color: rgb(241, 190, 3);"><strong>yellow-1</strong></a></li>
      <li class="change"><a data-color-hex="#e3c552" id="yellow-2" href="#" title="yellow-2" style="background-color: rgb(227, 197, 82);"><strong>yellow-2</strong></a></li>
      <li class="change"><a data-color-hex="#e47911" id="orange-1" href="#" title="orange-1" style="background-color: rgb(228, 121, 17);"><strong>orange-1</strong></a></li>
      <li class="change"><a data-color-hex="#e48f4c" id="orange-2" href="#" title="orange-2" style="background-color: rgb(228, 143, 76);"><strong>orange-2</strong></a></li>
      <li class="change"><a data-color-hex="#563d7c" id="purple-1" href="#" title="purple-1" style="background-color: rgb(86, 61, 124);"><strong>purple-1</strong></a></li>
      <li class="change"><a data-color-hex="#685ab1" id="purple-2" href="#" title="purple-2" style="background-color: rgb(104, 90, 177);"><strong>purple-2</strong></a></li>
      <li class="change"><a data-color-hex="#ec005f" id="pink" href="#" title="pink" style="background-color: rgb(236, 0, 95);"><strong>pink</strong></a></li>
      <li class="change"><a data-color-hex="#b8a279" id="cumin" href="#" title="cumin" style="background-color: rgb(184, 162, 121);"><strong>cumin</strong></a></li>
      <li style="width:100%;" >
        <p>Layout Version</p>
        </li>
      <li class="box-lay"><a href="<?php echo esc_url($theme_option['st_link1']); ?>">BOX</a></li>
      <li class="box-lay"><a href="<?php echo esc_url($theme_option['st_link2']); ?>">WIDE</a></li>
      <li style="width:100%;"><a id="default" href="<?php echo esc_url($theme_option['st_link2']); ?>" title="cumin" style="width:100%;"><?php esc_html_e('Reset settings', 'driveme') ?></a></li>
    </ul>
  </div>
</div>
<?php }else{} ?>
<!--======= WRAPPER =========-->
<div id="wrap"> 
   <?php if($theme_option['layout_style']=='boxed'){?>
  <div class="boxed">
	  <?php }?>
  <!--======= TOP BAR =========-->
  <div class="top-bar">
    <div class="container">
      <ul class="left-bar-side">
      <?php if($theme_option['headerl_link1'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_link1']); ?>"><?php echo esc_attr($theme_option['headerl_text1']); ?> </a> - </li>
      <?php }else{}?>
      <?php if($theme_option['headerl_link2'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_link2']); ?>"><?php echo esc_attr($theme_option['headerl_text2']); ?> </a> - </li>
      <?php }else{}?>
      <?php if($theme_option['headerl_link3'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_link3']); ?>"><?php echo esc_attr($theme_option['headerl_text3']); ?> </a> - </li>
      <?php }else{}?>
      <?php if($theme_option['headerl_facebook'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_facebook']); ?>"><i class="fa fa-facebook"></i></a> - </li>
      <?php }else{}?>
      <?php if($theme_option['headerl_twitter'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_twitter']); ?>"><i class="fa fa-twitter"></i></a> - </li>
      <?php }else{}?>
      <?php if($theme_option['headerl_linkedin'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
      <?php }else{}?>
      <?php if($theme_option['headerl_icon'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerl_link']); ?>"><i class="fa <?php echo esc_attr($theme_option['headerl_icon']); ?>"></i></a></li>
      <?php }else{}?>
      </ul>
      <ul class="right-bar-side">
      <?php if($theme_option['headerr_link1'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerr_link1']); ?>"><i class="fa fa-comment"></i> <?php echo esc_attr($theme_option['headerr_text1']); ?> </a></li>
      <?php }else{}?>
      <?php if($theme_option['headerr_link2'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerr_link2']); ?>"><i class="fa fa-phone"></i> <?php echo esc_attr($theme_option['headerr_text2']); ?> </a></li>
      <?php }else{}?>
      <?php if($theme_option['headerr_link3'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerr_link3']); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr($theme_option['headerr_text3']); ?> </a></li>
      <?php }else{}?>
      <?php if($theme_option['headerr_icon'] != '' ){ ?>
        <li> <a href="<?php echo esc_url($theme_option['headerr_link']); ?>"><i class="fa <?php echo esc_attr($theme_option['headerr_icon']); ?>"></i> <?php echo esc_attr($theme_option['headerr_text4']); ?> </a></li>
      <?php }else{}?>
      </ul>
    </div>
  </div>
  
  <!--======= HEADER =========-->
  <header class="sticky">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
          <!--======= LOGO =========--> 
          <div class="logo"> 
            <a href="<?php echo home_url(); ?>"> 
            <?php if($theme_option['logo_style'] == 'image'){ ?>
              <img src="<?php echo esc_url($theme_option['logo_image']['url']); ?>"> 
            <?php }else{ ?>
            <?php echo esc_attr($theme_option['logo_text']);?>    
            <?php } ?>
            </a> 
          </div> 
        </div>
        
        <!--======= MENU =========-->
        <div class="collapse navbar-collapse" id="nav-res">
          <?php
          $primarymenu = array(
            'theme_location'  => 'onepage',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav navbar-nav',
            'menu_id'         => '',
            'echo'            => true,
             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
             'walker'            => new wp_bootstrap_navwalker(),
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            );
            if ( has_nav_menu( 'primary' ) ) {
              wp_nav_menu( $primarymenu );
            }
          ?>
        </div>
      </nav>
    </div>
  </header>