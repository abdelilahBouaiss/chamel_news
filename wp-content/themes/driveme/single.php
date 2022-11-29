<?php
 global $theme_option;
get_header(); ?>
<div class="sub-banner">
    <div class="container">
      <?php if (function_exists('driveme_breadcrumbs')) driveme_breadcrumbs(); ?>
    </div>
</div>
<?php while(have_posts()) : the_post();      
    $post_style= get_post_meta(get_the_ID(), "_cmb_post_sidebar",true);     
if($post_style == '' ){
		$post_style = 'right';
	}		
    $params = array( 'width' => 770, 'height' => 385 );
    $thumbnail = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
    $subtitle= get_post_meta(get_the_ID(), "_cmb_subtitle", true);
    $video= get_post_meta(get_the_ID(), "_cmb_link_video", true);
?>
<?php  $format = get_post_format($post->ID);?>
<!--======= CONTENT START =========-->
  <div class="content"> 
    
    <!--======= NEWS / FAQS =========-->
    <section class="news">
      <div class="container"> 
        
        <!--======= TITTLE =========-->
        <div class="tittle">
          <h3><?php the_title(); ?></h3>
          <p><?php echo esc_attr($subtitle); ?></p>
          <hr>
        </div>
        <div class="news-artical products blog single-post">
          <div class="row"> 
            <?php
            if($post_style == 'left'){ 
            ?>
            <div class="col-md-4">
              <div class="blog-side-bar"> 
                
                <?php get_sidebar();?>
                
              </div>
            </div>
            <?php }else{} ?>
            <!--======= NEWS ARTICALS =========-->
            <div class="col-md-8"> 
              
              <!--======= BLOG PAGE =========-->
                <div class="b-post"> 
                <?php if($format == 'video'){ ?>
                <?php if(isset($video) && $video != ''){ ?>
                <div class="js-video">
                    <iframe src="<?php echo esc_url($video); ?>" width="500px" height="430px" title="The Sound of COS" allowfullscreen=""></iframe>
                </div>
                <?php }else{} ?>
                <?php }else{ ?>
                <img class="img-responsive" src="<?php echo esc_url($thumbnail); ?>" alt=""> 
                <?php }?>
                <!--======= BLOG TEXT =========-->
                <ul class="post-info">
                  <li><?php the_time('F d, Y') ?> <span>/</span> </li>
                  <li> <?php the_category(' '); ?> <span>/</span></li>
                  <li> <?php echo esc_attr($theme_option['blog_by']); ?> <a href="<?php the_permalink();?>"> <?php the_author_posts_link(); ?></a> <span>/</span> </li>
                  <li> <?php comments_number( __('0 Comments', 'driveme'), __('1 Comments', 'driveme'), __('% Comments', 'driveme') ); ?> </li>
                </ul>
                <?php the_content(); 
                wp_link_pages();?>
                <?php
                  if(get_the_tag_list()) {
                    echo get_the_tag_list('<div class="tagss" rel="tag" href="#">',' ','</div>');
                  }
                ?>
                <!--======= SHARE =========-->
                <div class="post-tags share">
                  <h4>Shares</h4>
                  <ul class="social_icons">
                    <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="pinterest"><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a></li>
                    <li class="twitter"><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="googleplus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li class="vimeo"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=Put your summary here" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
                
                <!--======= ADMIN INFO =========-->
                <div class="auther-info">
                  <ul>
                    <li>
                        <div class="img-admin"> <?php //echo get_avatar( get_the_author_meta('user_email'), 74 );
                                echo get_avatar(get_the_author_meta('user_email'),$size='74',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=74' );?>
                        </div>
                    </li>
                    <li>
                      <h4><?php echo get_the_author_meta('display_name');?></h4>
                      <p><?php echo get_the_author_meta('description');?> </p>
                    </li>
                  </ul>
                </div>
                
                <!--======= COMMENTS  PEOPLES =========-->
                <?php comments_template();?>
                
                <!--======= COMMENTS FORM =========-->
                
              </div>
            </div>
            <?php
            if($post_style == 'right'){ 
            ?>
            <div class="col-md-4">
              <div class="blog-side-bar"> 
                
                <?php get_sidebar();?>
                
              </div>
            </div>
            <?php }else{} ?>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php endwhile;  ?>
<?php get_footer(); ?>