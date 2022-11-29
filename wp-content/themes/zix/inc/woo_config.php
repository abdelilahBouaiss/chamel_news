<?php
    // Re-arrange the product tabs


    // Re-arrange the related products, upsell product
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    add_action( 'woocommerce_single_product_after_main_content', 'woocommerce_upsell_display', 20);
    add_action( 'woocommerce_single_product_after_main_content', 'woocommerce_output_related_products', 25);

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 0 );


    

/**
 * Checkout form fields customizing
 */
add_filter( 'woocommerce_checkout_fields' , function ( $fields ) {

    $woocommerce_checkout_company_field = get_option('woocommerce_checkout_company_field');

    $woocommerce_checkout_phone_field = get_option('woocommerce_checkout_phone_field');
    $woocommerce_checkout_phone_required = ($woocommerce_checkout_phone_field == 'required') ? true : false;

    // Billing Fields
    $fields['billing']['billing_first_name'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'First name *', 'placeholder', 'zix' ),
        'class'         => array( 'col-md-6 form-group' ),
        'clear'         => true,
        'required'      => true
    );

    $fields['billing']['billing_last_name'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Last name *', 'placeholder', 'zix' ),
        'class'         => array( 'col-md-6 form-group' ),
        'clear'         => true,
        'required'      => true
    );

    $fields['billing']['billing_company'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( "Company name", 'placeholder', 'zix' ),
        'class'         => array( 'form-group col-md-12', $woocommerce_checkout_company_field ),
        'clear'         => true,
        'required'      => ( $woocommerce_checkout_company_field == 'required' ) ? true : false
    );

    $fields['billing']['billing_city'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Town / City *', 'placeholder', 'zix' ),
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['billing']['billing_postcode'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Postcode / ZIP (optional)', 'placeholder', 'zix' ),
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['billing']['billing_phone'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Phone', 'placeholder', 'zix' ),
        'required'      => $woocommerce_checkout_phone_required,
        'class'         => array( 'form-group col-md-12', $woocommerce_checkout_phone_field ),
        'clear'         => true
    );

    $email_column = $woocommerce_checkout_phone_field=='hidden' ? '12' : '6';
    $fields['billing']['billing_email'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Email address *', 'placeholder', 'zix' ),
        'required'      => true,
        'class'         => array( "form-group col-md-".$email_column ),
        'clear'         => true
    );

    // Shipping Fields
    $fields['shipping']['shipping_first_name'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'First name *', 'placeholder', 'zix' ),
        'required'      => false,
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['shipping']['shipping_last_name'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Last name *', 'placeholder', 'zix' ),
        'required'      => false,
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['shipping']['shipping_company'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Company name (optional)', 'placeholder', 'zix' ),
        'required'      => false,
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['shipping']['shipping_city'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Town / City *', 'placeholder', 'zix' ),
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['shipping']['shipping_postcode'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Postcode / ZIP (optional)', 'placeholder', 'zix' ),
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    $fields['shipping']['shipping_phone'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Phone', 'placeholder', 'zix' ),
        'required'      => $woocommerce_checkout_phone_required,
        'class'         => array( 'form-group col-md-12 '.$woocommerce_checkout_phone_field ),
        'clear'         => true
    );

    $fields['shipping']['shipping_email'] = array(
        'label'         => '',
        'placeholder'   => esc_html_x( 'Email address *', 'placeholder', 'zix' ),
        'required'      => true,
        'class'         => array( 'form-group col-md-12' ),
        'clear'         => true
    );

    return $fields;
});


// WooCommerce review list
function zix_woocommerce_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <li id="comment-<?php comment_ID() ?>" class="post_comment">
        <div class="media post_author">
            <div class="media-left">
                <?php echo get_avatar($comment, 120, array( 'class' => 'rounded-circle' ) ); ?>
            </div>
            <div class="media-body">
                <div class="comment-meta">
                    <h5><?php comment_author(); ?> <span><?php echo get_comment_time(get_option( 'date_format')); ?></span></h5>
                    <?php woocommerce_review_display_rating() ?>
                </div>
                <?php comment_text() ?>
            </div>
        </div>
    </li>
    <?php
}


// Enabling the gallery in themes that declare
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Product Gallery thumbnail size
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 120,
        'height' => 140,
        'crop' => 1,
    );
} );


add_filter( 'woocommerce_order_button_html', 'misha_custom_button_html' );

function misha_custom_button_html( $button_html ) {

    $order_button_text = 'Place order';
    $button_html = '<button type="submit" class="btn get_btn dark" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>';

    return $button_html;
}


