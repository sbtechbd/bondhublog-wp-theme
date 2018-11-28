<?php get_header();?> <div class="main_content fix floatleft"> <div class="daily_post fix"> <?php if (have_posts()) : while (have_posts()) : the_post(); ?> <div class="post_area"> <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> <div class="user_img floatright"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></div> <div class="post_meta"> প্রকাশ : <?php the_time('l j F , Y ইং, সময়ঃ g:i a'); ?>, লিখেছেন : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_meta( 'display_name' );?></a> </div> <?php the_excerpt();?> <a class="read_more" href="<?php the_permalink() ?>">বিস্তারিত পড়ুন</a> <div class="post_meta"> <div class="cat_tag_view floatleft">বিভাগ: <?php the_category(', ') ?> | <?php if(function_exists('the_views')) { the_views(); echo" |"; } ?> <?php the_tags('ট্যাগ: ', ', ', ''); ?></div> <div class="com_count"><?php comments_popup_link('No comment', '1 comment', '% comment'); ?></div> </div> </div> </div> <?php endwhile; ?>
<div class="fix ads_place"><script type="text/javascript">
	var gandr_conf = {
		siteid : 2260,
		slot : 6141,
	};
</script>
<script type="text/javascript" src="http://gandrad.org/lib/ad.js"></script></div>
<div class="pagenav"><?php pagenavi();?></div> <?php else : ?> <h2>Not Found</h2> <?php endif; ?> <?php wp_reset_query();?> </div> </div> <!--End main area--> <?php get_sidebar();?> <?php get_footer();?>