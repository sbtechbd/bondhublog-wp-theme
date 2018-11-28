<?php get_header();?> 
<div class="main_content fix floatleft"> 
<div class="daily_post fix"> <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<div class="post_area"> <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> <h1><?php the_title(); ?></h1> 
<div class="user_img floatright"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></div>
<div class="post_meta"> প্রকাশ : <?php the_time('l j F , Y ইং, সময়ঃ g:i a'); ?>, লিখেছেন : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_meta( 'display_name' );?> </a> </div> <?php the_content();?> <div class="share_post"> <ul> <li>লেখাটি বন্ধুদের সাথে শেয়ার করুন </li> <li><a class="fb" target="blank_" href="http://facebook.com/share.php?u=<?php the_permalink(); ?>">ফেসবুক</a></li> <li><a class="tw" target="blank_" href="http://twitter.com/share?url=<?php the_permalink(); ?>">টুইটর</a></li> <li><a class="gplus" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" id="google-plus" target='_blank'>গুগুল +</a></li> </ul> </div>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/%E0%A6%AC%E0%A6%A8%E0%A7%8D%E0%A6%A7%E0%A7%81%E0%A6%AC%E0%A7%8D%E0%A6%B2%E0%A6%97/345877002134991" data-width="590" data-height="200" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div> <div class="ads_place</script>"> <script type="text/javascript">
	var gandr_conf = {
		siteid : 2260,
		slot : 5522,
	};
</script>
<script type="text/javascript" src="http://gandrad.org/lib/ad.js"></script>

<style type="text/css">
div.styled {
  border:2px dotted #ff9900;
  }
</style>
<div class="styled"><em><p><font size="6" face=Solaiman lipi" color="blue">এ</font>ই প্রকাশনার বিষয়বস্তু ও মন্তব্য একান্তই লেখকের নিজের, লেখার যে কোন নৈতিক ও আইনগত দায়-দায়িত্বও লেখকের। অনুরূপভাবে কোন লেখা, মন্তব্য বা মন্তব্যের স্বত্ব সম্পূর্ণভাবে সংশ্লিষ্ট ব্লগারের। ব্লগ কর্তৃপক্ষ কোনভাবেই দায়ী নয়।</p></em></div>
</div> <div class="comments_area"> <?php comments_template(); ?> </div> </div> </div> <?php endwhile; ?> <div class="pagenav"><?php pagenavi();?></div> <?php else : ?> <h2>Not Found</h2> <?php endif; ?> <?php wp_reset_query();?> </div> </div> <!--End main area--> <?php get_sidebar();?> <?php get_footer();?>