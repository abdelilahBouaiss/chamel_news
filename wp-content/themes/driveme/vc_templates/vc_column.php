<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'wap_class' => '',
	'column_id' => '',
	'title' =>'',
	'type' => '',
	'animation' => 'no',
	'text' => '',
	'link' => '',
	'desc' => '',
), $atts));

if($type == 'column'){

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);



//$column_id = (!empty($column_id) ? ' id="'.esc_attr($column_id).'"' : '');

$el_class .= '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
if($animation != 'yes'){
$output .= "\n\t".'<div class="'.$css_class.'">';
}else{
$output .= "\n\t".'<div class="'.$css_class.' wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.4s">';
}

$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

}elseif($type == 'faqs'){
	$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);



//$column_id = (!empty($column_id) ? ' id="'.esc_attr($column_id).'"' : '');

$el_class .= '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
	if($animation == 'no'){
           $output .= "\n\t".'<div class="'.$css_class.'">';
            }elseif($animation == 'yes'){
            $output .= "\n\t".'<div class="'.$css_class.' wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.4s">';

            }
			$output .= "\n\t".'<div class="panel-group" id="accordion">';
            
			$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
            $output .= "\n\t".'</div>
          </div>'; 
}elseif($type == 'faqs2'){
	$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);



//$column_id = (!empty($column_id) ? ' id="'.esc_attr($column_id).'"' : '');

$el_class .= '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
	
           $output .= "\n\t".'<div class="panel-group" id="accordion">';
            
			$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
            $output .= "\n\t".'<div class="text-center">
	          <h6>'.wp_specialchars_decode($desc).'</h6>
	          <a href="'.esc_url($link).'" class="btn">'.wp_specialchars_decode($text).'</a> </div>
              
            </div>'; 
           
}elseif($type == 'test_left'){
	$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);



//$column_id = (!empty($column_id) ? ' id="'.esc_attr($column_id).'"' : '');

$el_class .= '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
	
           $output .= "\n\t".'<div class="'.$css_class.'">';
			$output .= "\n\t".'<ol class="carousel-indicators">';
            
			$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
            $output .= "\n\t".'</ol>
              </div>'; 
            
}elseif($type == 'test_right'){
	$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);



//$column_id = (!empty($column_id) ? ' id="'.esc_attr($column_id).'"' : '');

$el_class .= '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
	
           $output .= "\n\t".'<div class="'.$css_class.'">';
			$output .= "\n\t".'<div class="carousel-inner" role="listbox">';
            
			$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
            $output .= "\n\t".'</div>
          </div>'; 
            



}else{
$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);

$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
}
echo wpautop($output);