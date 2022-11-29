<?php
/*
/** Template Name: Search Courses
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
			<section class="products">
				<div class="row">
					<?php

					$q_name = array(
						'key' => '_cmb_courses_name',
						'value' => esc_attr($_POST['courses-name']),
						'compare' => 'LIKE',
					);

					$q_address = array(
						'key' => '_cmb_courses_address',
						'value' => esc_attr($_POST['courses-address']),
						'compare' => 'LIKE',
					);
					$q_time = array(
						'key' => '_cmb_courses_time',
						'value' => esc_attr($_POST['courses-time']),
						'compare' => 'LIKE',
					);
					/*$q_car = array(
						'key' => '_cmb_courses_car',
						'value' => esc_attr($_POST['courses-car']),
						'compare' => 'LIKE',
					);*/
					if ($_POST['courses-name'] == 'null' || $_POST['courses-name'] == '') {
						$q_name = '';
					}
					if ($_POST['courses-address'] == 'null' || $_POST['courses-address'] == '') {
						$q_address = '';
					}
					/*if($_POST['courses-time'] == 'null' || $_POST['courses-time'] == ''){
						$q_time = '';
					} */
					/*if($_POST['courses-car'] == 'null' || $_POST['courses-car'] == ''){
						$q_car = '';
					} */
					/*if($_POST['courses-date'] == ''){
						$_POST['courses-date'] = '01/01/2015';
					} */
					$args = array(
						'post_type' => 'courses',
						/*'date_query' => array(
							array(
								'after'     => esc_attr($_POST['courses-date']),
								'before'    => date('m/d/Y'),
								'inclusive' => true,
							),
						),*/
						'tax_query' => array(
							array(
								'taxonomy' => 'categories',
								'field' => 'name',
								'terms' => esc_attr($_POST['courses-type'])
							)
						),
						'meta_query' => array(
							$q_name,
							$q_address,
						),
					);
					$wp_query = new WP_Query($args);
					//print_r($wp_query);

					if ($wp_query->have_posts()) {
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$ratings = get_post_meta(get_the_ID(), '_cmb_courses_rate', true);
							$prices = get_post_meta(get_the_ID(), '_cmb_courses_price', true);

							$params = array('width' => 261, 'height' => 222);
							$thumbnails = bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()), $params);
							$categorie_names = '';
							$categories = get_the_terms(get_the_ID(), 'categories');
							foreach ((array)$categories as $categorie) {

								if (count($categories) == 1) {
									$categorie_names .= $categorie->name;
								} elseif (count($categories) > 1) {

									$categorie_names .= $categorie->name . ' , ';
								}
							}

							$course_start = get_post_meta(get_the_ID(), '_cmb_courses_date', true);
							date_default_timezone_set('UTC');

							/*if(!empty($course_start)) {
			
			if(date("M", $course_start) <= date('M') ) {*/
					?>


							<!--======= ITEM 1 =========-->
							<div class="col-sm-3">
								<div class="prodct">

									<!--======= IMAGE =========-->
									<img class="img-responsive" src="<?php echo esc_url($thumbnails); ?>" alt="">
									<!-- <span class="c-date"><?php
																$course_start = get_post_meta(get_the_ID(), '_cmb_courses_date', true);
																echo esc_attr(date("j", $course_start)); ?> <br>
				
				<?php echo esc_attr(date("M", $course_start)); ?></span> --><span class="c-like"><?php echo cc_love(); ?></span>
									<div class="pro-info">

										<!--======= ITEM NAME / RATING =========-->
										<div class="cate-name"> <span class="pull-left"><?php echo esc_attr($categorie_names); ?></span>
											<ul class="stars pull-right">
												<li <?php if ($ratings == 'zero') {
														echo 'class="no-rate"';
													} else {
													} ?>><i class="fa fa-star"></i></li>
												<li <?php if ($ratings == 'zero' || $ratings == 'one') {
														echo 'class="no-rate"';
													} else {
													} ?>><i class="fa fa-star"></i></li>
												<li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two') {
														echo 'class="no-rate"';
													} else {
													} ?>><i class="fa fa-star"></i></li>
												<li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three') {
														echo 'class="no-rate"';
													} else {
													} ?>><i class="fa fa-star"></i></li>
												<li <?php if ($ratings == 'zero' || $ratings == 'one' || $ratings == 'two' || $ratings == 'three' || $ratings == 'four') {
														echo 'class="no-rate"';
													} else {
													} ?>><i class="fa fa-star"></i></li>
											</ul>
										</div>

										<!--======= ITEM Details =========-->
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<hr>
										<span class="price"><?php echo esc_attr($prices); ?></span>
										<?php
										$courseid = get_the_ID();
										$bookingtype = get_post_meta($courseid, '_cmb_booking_type', true);
										if ($bookingtype == 'default' || empty($bookingtype)) { ?>
											<form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
												<button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
												<input type="hidden" name="booking_title" value="<?php echo get_the_ID(); ?>" />

												<input type="hidden" name="Name" value="<?php echo esc_attr($_POST['sl_name']); ?>" />
												<input type="hidden" name="Phone" value="<?php echo esc_attr($_POST['sl_phone']); ?>" />
												<input type="hidden" name="Email" value="<?php echo esc_attr($_POST['sl_email']); ?>" />
												<input type="hidden" name="datepicker" value="<?php echo esc_attr($_POST['courses-date']); ?>" />
												<input type="hidden" name="courses-type" value="<?php echo esc_attr($_POST['courses-type']); ?>" />
											</form>
											<?php } elseif ($bookingtype == 'external') {
											$external_link = get_post_meta($courseid, '_cmb_booknow_externallink', true);
											if ($external_link != '') {
											?>
												<a href="<?php echo esc_url($external_link); ?>" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></a>
											<?php } else { ?>
												<form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
													<button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
													<input type="hidden" name="booking_title" value="<?php echo get_the_ID(); ?>" />

													<input type="hidden" name="Name" value="<?php echo esc_attr($_POST['sl_name']); ?>" />
													<input type="hidden" name="Phone" value="<?php echo esc_attr($_POST['sl_phone']); ?>" />
													<input type="hidden" name="Email" value="<?php echo esc_attr($_POST['sl_email']); ?>" />
													<input type="hidden" name="datepicker" value="<?php echo esc_attr($_POST['courses-date']); ?>" />
													<input type="hidden" name="courses-type" value="<?php echo esc_attr($_POST['courses-type']); ?>" />
												</form>
											<?php }
										} elseif ($bookingtype == 'woocommerce') {
											$woo_product_id = get_post_meta($courseid, '_cmb_booknow_woocommerce', true);
											if ($woo_product_id != '') { ?>
												<a href="<?php echo site_url() . '/?add-to-cart=' . $woo_product_id ?>" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></a>
											<?php } else { ?>
												<form method="post" action="<?php echo esc_url($theme_option['courses_linkbooking']); ?>" id="booking_form">
													<button type="submit" class="btn booking_form"><?php echo esc_attr($theme_option['courses_booknow']) ?></button>
													<input type="hidden" name="booking_title" value="<?php echo get_the_ID(); ?>" />

													<input type="hidden" name="Name" value="<?php echo esc_attr($_POST['sl_name']); ?>" />
													<input type="hidden" name="Phone" value="<?php echo esc_attr($_POST['sl_phone']); ?>" />
													<input type="hidden" name="Email" value="<?php echo esc_attr($_POST['sl_email']); ?>" />
													<input type="hidden" name="datepicker" value="<?php echo esc_attr($_POST['courses-date']); ?>" />
													<input type="hidden" name="courses-type" value="<?php echo esc_attr($_POST['courses-type']); ?>" />
												</form>
										<?php }
										}
										?>
										<a href="<?php the_permalink(); ?>" class="btn btn-1"><?php echo esc_attr($theme_option['courses_detail']); ?></a>
									</div>
								</div>
							</div>


						<?php
						/*}
									
								}*/

						endwhile;
					} else {  ?>
						<h3 class="result"><?php esc_html_e('No Result Found', 'driveme') ?></h3>
					<?php } ?>
				</div>
			</section>
		</div>
	</section>
</div>
<?php get_footer(); ?>