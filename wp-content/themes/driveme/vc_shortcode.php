<?php 
global $pre_text;

$pre_text = 'VG ';


$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

      $contact_forms = array();
      if ( $cf7 ) {
         foreach ( $cf7 as $cform ) {
            $contact_forms[ $cform->post_title ] = $cform->ID;
         }
      } else {
         $contact_forms[ __( 'No contact forms found', 'driveme' ) ] = 0;
      }

//driveme




//Slider
if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text." Slider", 'driveme'),
      "base" => "slider",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Photo', 'driveme' ),
            'param_name' => 'photo',
            'value' => '',
            'description' => esc_html__( 'Please chosen photo, Recommend Size: 1349 x 622', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style Form', 'driveme' ),
            'param_name' => 'style_form',
            'value' => array(
               esc_html__( 'One: Just Text', 'driveme' ) => '1',
               esc_html__( 'Two: Text and Form', 'driveme' ) => '2',
               ),
            'description' => esc_html__( 'Style Of Slider Do you show:', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show Form', 'driveme' ),
            'param_name' => 'show_form',
            'value' => array(
               esc_html__( 'Yes', 'driveme' ) => 'Yes',
               esc_html__( 'No', 'driveme' ) => 'No',
               ),
            'description' => esc_html__( 'Show Form Yes or No With Style 2.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type Form', 'driveme' ),
            'param_name' => 'type_form',
            'value' => array(
               esc_html__( 'One: Form base', 'driveme' ) => '1',
               esc_html__( 'Two: Form lucent', 'driveme' ) => '2',
               ),
            'description' => esc_html__( 'Type Of Form Do you show:', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text 1", 'driveme'),
            "param_name" => "text1",
            "value" => "",
            "description" => esc_html__("Text of Button One", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link 1", 'driveme'),
            "param_name" => "link1",
            "value" => "",
            "description" => esc_html__("Link Of Button one", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text 2", 'driveme'),
            "param_name" => "text2",
            "value" => "",
            "description" => esc_html__("Text of Button Two", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link 2", 'driveme'),
            "param_name" => "link2",
            "value" => "",
            "description" => esc_html__("Link Of Button Two", 'driveme')
            ),

         array(
            'param_name' => 'which_form',
            'type'        => 'dropdown',
            'value'       => array(
               'Select Form'   => '-1',
               'Contact Form'   => 'contact_form',
               'Normal Form' => 'normal_form'
               ),
            'heading' => __('Contact form / Normal Form', 'driveme'),
            'admin_label' => false,
            ),

          array(
            'param_name' => 'contact_form7',
            'type'        => 'dropdown',
           'value' => $contact_forms,
           'dependency' => array(
               'element' => 'which_form',
               'value' => array( 'contact_form'),
               ),
            'heading' => __('Contact form', 'driveme'),
            'admin_label' => false,
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text of Title Search", 'driveme'),
            "param_name" => "title_search",
            "value" => "",
            'dependency' => array(
               'element' => 'which_form',
               'value' => array( 'normal_form'),
               ),
            "description" => esc_html__("Please Write Text.Ex: Find Driving Courses.", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text of Title Button Search", 'driveme'),
            "param_name" => "title_button",
            "value" => "",
            'dependency' => array(
               'element' => 'which_form',
               'value' => array( 'normal_form'),
               ),
            "description" => esc_html__("Please Write Text.Ex: Find My Courses.", 'driveme')
            ),


         )));
}


//testimonials


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Testimonials", 'driveme'),
      "base" => "testimonials",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Type 1', 'driveme' ) => '1',
               esc_html__( 'Type 2 Left', 'driveme' ) => '2left',
               esc_html__( 'Type 2 Right', 'driveme' ) => '2right',
               esc_html__( 'Type 3', 'driveme' ) => '3',
               ),
            'description' => esc_html__( 'Select type testimonials', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content11",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Job", 'driveme'),
            "param_name" => "job",
            "value" => "",
            "description" => esc_html__("Job", 'driveme')
            ),

         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Position", 'driveme'),
            "param_name" => "position1",
            "value" => "",
            "description" => esc_html__("0-n. With type 2", 'driveme')
            ),
         )));
}




//features


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Features", 'driveme'),
      "base" => "features",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
			esc_html__( 'Select', 'driveme' ) => '0',
               esc_html__( 'Start', 'driveme' ) => '1',
               esc_html__( 'End', 'driveme' ) => '2',
               ),
            'description' => esc_html__( 'Select type features', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => '0',
               esc_html__( 'Animation 1', 'driveme' ) => '1',
               esc_html__( 'Animation 2', 'driveme' ) => '2',
               esc_html__( 'Animation 3', 'driveme' ) => '3',
               esc_html__( 'Animation 4', 'driveme' ) => '4',
               ),
            'description' => esc_html__( 'Select animation', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content11",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),

         )));
}


