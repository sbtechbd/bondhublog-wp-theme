<?php get_header();?>
			<div class="main_content fix floatleft">
				<div class="daily_post fix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post_area">
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
							<div class="user_img floatright"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></div>
							<div class="post_meta">
							<?php echo $data['date_here'];?> : <?php the_time('d/m/Y'); ?>,
							<?php echo $data['b_y'];?> : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_meta( 'display_name' );?></a>
							</div>
								<?php the_excerpt();?>
								<a class="read_more" href="<?php the_permalink() ?>"><?php echo $data['r_more'];?></a>
							<div class="post_meta">
								<div class="cat_tag_view floatleft"><?php echo $data['cat_name'];?>: <?php the_category(', ') ?> | <?php if(function_exists('the_views')) { the_views(); echo" |"; } ?> <?php the_tags('Tags: ', ', ', ''); ?></div>
								<div class="com_count"><?php comments_popup_link('No comment', '1 comment', '% comment'); ?></div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<div class="pagenav"><?php pagenavi();?></div>
					<?php else : ?>
						<h2>Not Found</h2>
					<?php endif; ?>
					<?php wp_reset_query();?>
				</div>
			</div>
			<!--End main area-->
<?php get_sidebar();?>
<?php get_footer();?>