<?php
/*

 * Template Name: Booking Sidebar Left

 * Description: A Page Template with a Page Builder design.

 */


if (!function_exists('booking_ajax_load_scripts')) {

  function booking_ajax_load_scripts() {

    global $theme_option;

    wp_enqueue_script( "driveme-stripe", 'https://js.stripe.com/v1/');
    wp_enqueue_script( "bootbox", get_template_directory_uri() . '/js/bootbox.min.js', array( 'jquery' ) );
    wp_enqueue_script( "driveme-payment", get_template_directory_uri() . '/js/payment.js', array( 'jquery' ) );
    wp_localize_script( 'driveme-payment', 'drivemepayment', array(

      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'security' => wp_create_nonce('secure_payment'),
      'sku_prfx' => $theme_option['sku_prfx'],

      'locale_error' => __('ERROR', 'driveme'),
      'locale_error_unknown' => __("An unknown error occurred during request. Please let us know if you're consistently running into this error.", 'driveme'),

      'stripe_pk' => trim($theme_option['payment_cc_pk'.($theme_option['payment_cc_testmode'] ? '_test' : '')]),
      'stripe_incorrect_number' => __("The card number is incorrect.", 'driveme'),
      'stripe_invalid_number  incorrect_number' => __("The card number is not a valid credit card number.", 'driveme'),
      'stripe_invalid_expiry_month  incorrect_number' => __("The card's expiration month is invalid.", 'driveme'),
      'stripe_invalid_expiry_year  incorrect_number' => __("The card's expiration year is invalid.", 'driveme'),
      'stripe_invalid_cvc  incorrect_number' => __("The card's security code is invalid.", 'driveme'),
      'stripe_expired_card  incorrect_number' => __("The card has expired.", 'driveme'),
      'stripe_incorrect_cvc  incorrect_number' => __("The card's security code is incorrect.", 'driveme'),
      'stripe_incorrect_zip  incorrect_number' => __("The card's zip code failed validation.", 'driveme'),
      'stripe_card_declined  incorrect_number' => __("The card was declined.", 'driveme'),
      'stripe_missing  incorrect_number' => __("There is no card on a customer that is being charged.", 'driveme'),
      'stripe_processing_error  incorrect_number' => __("An error occurred while processing the card.", 'driveme'),
      'stripe_rate_limit' => __("An error occurred due to requests hitting the API too quickly. Please let us know if you're consistently running into this error.", 'driveme')
    ));
  }

  add_action( 'wp_print_scripts', 'booking_ajax_load_scripts' );
}

$current_course = (int) (array_key_exists('booking_title', $_POST) ? esc_attr($_POST['booking_title']) : ( array_key_exists('cid', $_GET) ? $_GET['cid'] : 0));
$docaction = array_key_exists('doaction', $_REQUEST) ? $_REQUEST['doaction'] : '';

$processors = &$theme_option['payment_enabled'];
$active = array_search(1, $processors);

?>