//gallery


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Gallery11", 'driveme'),
      "base" => "gallery11",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("ID", 'driveme'),
            "param_name" => "id",
            "value" => "",
            "description" => esc_html__("ID", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text 1", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text 2", 'driveme'),
            "param_name" => "text2",
            "value" => "",
            "description" => esc_html__("Text 2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("View", 'driveme'),
            "param_name" => "view",
            "value" => "",
            "description" => esc_html__("View", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),


         )));
}



//Ourcourses


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Ourcourses", 'driveme'),
      "base" => "ourcourses",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("ID", 'driveme'),
            "param_name" => "id",
            "value" => "",
            "description" => esc_html__("ID", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("View", 'driveme'),
            "param_name" => "view",
            "value" => "",
            "description" => esc_html__("View", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Video", 'driveme'),
      "base" => "video",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("ID", 'driveme'),
            "param_name" => "id",
            "value" => "",
            "description" => esc_html__("ID", 'driveme')
            ),

         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),

         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Price", 'driveme'),
      "base" => "price",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),

         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Type 1', 'driveme' ) => 'type1',
               esc_html__( 'Type 2', 'driveme' ) => 'type2',
               ),
            'description' => esc_html__( 'Type', 'driveme' )
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Contact Search", 'driveme'),
      "base" => "contactsearch",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Subtitle", 'driveme'),
            "param_name" => "subtitle",
            "value" => "",
            "description" => esc_html__("Subtitle", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Geta", 'driveme'),
            "param_name" => "geta",
            "value" => "",
            "description" => esc_html__("Geta", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Page Search", 'driveme'),
            "param_name" => "page_search",
            "value" => "",
            "description" => esc_html__("Page Search", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Color", 'driveme'),
            "param_name" => "color",
            "value" => "",
            "description" => esc_html__("Color", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),

         array(
            'param_name' => 'which_form',
            'type'        => 'dropdown',
            'value'       => array(
               'Select Form'   => '-1',
               'Contact Form'   => 'contact_form',
               'Quote Form' => 'quote_form'
               ),
            'heading' => __('Set Contact form as quote / Quote Form', 'driveme'),
            'admin_label' => false,
            ),

          array(
            'param_name' => 'contact_form7',
            'type'        => 'dropdown',
           'value' => $contact_forms,
           'dependency' => array(
               'element' => 'which_form',
               'value' => array( 'contact_form'),
               ),
            'heading' => __('Contact form', 'driveme'),
            'admin_label' => false,
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Inspectors", 'driveme'),
      "base" => "inspectors",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),

         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),


         )));
}





if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Quote", 'driveme'),
      "base" => "quote",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Class", 'driveme'),
            "param_name" => "class",
            "value" => "",
            "description" => esc_html__("Class", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Type 1', 'driveme' ) => '1',
               esc_html__( 'Type 2', 'driveme' ) => '2',
               ),
            'description' => esc_html__( 'Type', 'driveme' )
            ),


         )));
}


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Show Post", 'driveme'),
      "base" => "post",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),

         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation', 'driveme' ),
            'param_name' => 'animation',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Animation', 'driveme' )
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Faqs", 'driveme'),
      "base" => "faqs",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content1",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number Collapsed", 'driveme'),
            "param_name" => "collapsed",
            "value" => "",
            "description" => esc_html__("Number Collapsed: enter 1 if you want collapsed", 'driveme')
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."License", 'driveme'),
      "base" => "license",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content1",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number", 'driveme'),
            "param_name" => "number",
            "value" => "",
            "description" => esc_html__("Number: 1-n", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),


         )));
}


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Timeline", 'driveme'),
      "base" => "timeline",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Show", 'driveme'),
            "param_name" => "show",
            "value" => "",
            "description" => esc_html__("Show", 'driveme')
            ),

         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order By', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme' ) => 'date',
               esc_html__( 'Random', 'driveme' ) => 'random',
               ),
            'description' => esc_html__( 'Order By', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order Post', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Order Post', 'driveme' )
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Map", 'driveme'),
      "base" => "map",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Address", 'driveme'),
            "param_name" => "address",
            "value" => "",
            "description" => esc_html__("Address", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),


         )));
}



