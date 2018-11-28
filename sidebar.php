<!--Sidebar area-->
			<div id="sidebar" class="sidebar fix floatright">
<div class="widgetbar ur_panel">
<?php
if (!is_user_logged_in()):
echo"<h2> সাহিত্য ম্যাগাজিনে অভিনন্দন </h2>";
$args = array(
        'label_username' => __( 'ব্যবহারকারীর নাম' ),
        'label_password' => __( 'গোপনচাবি' ),
        'label_remember' => __( 'মনে রাখুন' ),
        'label_log_in'   => __( ' প্রবেশ করুন' )
);
echo wp_login_form($args);
echo"<a class=\"reg_me\" href=\"wp-login.php?action=register\"> নিবন্ধন করুন</a>";
else:

global $current_user;
get_currentuserinfo();
?>
<h2>অভিনন্দন <?php echo $current_user->display_name; ?></h2>
<div class="floatright"><?php echo get_avatar( $current_user->ID, 100 );?></div>
<ul class="u_panel">
	<li><a href="wp-admin"><font size="5" face=Solaiman lipi" color="Red">নিয়ন্ত্রণকক্ষ</font></a></li>
	<li><a href="wp-admin/profile.php">আপনার প্রোফাইল</a></li>
	<li><a href="wp-admin/post-new.php">নতুন লেখা প্রকাশ করুন</a></li>
	<li><a href="wp-login.php?action=logout&_wpnonce=02c3521c50">বিদায়</a></li>
	<li>সর্বমোট প্রকাশনা : <?php echo make_bangla_number(count_user_posts( $current_user->ID )); ?> টি</li>
<?php
global $wpdb;
$where = 'WHERE comment_approved = 1 AND user_id = ' . $current_user->ID ;
$comment_count = $wpdb->get_var(
    "SELECT COUNT( * ) AS total
		FROM {$wpdb->comments}
		{$where}
	");

?>
	<li>সর্বমোট মন্তব্য : <?php echo make_bangla_number($comment_count); ?> টি</li>
	<li><a class="author_page" href="index.php/?author=<?php echo $current_user->ID; ?>">আপনার সাহিত্যপাতা</a></li>
</ul>
<?php
endif;
?>
</div>


				<?php dynamic_sidebar('sidebar-widgets');?>
			</div>
			<!--End Sidebar area-->