<?php get_header(); ?>

  <div class="content">

    <section class="courses">
      <div class="container">

        <!--======= RODUCTS =========-->
        <section  class="products billing-info">


          <?php if ($docaction == 'request' && $theme_option['payment_msg_contact']) { ?>
            <div class="note success"><?php echo esc_html( $theme_option['payment_msg_contact'] ); ?></div>
          <?php } else if ($docaction == 'thank-you' && $theme_option['payment_msg_success']) { ?>
            <div class="note success"><?php echo esc_html( $theme_option['payment_msg_success'] ); ?></div>
          <?php } else if ($docaction == 'cancel' && $theme_option['payment_msg_cancel']) { ?>
            <div class="note warning"><?php echo esc_html( $theme_option['payment_msg_cancel'] ); ?></div>
          <?php } ?>

          <!--======= PRODUCTS ROW =========-->
          <div class="row">

            <!--======= RIGHT SIDEBAR =========-->

      <div class="col-md-3">

    <?php

            $numbers=$_POST['booking_title'];
            if($numbers == '') $numbers = '23';
            $args = array(
                'post_type'         => 'courses',
                'p'       => $numbers,
            );

            $wp_query = new WP_Query($args);
            while($wp_query->have_posts()) : $wp_query->the_post();
            $ratings=get_post_meta(get_the_ID(),'_cmb_courses_rate', true);
            $prices=get_post_meta(get_the_ID(),'_cmb_courses_price', true);
            $name= get_post_meta(get_the_ID(),"_cmb_courses_name",true);
            $address= get_post_meta(get_the_ID(),"_cmb_courses_address",true);
            $time= get_post_meta(get_the_ID(),"_cmb_courses_time",true);
            $city= get_post_meta(get_the_ID(),"_cmb_courses_city",true);
            $params = array( 'width' => 261, 'height' => 222 );
            $thumbnails = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
            $categorie_names ='';
            $categories = get_the_terms(get_the_ID(),'categories');

            foreach( (array)$categories as $categorie) {
              if ( count( $categories ) == 1 ) {
                $categorie_names .= $categorie->name;
              } elseif(count( $categories ) > 1) {
                $categorie_names .= '<span class="multi-cat">' . $categorie->name . ' , </span>';
              }
            }
            ?>

        <!--======= RIGHT MAP =========-->



        <div class="prodct">



          <!--======= IMAGE =========-->

          <img class="img-responsive" src="<?php echo esc_url($thumbnails); ?>" alt="">

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

            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

            <hr>

            <p><i class="fa fa-exclamation-circle"></i>

            <?php if(isset($theme_option['courses_excerpt']) && $theme_option['courses_excerpt'] != ''){ echo driveme_excerpt($theme_option['courses_excerpt']); }else{ echo driveme_excerpt(15); } ?></p>

            <p> <strong>Total Price: <?php echo esc_attr($prices); ?></strong></p>

            <a href="<?php echo esc_url($theme_option['booking_sidebarlink']); ?>" class="btn">Update course</a> </div>

        </div>

        <div class="where">

          <h6><?php echo esc_attr($theme_option['booking_title1']); ?> <i class="fa fa-minus"></i></h6>

          <p><strong><?php echo esc_attr($city);?></strong></p>

          <p> <?php echo esc_attr($name) ;?> </p>

          <p> <?php echo esc_attr($address) ;?></p>

          <p> <?php the_time('F d, Y');?></p>

          <p> from <?php echo esc_attr($time) ;?></p>

          <a href="<?php echo esc_url($theme_option['booking_sidebarlink']); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html_e('Add to My Calendar', 'driveme' ); ?></a> </div>



        <!--======= When & Where =========-->

        <div class="where">

          <h6><?php echo esc_attr($theme_option['booking_title2']); ?> <i class="fa fa-minus"></i></h6>

          <p><?php echo esc_attr($theme_option['booking_subtitle']); ?></p>

          <h3><?php echo esc_attr($theme_option['booking_number']); ?></h3>

         <a href="<?php echo esc_url($theme_option['booking_sidebarlink_sent_msg']); ?>"><i class="fa fa-envelope"></i> <?php echo esc_html_e('Send a Message', 'driveme' ); ?></a> </div>

      </div>


              <div class="col-md-9">
              <div id="payment-wrap">

                <div class="payment-overlay"><h3><span></span><?php echo __('Loading...', 'driveme'); ?></h3></div>

                <!--======= BILLING INFORMATION =========-->
                <div class="billing-tittle">
                  <h5><?php echo __('Trainer Billing Info', 'driveme'); ?></h5>
                  <span class="process">01</span>
                </div>

                <div class="billing-form intres-lesson">

                  <input type="hidden" data-bind="out:value" name="amount" value="">
                  <input type="hidden" data-bind="out:value" name="cid" value="">

                  <ul class="row">

                    <li class="col-sm-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <input type="text" data-toggle="tooltip" placeholder="<?php echo __('Name', 'driveme'); ?>"
                               name="firstname"
                               required
                               class="form-control" id="ub_name"
                               data-bind="in:value" value="<?php echo ( isset($_SESSION['driveme']['sl_name'] ) ) ? esc_attr( $_SESSION['driveme']['sl_name'] ) : '';?>">
                        <span class="fa fa-user"></span></div>
                    </li>

                    <li class="col-sm-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <input type="email" data-toggle="tooltip" placeholder="<?php echo __('Surname', 'driveme'); ?>"
                               name="lastname"
                               required
                               class="form-control" id="ub_name_surname"
                               data-bind="in:value">
                        <span class="fa fa-user"></span></div>
                    </li>

                    <li class="col-sm-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <input type="text" data-toggle="tooltip"
                               placeholder="<?php echo __('Your Phone', 'driveme'); ?>"
                               name="phone"
                               required
                               class="form-control" id="ub_phone"
                               data-bind="in:value" value="<?php echo ( isset($_SESSION['driveme']['sl_phone'] ) ) ? esc_attr( $_SESSION['driveme']['sl_phone'] ) : '' ;?>">
                        <span class="fa fa-phone"></span></div>
                    </li>

                    <li class="col-sm-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <input type="email" data-toggle="tooltip"
                               placeholder="<?php echo __('Your Mail Address', 'driveme'); ?>"
                               name="email"
                               class="form-control" id="ub_email"
                               data-bind="in:value" value="<?php echo ( isset($_SESSION['driveme']['sl_email'] ) ) ? esc_attr( $_SESSION['driveme']['sl_email'] ) : '' ;?>">
                        <span class="fa fa-envelope"></span></div>
                    </li>


                    <li class="col-md-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <select data-toggle="tooltip" placeholder="<?php echo __('Course', 'driveme'); ?>"
                                name="course"
                                required
                                id="ub_course_name" class="form-control stylee" type="text"
                                data-bind="in:value">
                          <option value=""><?php echo __('Select Course', 'driveme'); ?></option>
                          <?php $courses = get_posts(array(
                              'showposts' => -1,
                              'post_type' => 'courses'
                          ));

                          foreach ($courses as $course) {
                            $price = get_post_meta($course->ID,'_cmb_courses_price', true);
                            $price_num = str_replace(',', '.', preg_replace('/[^0-9\.,]/', '', $price));
                            ?>
                            <option value="<?php echo esc_attr( $course->ID ); ?>:<?php echo esc_html( $price_num ); ?>:<?php echo htmlspecialchars(str_replace(':', ' ', $course->post_title)); ?>"<?php if ($current_course == $course->ID) echo ' selected'; ?>><?php echo htmlspecialchars($course->post_title).' ['.$price.']'; ?></option>
                          <?php } ?>
                        </select>
                        <span class="fa fa-road"></span>
                      </div>
                    </li>

                    <li class="col-md-6">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <input type="text" placeholder="DD/MM/YY" id="datepicker"
                               class="form-control hasDatepicker"
                               name="date"
                               data-bind="in:value" value="<?php echo ( isset($_SESSION['driveme']['courses-date'] ) ) ? esc_attr( $_SESSION['driveme']['courses-date'] ) : '' ;?>">
                        <span class="fa fa-calendar"></span>
                      </div>
                    </li>

                    <li class="col-sm-12">
                      <div class="form-group">
                        <div class="field-error"></div>
                        <textarea placeholder="<?php echo __('Your additional Message', 'driveme'); ?>"
                                  name="message"
                                id="ub_message" cols="" rows="5" data-bind="in:value"></textarea>
                        <span class="fa fa-file-text-o"></span>
                      </div>
                    </li>
                  </ul>
                </div>

                <div class="billing-tittle margin-t-20 amount2pay-wrap">
                  <h5><?php echo __('Payment Information', 'driveme'); ?> <span class="amount2pay" data-name="ready2pay" data-bind="out:toggle[amount2pay-on]"><?php echo __('To pay', 'driveme'); ?>: <span data-name="amount" data-bind="out:price, f:currency"><span class="pr-sign">-&nbsp;</span><span class="pr-wrap" style="display: none;"><span class="pr">0</span>&nbsp;<?php echo esc_html( $theme_option['payment_currency'] ); ?></span></span></span></h5>
                  <span class="process">02</span></div>
                <div role="tabpanel">
                                  <div class="tabpanel">
                    <ul role="tablist" class="nav nav-tabs">
                      <?php if ($processors['stripe']) { ?>
                      <li<?php if ($active == 'stripe') echo ' class="active"'?>role="presentation">
                        <a data-toggle="tab" role="tab"
                           aria-controls="credit"
                           href="#credit"
                           aria-expanded="false"><?php echo __( 'Credit Card', 'driveme' ); ?> </a>
                      </li>
                      <?php } ?>
                      <?php if ($processors['paypal']) { ?>
                      <li<?php if ($active == 'paypal') echo ' class="active"'?> role="presentation">
                        <a data-toggle="tab" role="tab"
                           aria-controls="paypal"
                           href="#paypal"
                           aria-expanded="false"><?php echo __( 'PayPal', 'driveme' ); ?></a></li>
                      <?php } ?>
                      <?php if ($processors['offline']) { ?>
                      <li<?php if ($active == 'offline') echo ' class="active"'?> role="presentation">
                        <a data-toggle="tab" role="tab"
                           aria-controls="offline"
                           href="#offline"
                           aria-expanded="false"><?php echo __( 'Offline', 'driveme' ); ?></a>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>

                  <!-- Tab panes -->
                  <div class="tab-content">
                  <?php if ($processors['stripe']) { ?>
                    <!--======= CREDIT =========-->
                    <div id="credit" class="tab-pane<?php if ($active == 'stripe') echo ' active'?>" role="tabpanel">
                      <!--======= FORM =========-->
                      <div class="intres-lesson">

                        <!--======= FORM =========-->
                        <form class="stripe-form" method="post" action="<?php the_guid(); ?>" data-form-type="stripe">

                          <input type="hidden" data-bind="out:value" name="cid" value="">
                          <input type="hidden" data-bind="out:value" name="email" value="">
                          <input type="hidden" data-bind="out:value" name="firstname" value="">
                          <input type="hidden" data-bind="out:value" name="lastname" value="">
                          <input type="hidden" data-bind="out:value" name="message" value="">
                          <input type="hidden" data-bind="out:value" name="phone" value="">
                          <input type="hidden" data-bind="out:value" name="date" value="">
                          <input type="hidden" data-bind="out:value" name="amount" value="">
                          <input type="hidden" name="processor" value="stripe">
                          <input type="hidden" name="stripeToken" value="">

                          <ul class="row">

                            <?php if ( $theme_option['payment_cc_testmode'] ) { ?>
                              <li class="col-md-12">
                                <p class="note warning"><?php echo __( 'TEST mode! Test card credentials are already filled.', 'driveme' ); ?></p>
                              </li>
                            <?php } ?>

                            <li class="col-sm-12">
                              <div class="form-group">
                                <input type="text" placeholder="<?php _e( 'Card Number', 'driveme' ); ?>"
                                       required
                                       autocomplete="off"
                                       <?php if ($theme_option['payment_cc_testmode']) { ?>value="4242424242424242"<?php } ?>
                                       class="form-control stripe-number">
                                <span class="fa fa-credit-card"></span></div>
                            </li>

                            <li class="col-sm-6">
                              <div class="form-group">
                                <input type="text" placeholder="<?php _e( 'CVC Number', 'driveme' ); ?>"
                                       required
                                       autocomplete="off"
                                       <?php if ($theme_option['payment_cc_testmode']) { ?>value="111"<?php } ?>
                                       class="form-control stripe-cvc">
                                <span class="fa fa-credit-card"></span></div>
                            </li>

                            <li class="col-sm-6">
                              <div class="row date-info">
                                <div class="col-xs-4">
                                  <p>Expiration Date</p>
                                </div>
                                <div class="col-xs-4">
                                  <div class="form-group">
                                    <select class="form-control stripe-expiry-month"
                                            autocomplete="off"
                                            required
                                            type="text">
                                      <option><?php echo __('Month', 'driveme'); ?></option>
                                      <option value="01"<?php if ($theme_option['payment_cc_testmode']) echo ' selected="selected"'; ?>>01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-xs-4">
                                  <div class="form-group">
                                    <select class="form-control stripe-expiry-year"
                                            autocomplete="off"
                                            required
                                            type="text">
                                      <option><?php echo __('Year', 'driveme'); ?></option>
                                      <?php $year = date('Y');
                                        for ($ii = 0; $ii <= 7; $ii++) { ?>
                                        <option value="<?php echo esc_attr( $year + $ii ); ?>"<?php if ($ii == 1 && $theme_option['payment_cc_testmode']) echo ' selected="selected"'; ?>><?php echo esc_html( $year + $ii ); ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </li>

                            <?php if ( $theme_option['payment_cc_note'] ) { ?>
                              <li class="col-md-12">
                                <p class="note"><?php echo esc_html( $theme_option['payment_cc_note'] ); ?></p>
                              </li>
                            <?php } ?>

                            <li class="col-md-12">
                              <!--======= BUTTONS =========-->
                              <button class="btn"><?php echo esc_html( $theme_option['payment_cc_button'] ); ?></button>
                            </li>
                          </ul>
                        </form>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if ($processors['paypal']) { ?>
                    <!--======= PAYPAL =========-->
                    <div id="paypal" class="tab-pane<?php if ($active == 'paypal') echo ' active'?>" role="tabpanel">
                      <div class="intres-lesson">

                        <!--======= FORM =========-->
                        <form id="paypal_course" action="https://www.<?php if ($theme_option['payment_pp_sandbox']) echo 'sandbox.'; ?>paypal.com/cgi-bin/webscr" method="post" data-form-type="paypal">

                          <input type="hidden" name="cmd" value="_xclick">
                          <input type="hidden" name="business" value="<?php echo esc_attr( $theme_option['payment_pp_email'] ); ?>">
                          <input type="hidden" name="item_name" data-bind="out:value" data-name="item" value="">
                          <input type="hidden" name="item_number" data-bind="out:value" data-name="sku" value="">
                          <input type="hidden" name="amount" data-bind="out:value" data-name="amount" value="">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="no_note" value="0">
                          <input type="hidden" name="currency_code" value="<?php echo esc_attr( $theme_option['payment_currency'] ); ?>">
                          <input type="hidden" name="return" value="<?php echo esc_url(add_query_arg( array('driveme_paypal_ipn_loader' => '', 'action' => 'paypal_ipn_handler', 'doredirect' => urlencode(add_query_arg( 'doaction', 'thank-you', get_permalink()))),  trim(get_home_url(), '/').'/' )); ?>">
                          <input type="hidden" name="cancel_return" value="<?php echo esc_url(add_query_arg( array('cid' => $current_course, 'doaction' => 'cancel'), get_permalink() )); ?>">
                          <input type="hidden" name="notify_url" value="<?php echo esc_url(add_query_arg( array('driveme_paypal_ipn_loader' => '', 'action' => 'paypal_ipn_handler'),  trim(get_home_url(), '/').'/' )); ?>">
                          <input type="hidden" name="custom" data-bind="out:value" data-name="custom" value="">

                          <ul class="row">

                            <?php if ( $theme_option['payment_pp_sandbox'] ) { ?>
                              <li class="col-md-12">
                                <p class="note warning"><?php echo __( 'TEST mode!', 'driveme' ); ?></p>
                              </li>
                            <?php } ?>

                            <?php if ( $theme_option['payment_pp_note'] ) { ?>
                              <li class="col-md-12">
                                <p class="note"><?php echo esc_html( $theme_option['payment_pp_note'] ); ?></p>
                              </li>
                            <?php } ?>
                          </ul>

                          <!--======= BUTTONS =========-->
                          <button id="paypal_payment" class="btn"><?php echo esc_html( $theme_option['payment_pp_button'] ); ?></button>
                        </form>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if ($processors['offline']) { ?>
                    <!--======= Offline =========-->
                    <div id="offline" class="tab-pane<?php if ($active == 'offline') echo ' active'?>" role="tabpanel">
                      <div class="intres-lesson">

                        <form id="offline_course" method="post" action="<?php the_guid(); ?>" data-form-type="offline">

                          <input type="hidden" data-bind="out:value" name="cid" value="">
                          <input type="hidden" data-bind="out:value" name="email" value="">
                          <input type="hidden" data-bind="out:value" name="firstname" value="">
                          <input type="hidden" data-bind="out:value" name="lastname" value="">
                          <input type="hidden" data-bind="out:value" name="message" value="">
                          <input type="hidden" data-bind="out:value" name="phone" value="">
                          <input type="hidden" data-bind="out:value" name="date" value="">
                          <input type="hidden" data-bind="out:value" name="amount" value="">
                          <input type="hidden" name="processor" value="offline">

                          <ul class="row">
                            <?php if ( $theme_option['payment_off_note'] ) { ?>
                              <li class="col-md-12">
                                <p class="note"><?php echo esc_html( $theme_option['payment_off_note'] ); ?></p>
                              </li>
                            <?php } ?>
                          </ul>

                          <button id="offline_payment" class="btn offline-payment"><?php echo esc_html( $theme_option['payment_off_button'] ); ?></button>
                        </form>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

  



    <?php endwhile; ?>

    </div>

  </section>

</div>

</section>

</div>

<?php get_footer(); ?>