if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Contact Info", 'driveme'),
      "base" => "contactinfo",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Facebook", 'driveme'),
            "param_name" => "facebook",
            "value" => "",
            "description" => esc_html__("Link Facebook", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Twitter", 'driveme'),
            "param_name" => "twitter",
            "value" => "",
            "description" => esc_html__("Link Twitter", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Google", 'driveme'),
            "param_name" => "google",
            "value" => "",
            "description" => esc_html__("Link Google", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Linkedin", 'driveme'),
            "param_name" => "linkedin",
            "value" => "",
            "description" => esc_html__("Link Linkedin", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Skype", 'driveme'),
            "param_name" => "skype",
            "value" => "",
            "description" => esc_html__("Link skype", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Dribbble", 'driveme'),
            "param_name" => "dribbble",
            "value" => "",
            "description" => esc_html__("Link Dribbble", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Behance", 'driveme'),
            "param_name" => "behance",
            "value" => "",
            "description" => esc_html__("Link Behance", 'driveme')
            ),

         )));
}


































//tab


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Tab", 'driveme'),
      "base" => "tab",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title tab1", 'driveme'),
            "param_name" => "title1",
            "value" => "",
            "description" => esc_html__("Title tab1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text tab1", 'driveme'),
            "param_name" => "text1",
            "value" => "",
            "description" => esc_html__("Text tab1", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Post Type', 'driveme' ),
            'param_name' => 'posttype1',
            'value' => array(
               esc_html__( 'None', 'driveme' ) => 'none',
               esc_html__( 'Events', 'driveme' ) => 'events',
               esc_html__( 'Players', 'driveme' ) => 'players',
               esc_html__( 'Teams', 'driveme' ) => 'teams',
               ),
            'description' => esc_html__( 'Chosen post type you want show in tab 1', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show 1.", 'driveme'),
            "param_name" => "number1",
            "value" => "8",
            "description" => esc_html__("Number of item You want show 1.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab 1', 'driveme' ),
            'param_name' => 'orderpost1',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 1.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab 1', 'driveme' ),
            'param_name' => 'orderby1',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 1.', 'driveme' )
            ),



         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title tab2", 'driveme'),
            "param_name" => "title2",
            "value" => "",
            "description" => esc_html__("Title tab2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text tab2", 'driveme'),
            "param_name" => "text2",
            "value" => "",
            "description" => esc_html__("Text tab2", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Post Type', 'driveme' ),
            'param_name' => 'posttype2',
            'value' => array(
               esc_html__( 'None', 'driveme' ) => 'none',
               esc_html__( 'Events', 'driveme' ) => 'events',
               esc_html__( 'Players', 'driveme' ) => 'players',
               esc_html__( 'Teams', 'driveme' ) => 'teams',
               ),
            'description' => esc_html__( 'Chosen post type you want show in tab 2', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show 2.", 'driveme'),
            "param_name" => "number2",
            "value" => "8",
            "description" => esc_html__("Number of item You want show 2.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab 2', 'driveme' ),
            'param_name' => 'orderpost2',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 2.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab 2', 'driveme' ),
            'param_name' => 'orderby2',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 2.', 'driveme' )
            ),



         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title tab3", 'driveme'),
            "param_name" => "title3",
            "value" => "",
            "description" => esc_html__("Title tab3", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text tab3", 'driveme'),
            "param_name" => "text3",
            "value" => "",
            "description" => esc_html__("Text tab3", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Post Type', 'driveme' ),
            'param_name' => 'posttype3',
            'value' => array(
               esc_html__( 'None', 'driveme' ) => 'none',
               esc_html__( 'Events', 'driveme' ) => 'events',
               esc_html__( 'Players', 'driveme' ) => 'players',
               esc_html__( 'Teams', 'driveme' ) => 'teams',
               ),
            'description' => esc_html__( 'Chosen post type you want show in tab 3', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show 3.", 'driveme'),
            "param_name" => "number3",
            "value" => "8",
            "description" => esc_html__("Number of item You want show 3.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab 3', 'driveme' ),
            'param_name' => 'orderpost3',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 3.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab 3', 'driveme' ),
            'param_name' => 'orderby3',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order tab 3.', 'driveme' )
            ),

         )));
}





//Countdown 
if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text." Countdown", 'driveme'),
      "base" => "countdown",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Date", 'driveme'),
            "param_name" => "date",
            "value" => "",
            "description" => esc_html__("Date", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Calendar", 'driveme'),
            "param_name" => "calendar",
            "value" => "",
            "description" => esc_html__("Calendar", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Clock", 'driveme'),
            "param_name" => "clock",
            "value" => "",
            "description" => esc_html__("Clock", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'driveme'),
            "param_name" => "content1",
            "value" => "",
            "description" => esc_html__("Content", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Class icon", 'driveme')
            ),

         )));
}


//News


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."News", 'driveme'),
      "base" => "news",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show.", 'driveme'),
            "param_name" => "number",
            "value" => "8",
            "description" => esc_html__("Number of item You want show.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),

         )));
}


