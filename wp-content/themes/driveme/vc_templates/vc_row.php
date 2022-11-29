<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $full_width = $type_row = $element_id = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'full_width' => '',
    'css' => '',
    'wrap_class'=>'',
    'ses_title'=>'',
    'ses_desc'=>'',
    'animation' => 'no',
    'type_row' => '',
    'ses_id' => '',
    'ses_class' => '',
    'ses_image' => '',
    'text' => '',
    'link' => '',
), $atts));

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
// wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

if($type_row == 'type4'){
  $output .='<div class="'.esc_attr( $css_class ).($full_width == 'stretch_row_content_no_spaces'?' vc_row-no-padding':'').'"  id="'.$element_id.'" '.(!empty( $full_width )?' data-vc-full-width="true"'.($full_width == 'stretch_row_content' || $full_width == 'stretch_row_content_no_spaces'?' data-vc-stretch-content="true"':''):''). $style. '>'; 
     $output .= wpb_js_remove_wpautop($content);
     $output .=''.$this->endBlockComment('row'); 
    $output .='</div><div class="vc_row-full-width"></div>';
}elseif($type_row == 'type2'){
  $output .='<div id="banner">
            <div class="flexslider">
              <ul class="slides">
        ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
 $output .='</ul>
            </div>
          </div>';

}elseif($type_row == 'type1'){

  if($animation == 'no'){   
  $output .='<section id="'.$ses_id.'">
              <div class="container">
                    <div class="testi-slide"> ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
 $output .='</div>
              </div>
            </section>';
 }elseif($animation == 'yes'){
    $output .='<section id="'.$ses_id.'" class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
              <div class="container">
                    <div class="testi-slide"> ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
 $output .='</div>
              </div>
            </section>';

 }


}elseif($type_row == 'type21'){

  $output .='<section id="testimonial">
      <div class="container">
        <div class="testi"> 
          
          <!--======= TESTIMONIALS SLIDERS CAROUSEL =========-->
          <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="row"> 
              ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
     $output .='</div>
              </div>
            </div>
          </div>
        </section>';
}elseif($type_row == 'type3'){

  $output .='<section id="feature">
          <div class="container">';
  if($animation == 'no'){   
  $output .='<div class="tittle">';
  }elseif($animation == 'yes'){
  $output .='<div class="tittle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">';
  }
  $output .='<h3>'.$ses_title.'</h3>
          <p>'.$ses_desc.'</p>
          <hr>
            </div>
            <ul class="row">';



 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
 $output .='</ul>
          </div>
        </section>';
}elseif($type_row == 'type5'){
  if($ses_image != ''){
  $images = wp_get_attachment_image_src($ses_image,'');
   $output .=' <section  id="news" class="'.$ses_class.'" style="background: url('.$images[0].') center center fixed no-repeat; background-size: cover;" >';
  }else{
  $output .='<section  id="news" class="'.$ses_class.'" >';
 }
  $output .='
          <div class="container"> 
            
            <!--======= TITTLE =========-->';

  if($animation == 'no'){
   $output .='<div class="tittle">';
  }elseif($animation == 'yes'){
   $output .='<div class="tittle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">';
    }
    $output .='<h3>'.esc_attr($ses_title).'</h3>
              <p>'.esc_attr($ses_desc).'</p>
              <hr>
            </div>
            <div class="row"> 
        ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
 $output .='</div>
            </div>
          </section>';
}elseif($type_row == 'type6'){

  $output .='<section class="license">
      <div class="container">
        <ul class="row"> 
              ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
     $output .='<div class="text-center"> <a href="'.$link.'" class="btn">'.$text.'</a> </div>
        </ul>
      </div>
    </section>
';
}elseif($type_row == 'type22'){

  $output .='<section id="testimonial-simple">
      <div class="container">
        <div class="testi-slide"> 
              ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
     $output .='</div>
      </div>
    </section>
';
}elseif($type_row == 'type7'){

  $output .='<section class="contact"> 
      <div class="container"> 
        
        <!--======= CONTACT INFORMATION =========-->
        <div class="contact-info">
          <div class="row"> 
              ';
 $output .= wpb_js_remove_wpautop($content);
 $output .=''.$this->endBlockComment('row'); 
     $output .='</div>
        </div>
      </div>
    </section>
';
}else{
  $output .='<div class="'.esc_attr( $css_class ).($full_width == 'stretch_row_content_no_spaces'?' vc_row-no-padding':'').'"  id="'.$element_id.'" '.(!empty( $full_width )?' data-vc-full-width="true"'.($full_width == 'stretch_row_content' || $full_width == 'stretch_row_content_no_spaces'?' data-vc-stretch-content="true"':''):''). $style. '>'; 
  $output .= wpb_js_remove_wpautop($content);
  $output .=''.$this->endBlockComment('row'); 
 $output .='</div><div class="vc_row-full-width"></div>';

}
echo wpautop($output);

