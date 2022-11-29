<?php
require_once( '../../../../wp-load.php' );

header("Content-type: text/css; charset=utf-8");
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values
}

$parallax_overlay = hex2rgb($theme_option['main-color']);
$footers = hex2rgb($theme_option['footer-bg']);

global $theme_option; 

?>

/*============================================

    'Hex': '#5687bf',  'colorName': 'blue-1'

============================================*/
.dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
  background-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#pricing li:hover .price-inner {
    border: 1px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
#pricing li:hover .btn {
  background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#banner .text-slider h3, .port-over .over-info, .inspectors .teach-over, #testimonial .carousel-indicators li .feeder-name {
    background: rgba(<?php echo esc_attr($parallax_overlay[0]) ?>, <?php echo esc_attr( $parallax_overlay[1] ) ?>, <?php echo esc_attr( $parallax_overlay[2] ); ?>,0.8);
}
#accordion .panel-default > .panel-heading .panel-title a:before {
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#accordion .panel-default > .panel-heading .panel-title a.collapsed:before, .missing-2 .cont .change {
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#banner .text-slider .btn {
    border: 2px solid #fff;
    background: rgba(0,0,0,0.2);
}
#banner .text-slider button.btn {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
    border: none;
}
#banner .text-slider button.btn:hover {
    background: rgba(0,0,0,0.5);
}
#feature li a:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.2);
}
#banner .text-slider .btn:hover {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
    border-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.top-bar, header nav li a:hover {
    border-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.pagination > li > a:hover, .intrested-2 {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#pricing.pricing-2 .price-inner.papu {
    border-top-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#banner .text-slider p {
    background: rgba(0,0,0,0.5);
}
.tittle h3, #feature li:hover .icon, .port-over .over-info a:hover {
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#pricing .price-inner .check-gr i {
    color: <?php echo esc_attr($theme_option['main-color']); ?> !important;
}
#pricing .price-inner .btn, .logo a .logo-hex {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
#pricing .price-inner .btn:hover {
    background: #4d4d4d;
}
.quote .btn:hover {
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
header .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
header .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    border-bottom: 2px solid <?php echo esc_attr($theme_option['main-color']); ?>;
    color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.btn, .intrested-2 .intres-lesson .btn {
    background: #4d4d4d;
}
.btn:hover, .intrested-2 .intres-lesson .btn:hover {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.quote, footer button, .intres-lesson .btn, .products .pro-info .btn, .nav-tabs .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.products .pro-info .btn-1 {
    background: #f8f8f8;
}
#feature li:hover .inner, .filter li a.active, .filter li a:hover, .products .pro-info .btn-1:hover {
    background: <?php echo esc_attr($theme_option['main-color']); ?>;
    border-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}

.products .pro-info .btn {
}
#pricing.pricing-2 li .price-head {
    background: none !important;
}

.products .cate-name .heart li i:hover {
  color: <?php echo esc_attr($theme_option['main-color']); ?>;
  }
div#respond p.form-submit input#submit{
  background: <?php echo esc_attr($theme_option['main-color']); ?>;  
}

.contact-info .social_icons{
    z-index:1px;
}
form#wp-stripe-payment-form .stripe-submit-button {
    background: <?php echo esc_attr($theme_option['main-color']); ?> !important; 
}
.where a,.where a i {
  color: <?php echo esc_attr($theme_option['main-color']); ?>;
}

.top-bar {
  background: <?php echo esc_attr($theme_option['header-topbar']); ?>;
}
footer .rights {
  background: <?php echo esc_attr($theme_option['footer-right']); ?>;
}
footer{
  background: <?php echo esc_attr($theme_option['footer-bg']); ?>;
}


body{font-family:'<?php if($theme_option['body-font']['font-family'] != '') {echo esc_attr( $theme_option['body-font']['font-family'] );}else{echo "'Roboto', sans-serif";} ?>';font-size:<?php echo esc_attr( $theme_option['body-font']['font-size'] ); ?> !important;color:<?php echo esc_attr( $theme_option['body-font']['color'] ); ?>;}

<?php echo esc_attr( $theme_option['custom-css'] ); ?>