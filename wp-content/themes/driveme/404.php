<?php
/**
 * The template name: 404 Not Found
 */
global $theme_option; 
get_header(); ?>
  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="container">
      <h2><?php esc_html_e('Page Not Found', 'driveme') ?></h2>
      <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>
    </div>
  </div>
<!--======= CONTENT START =========-->
<div class="content"> 
    
    <!--HOME START===========================================-->
    <div class="missing-2">
      <div class="container">
        <div class="text">
          <div class="cont">
            <h3> <?php esc_html_e('OOPS!', 'driveme') ?></h3>
            <br>
            <span><?php echo wp_specialchars_decode(esc_attr($theme_option['404_title'])); ?></span>
            <?php echo wp_specialchars_decode(esc_attr($theme_option['404_content'])); ?>
            <a class="btn" href="<?php echo home_url(); ?>">GO BACK</a> </div>
        </div>
      </div>
    </div>
</div>
<?php
get_footer();
