<?php

function zix_modify_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'zix_modify_excerpt_more');


/**
  * Add post view counter
  */
function zix_post_views( $post_ID ) {

    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count';

    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);

    //If the the Post Custom Field value is empty.
    if ($count == '') {
        $count = 0; // set the counter to zero.

        //Delete all custom fields with the specified key from the specified post.
        delete_post_meta($post_ID, $count_key);

        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . '';

        //If the the Post Custom Field value is NOT empty.
    } else {
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);

        //If statement, is just to have the singular form 'View' for the value '1'
        if ($count == '1') {
            return $count . '';
        }
        //In all other cases return (count) Views
        else {
            return $count . '';
        }
    }
}
add_action( 'init', 'zix_post_views' );


/**
 * Moving the comments text field to bottom
 */
function zix_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'zix_move_comment_field_to_bottom' );


function zix_social_profile(){
    $opt = get_option('zix_opt');

    if( !empty( $opt['facebook'] ) ){
        echo '<a href="'. esc_url( $opt['facebook'] ) .'"><i class="fab fa-facebook-f"></i></a>';
    }
    if( !empty( $opt['twitter'] ) ){
        echo '<a href="'. esc_url( $opt['twitter'] ) .'"><i class="fab fa-twitter"></i></a>';
    }
    if( !empty( $opt['linkedin'] ) ){
        echo '<a href="'. esc_url( $opt['linkedin'] ) .'"><i class="fab fa-linkedin-in"></i></a>';
    }
    if( !empty( $opt['vimeo'] ) ){
        echo '<a href="'. esc_url( $opt['vimeo'] ) .'"><i class="fab fa-vimeo-v"></i></a>';
    }
    if( !empty( $opt['dribbble'] ) ){
        echo '<a href="'. esc_url( $opt['dribbble'] ) .'"><i class="fab fa-dribbble"></i></a>';
    }
    if( !empty( $opt['youtube'] ) ){
        echo '<a href="'. esc_url( $opt['youtube'] ) .'"><i class="fab fa-youtube"></i></a>';
    }
    if( !empty( $opt['instagram'] ) ){
        echo '<a href="'. esc_url( $opt['instagram'] ) .'"><i class="fab fa-instagram"></i></a>';
    }

}



/*============ WooCommerce Product Gallery =============*/
function zix_product_gallery(){
    global $product;
    $gallery_ids = $product->get_gallery_image_ids();
    $count_id = count($gallery_ids);

    echo '<div class="tab_img">';
    $i = 1;
    foreach ( $gallery_ids as $gallery_id ){
        $incre = $i++;
        $g_image = wp_get_attachment_image( $gallery_id, 'zix_270x320' );
        $active = $incre == 1 ? 'active' : '';
        echo '<div class="item '.esc_attr( $active ).'" id="tab-'. $product->get_id() .'_'.$incre.'">'. wp_kses_post( $g_image ) .'</div>';


    }
    echo '</div><ul class="list-unstyled img_tabs square_tab">';

    $ti = 1;
    for( $x = 1; $x <= $count_id; $x++ ){
        switch ( $x ){
            case 1:
                $color_bar = 'yellow active';
                break;
            case 2:
                $color_bar = 'l_blue';
                break;
            case 3:
                $color_bar = 'green';
                break;
            case 4:
                $color_bar = 'pink';
                break;
            default:
                $color_bar = 'l_blue';
        }

        echo '<li class="tab_link  '. esc_attr( $color_bar ).'" data-tabs="tab-'. $product->get_id() .'_'.esc_attr( $ti++ ).'"></li>';
    }
    echo '</ul>';
}