//Experts


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Experts", 'driveme'),
      "base" => "experts",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show.", 'driveme'),
            "param_name" => "number",
            "value" => "8",
            "description" => esc_html__("Number of item You want show.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),

         )));
}




//Locations


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Locations", 'driveme'),
      "base" => "locations",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show.", 'driveme'),
            "param_name" => "number",
            "value" => "8",
            "description" => esc_html__("Number of item You want show.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),

         )));
}




//Text


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Text", 'driveme'),
      "base" => "text",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("desc", 'driveme')
            ),

         )));
}




//Match


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Match", 'driveme'),
      "base" => "match",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("desc", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Center', 'driveme' ) => 'center',
               esc_html__( 'Start', 'driveme' ) => 'start',
               esc_html__( 'End', 'driveme' ) => 'end',
               ),
            'description' => esc_html__( 'Select type match', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("League", 'driveme'),
            "param_name" => "league",
            "value" => "",
            "description" => esc_html__("League", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Time", 'driveme'),
            "param_name" => "time",
            "value" => "",
            "description" => esc_html__("Time", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Team 1", 'driveme'),
            "param_name" => "team1",
            "value" => "",
            "description" => esc_html__("Team 1", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Logo team 1', 'driveme' ),
            'param_name' => 'logo1',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Team 2", 'driveme'),
            "param_name" => "team2",
            "value" => "",
            "description" => esc_html__("Team 2", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Logo team 2', 'driveme' ),
            'param_name' => 'logo2',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),

         )));
}




//Image


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Image", 'driveme'),
      "base" => "image",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),

         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),

         )));
}





//Players


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Players", 'driveme'),
      "base" => "players",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of item You want show.", 'driveme'),
            "param_name" => "number",
            "value" => "8",
            "description" => esc_html__("Number of item You want show.", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sort Order tab', 'driveme' ),
            'param_name' => 'orderpost',
            'value' => array(
               esc_html__( 'ASC : lowest to highest', 'driveme' ) => 'ASC',
               esc_html__( 'DESC : highest to lowest', 'driveme' ) => 'DESC',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by tab', 'driveme' ),
            'param_name' => 'orderby',
            'value' => array(
               esc_html__( 'Title', 'driveme' ) => 'title',
               esc_html__( 'Date', 'driveme'  ) => 'date',
               esc_html__( 'Random', 'driveme'  ) => 'random',
               ),
            'description' => esc_html__( 'Select field do you want Order.', 'driveme' )
            ),

         )));
}





//Progress


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Progress", 'driveme'),
      "base" => "progress",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Center', 'driveme' ) => 'center',
               esc_html__( 'Start', 'driveme' ) => 'start',
               esc_html__( 'End', 'driveme' ) => 'end',
               ),
            'description' => esc_html__( 'Select type match', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Percent", 'driveme'),
            "param_name" => "percent",
            "value" => "",
            "description" => esc_html__("Percent: 0-100", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Color', 'driveme' ),
            'param_name' => 'color',
            'value' => array(
               esc_html__( 'Color 1', 'driveme' ) => '',
               esc_html__( 'Color 2', 'driveme' ) => 'two',
               esc_html__( 'Color 3', 'driveme' ) => 'three',
               esc_html__( 'Color 4', 'driveme' ) => 'four',
               ),
            'description' => esc_html__( 'Chosen color', 'driveme' )
            ),

         )));
}




//accrodation


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Accrodation", 'driveme'),
      "base" => "accrodation",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Center', 'driveme' ) => 'center',
               esc_html__( 'Start', 'driveme' ) => 'start',
               esc_html__( 'End', 'driveme' ) => 'end',
               ),
            'description' => esc_html__( 'Select type match', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Chosen active', 'driveme' ),
            'param_name' => 'active',
            'value' => array(
               esc_html__( 'No', 'driveme' ) => 'no',
               esc_html__( 'Yes', 'driveme' ) => 'yes',
               ),
            'description' => esc_html__( 'Chosen active', 'driveme' )
            ),

         )));
}




//About


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."About", 'driveme'),
      "base" => "about",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon", 'driveme'),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__("Icon", 'driveme')
            ),
         array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),

         )));
}




