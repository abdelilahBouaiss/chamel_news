<?php
/*
/** Template Name: Portfolio 2 Column
*/
 global $theme_option;
 $textdoimain = 'coyote';
get_header(); ?>
<div class="breadcrumb-wrap">
    <div class="container">
        <?php coyote_breadcrumbs();?>
                <small><?php
        $subtitle=get_post_meta(get_the_ID(),"_cmb_subtitlebread",true);
        if(isset($subtitle)){ echo esc_attr($subtitle);}else{} ?></small>
    </div>
</div>
<div class="body-content demo-purpose">
    <div class="container">
        <div class="row">
        	<div class="span12">
                <ul class="unstyled" id="filters">
                    <li class="filter" data-filter="all" data-role="button"><a href="javascript:void(0)">All</a></li>
                     <?php 
                        $skill=get_terms('categories');
                            if($skill && ! is_wp_error($skill)):
                            foreach((array)$skill as $skills){
                                $term_link=get_term_link( $skills, 'categories' );
                                $name=$skills->name;
                                $slug=$skills->slug;
                        ?>
                    <li class="filter" data-filter="<?php echo esc_attr($slug); ?>" data-role="button"><a href="javascript:void(0)"><?php echo esc_attr($name);?></a></li>
                    <?php }
                        endif; ?>
                </ul>
            </div>
            <div class="clearfix"></div>
            <ul id="Grid" class="unstyled">
            <?php 
                $args=array(
                    'paged' => $paged,
                    'post_type' => 'portfolio',
                    'posts_per_page' => $theme_option['portfolio_2'],
                );
                $wp_query=new WP_Query($args);
                while($wp_query->have_posts()) : $wp_query->the_post();
                 $item_classes = '';
                 $item_slug ='';
                    $item_cats = get_the_terms(get_the_ID(), 'categories');
                    foreach((array)$item_cats as $item_cat){
                        if(count($item_cat)>0){
                            $item_classes = $item_cat->name ;
                            $item_slug .= $item_cat->slug . ' ';
                        }
                    }
                    $params=array('width' => 570,'height' => 285);
                    $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); ?>
                <li class="mix span6 <?php echo esc_attr($item_slug);?>" data-sort="data-name">
                    <div class="portfolio-wrap">
                        <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="fancybox" data-fancybox-group="gallery" title="<?php the_title(); ?>">
                        <span class="item-on-hover"><span class="hover-image"><i class="fa fa-search fa-2x"></i></span></span>
                        <img src="<?php echo esc_url($image);?>" alt="">
                        </a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p> <?php echo coyote_portfolio_excerpt(15); ?> </p>
                        <div class="port-icon">
                            <span><i class="fa fa-picture-o"></i></span>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>  
                <div class="clearfix"></div>
            </ul>
        </div>
    </div>
</div>
<?php
get_footer();?>