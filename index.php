<?php get_header();?> 
<div class="main_content fix floatleft">
<?php if(is_front_page()){?>
<div class="slider fix"> 
<ul class="bxslider">
<?php $sticky = get_option( 'sticky_posts' ); 
rsort( $sticky ); // Sort the stickies, latest first
$sticky = array_slice( $sticky, 12, 12 );// Number of stickies to show 
query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 12, 'showposts'=> 12 ) );?> 
<?php if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?> <!-- main query --> <li> <div class="slider_post"> <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> <div class="post_info"> <?php the_excerpt();?> <a class="read_more" href="<?php the_permalink() ?>"></a>বিস্তারিত পড়ুন </div> <div class="post_author"> <p>লিখেছেন : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_meta( 'display_name' );?></a></p> <br /><p><?php the_author_meta('description'); ?></p> </div> </div> </li> <!-- main query --> <?php endwhile; ?> <?php next_posts_link(); ?> <?php endif; ?> <?php wp_reset_query();?> </ul> </div> <div style="clear: both;"></div> <?php }?> <!--End Slider-->
  <div class="fix ads_place">
<script type="text/javascript">
	var gandr_conf = {
		siteid : 2260,
		slot : 6141,
	};
</script>
<script type="text/javascript" src="http://gandrad.org/lib/ad.js"></script>
<img src=""height="100px" width="650px" alt="banner"/>
</div>

<div style="clear: both;"></div> <!--banner ads--> 
 <div class="daily_post fix"> 
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
 <div class="post_area"> <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> <div class="user_img floatright"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></div> <div class="post_meta"> প্রকাশ : <?php the_time('l j F , Y ইং, সময়ঃ g:i a'); ?>, লিখেছেন : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_meta( 'display_name' );?></a> </div>
  <?php the_excerpt();?> <a class="read_more" href="<?php the_permalink() ?>">বিস্তারিত পড়ুন</a> <div class="post_meta"> 
  <div class="cat_tag_view floatleft">বিভাগ : <?php the_category(', ') ?> | <?php if(function_exists('the_views')) { the_views(); echo" |"; } ?> <?php the_tags('ট্যাগঃ ', ', ', ''); ?> </div> <div class="com_count"><?php comments_popup_link('No comment', '1 comment', '% comment'); ?></div> </div> </div> </div> <?php endwhile; ?> <div class="pagenav"><?php pagenavi();?></div> <?php else : ?> <h2>Not Found</h2> <?php endif; ?> <?php wp_reset_query();?> </div> <div class="fix ads_place">
<script type="text/javascript">
	var gandr_conf = {
		siteid : 2260,
		slot : 8958,
	};
</script>


<script type="text/javascript" src="http://www.gandrad.org/lib/ad.js"></script></div>
  
  <!--- Start ads
  
  (function() {
    var cx = '008104732272001768982:owj1wa77peu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script> 

 end ads-->

</div> <!--End main area--> 

<?php get_sidebar();?> 
<?php get_footer();?>