//partner


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Partner", 'driveme'),
      "base" => "partner",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title Left", 'driveme'),
            "param_name" => "title_left",
            "value" => "",
            "description" => esc_html__("Title Left", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number", 'driveme'),
            "param_name" => "number",
            "value" => "",
            "description" => esc_html__("Number", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title Right", 'driveme'),
            "param_name" => "title_right",
            "value" => "",
            "description" => esc_html__("Title Right", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc", 'driveme'),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Desc", 'driveme')
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'driveme' ),
            'param_name' => 'type',
            'value' => array(
               esc_html__( 'Center', 'driveme' ) => 'center',
               esc_html__( 'Start', 'driveme' ) => 'start',
               esc_html__( 'End', 'driveme' ) => 'end',
               ),
            'description' => esc_html__( 'Select type match', 'driveme' )
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", 'driveme'),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("Text", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", 'driveme'),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Link", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'driveme' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),

         )));
}




//Google Map


if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text."Google Map", 'driveme'),
      "base" => "googlemap",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Latitude", 'driveme'),
            "param_name" => "lat",
            "value" => "",
            "description" => esc_html__("Lattitude. Chosen in http://www.latlong.net/", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Longtitude", 'driveme'),
            "param_name" => "long",
            "value" => "",
            "description" => esc_html__("Longtitude. Chosen in http://www.latlong.net/", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Zoom", 'driveme'),
            "param_name" => "zoom",
            "value" => "",
            "description" => esc_html__("Zoom. Default: 5", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Address 1", 'driveme'),
            "param_name" => "address1",
            "value" => "",
            "description" => esc_html__("Please enter Address 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title 1", 'driveme'),
            "param_name" => "title1",
            "value" => "",
            "description" => esc_html__("Please enter Title 1", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc 1", 'driveme'),
            "param_name" => "desc1",
            "value" => "",
            "description" => esc_html__("Please enter Desc 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Address 2", 'driveme'),
            "param_name" => "address2",
            "value" => "",
            "description" => esc_html__("Please enter Address 2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title 2", 'driveme'),
            "param_name" => "title2",
            "value" => "",
            "description" => esc_html__("Please enter Title 2", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc 2", 'driveme'),
            "param_name" => "desc2",
            "value" => "",
            "description" => esc_html__("Please enter Desc 2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Address 3", 'driveme'),
            "param_name" => "address3",
            "value" => "",
            "description" => esc_html__("Please enter Address 3", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title 3", 'driveme'),
            "param_name" => "title3",
            "value" => "",
            "description" => esc_html__("Please enter Title 3", 'driveme')
            ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc 3", 'driveme'),
            "param_name" => "desc3",
            "value" => "",
            "description" => esc_html__("Please enter Desc 3", 'driveme')
            ),
         array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Marker', 'driveme' ),
            'param_name' => 'marker',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library to do your signature.', 'driveme' )
            ),

         )));
}





//Info
if(function_exists('vc_map')){
   vc_map( array(
      "name" => esc_html__($pre_text." Info", 'driveme'),
      "base" => "info",
      "class" => "",
      "icon" => "icon-st",
      "category" => 'Content',
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'driveme'),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("Title", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc 1", 'driveme'),
            "param_name" => "desc1",
            "value" => "",
            "description" => esc_html__("Desc 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Desc 2", 'driveme'),
            "param_name" => "desc2",
            "value" => "",
            "description" => esc_html__("Desc 2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Address", 'driveme'),
            "param_name" => "textaddress",
            "value" => "",
            "description" => esc_html__("Text Address", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Address", 'driveme'),
            "param_name" => "address",
            "value" => "",
            "description" => esc_html__("Address", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text City", 'driveme'),
            "param_name" => "textcity",
            "value" => "",
            "description" => esc_html__("Text City", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("City", 'driveme'),
            "param_name" => "city",
            "value" => "",
            "description" => esc_html__("City", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Phone", 'driveme'),
            "param_name" => "textphone",
            "value" => "",
            "description" => esc_html__("Text Phone", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Phone", 'driveme'),
            "param_name" => "phone",
            "value" => "",
            "description" => esc_html__("Phone", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Email 1", 'driveme'),
            "param_name" => "textemail1",
            "value" => "",
            "description" => esc_html__("Text Email 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Email 1", 'driveme'),
            "param_name" => "email1",
            "value" => "",
            "description" => esc_html__("Email 1", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Email 2", 'driveme'),
            "param_name" => "textemail2",
            "value" => "",
            "description" => esc_html__("Text Email 2", 'driveme')
            ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Email 2", 'driveme'),
            "param_name" => "email2",
            "value" => "",
            "description" => esc_html__("Email 2", 'driveme')
            ),

         )));
}
