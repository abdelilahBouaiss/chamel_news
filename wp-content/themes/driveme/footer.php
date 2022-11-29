<?php
/**
 * The template for displaying the footer
 */
 global $theme_option; 
?>
<!--======= QUOTE =========-->
    <section class="quote-sim">
      <div class="container">
        <h3 class="pull-left"><?php echo esc_attr($theme_option['footer_title']); ?></h3>
        <!--======= GET A QUOTE BUTTOn =========--> 
        <a class="pull-right btn margin-t-20" href="<?php echo esc_url($theme_option['footer_quotelink']); ?>"><?php echo esc_attr($theme_option['footer_quotetext']); ?></a> </div>
    </section>
<!--======= FOOTER =========-->
    <footer>
      <div class="container">
        <ul class="row"> 
          
          
              
              <!--======= ABOUT US =========-->
              <li class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                <?php dynamic_sidebar('sidebar-2'); ?>
              <?php endif; ?>
              </li>
              
              <!--======= USEFUL LINKS =========-->
              <li class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                <?php dynamic_sidebar('sidebar-3'); ?>
              <?php endif; ?>
              </li>
            
          
        
              <!--======= USEFUL LINKS =========-->
              <li class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <?php dynamic_sidebar('sidebar-4'); ?>
              <?php endif; ?>
              </li>
              
              <!--======= OPENING HOURS =========-->
              <li class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                <?php dynamic_sidebar('sidebar-5'); ?>
              <?php endif; ?>
              </li>
            </ul>
          </div>
      
      
      
      <!--======= RIGHTS =========-->
      <div class="rights">
        <div class="container">
          <ul class="row">
            <li class="col-md-8">
              <p><?php echo wp_specialchars_decode(esc_attr($theme_option['footer_text'])) ; ?></p>
            </li>
            <!--======= SOCIAL ICON =========-->
            <li class="col-md-4">
              <ul class="social_icons">
              <?php if($theme_option['footer_facebook']!=''){ ?>
                <li class="facebook"><a href="<?php echo esc_url($theme_option['footer_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['footer_google']!=''){ ?>
                <li class="googleplus"><a href="<?php echo esc_url($theme_option['footer_google']); ?>"><i class="fa fa-google-plus"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['footer_twitter']!=''){ ?>
                <li class="twitter"><a href="<?php echo esc_url($theme_option['footer_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['footer_pinterest']!=''){ ?>
                <li class="pinterest"><a href="<?php echo esc_url($theme_option['footer_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['footer_vimeo']!=''){ ?>
                <li class="vimeo"><a href="<?php echo esc_url($theme_option['footer_vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['footer_linkedin']!=''){ ?>
                <li class="linkedin"><a href="<?php echo esc_url($theme_option['footer_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
              <?php }else{} ?>
              <?php if($theme_option['more_icon']!=''){ ?>
                <li class="facebook"><a href="<?php echo esc_url($theme_option['more_url']); ?>"><i class="fa <?php echo esc_attr($theme_option['more_icon']); ?>"></i></a></li>
              <?php }else{} ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <?php if($theme_option['layout_style']=='boxed'){?>
  </div>
	  <?php }?>
</div>

<?php wp_footer(); ?>

</body>
</html>
    
