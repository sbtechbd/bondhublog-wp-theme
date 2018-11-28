<?php
/*standard width*/
if ( ! isset( $content_width ) ) $content_width = 1000;

/*Removing js*/
wp_deregister_script( 'jquery' );

/*Adding jquery
function my_scripts() {
   wp_enqueue_script( 'arbscript', get_template_directory_uri().'/js/jquery.js' );
   wp_enqueue_script( 'arbscriptwo', get_template_directory_uri().'/js/jquery.bxslider.min.js' );
   wp_enqueue_style( 'arbstyle', get_stylesheet_directory_uri().'/style.css' );
   wp_enqueue_style( 'arbslider', get_template_directory_uri().'/jquery.bxslider.css' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
*/
/*addd menu*/
register_nav_menu( 'primary', 'Primary Menu' );

/*Add post thumbnail*/
add_theme_support( 'post-thumbnails' );

/*theme comment support*/
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="comment_li" id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
 
         <?php printf(__('<cite class="fn">%s</cite> <span class="says">মন্তব্যে বলেছেন:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
 
      <div class="comment-meta commentmetadata">
          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
              <?php printf(__('%1$s / %2$s'), get_comment_date(),  get_comment_time()) ?>
          </a>
          <?php edit_comment_link(__('(সম্পাদনা করুন)'),'  ','') ?>
      </div>
 
      <?php comment_text() ?>
 
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('reply_text' => 'জবাব দিন', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
	</li>
<?php
        }
?>
<?php
/*comment reply*/
function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

/*Configure sidebar*/
if (function_exists('register_sidebar')) {		
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widgetbar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}

/*bangla number*/
function make_bangla_number($str)
{
   $engNumber = array(1,2,3,4,5,6,7,8,9,0,'Sat','Sun','Mon','Tue','Wed','Thu','Fri','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','January','February','March','April','May','June','July','August','September','October','November','December','No comment','comment');
    $bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৄহস্পতিবার','শুক্রবার','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','মন্তব্যের অপেক্ষায়','টি মন্তব্য');
    $converted = str_replace($engNumber, $bangNumber, $str);
    return $converted;
}
add_filter( 'get_the_time', 'make_bangla_number' );
add_filter( 'the_date', 'make_bangla_number' );
add_filter( 'get_the_date', 'make_bangla_number' );
add_filter( 'comments_number', 'make_bangla_number' );
add_filter( 'get_comment_date', 'make_bangla_number' );
add_filter( 'get_comment_time', 'make_bangla_number' );
add_filter( 'the_views', 'make_bangla_number' );

/*Adding pagination*/
function pagenavi( $p = 2 ) { // pages will be show before and after current page
  if ( is_singular() ) return; // don't show in single page
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  if ( $max_page == 1 ) return; // don't show when only one page
  if ( empty( $paged ) ) $paged = 1;
  // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> '; // pages
  if ( $paged > $p + 1 ) p_link( 1, 'First' );
  if ( $paged > $p + 2 ) echo '... ';
  for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
    if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>".make_bangla_number($i)."</span> " : p_link( $i );
  }
  if ( $paged < $max_page - $p - 1 ) echo '... ';
  if ( $paged < $max_page - $p ) p_link( $max_page, 'Last' );
}
function p_link( $i, $title = '' ) {
  if ( $title == '' ) $title = "Page {$i}";
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>".make_bangla_number($i)."</a> ";
}

/*Adding post excerpt*/
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $excerpt_length = 40;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

/*Adding commercial*/
function commercial_footer(){
	echo"<p>ওয়েবসাইটটি ডিজাইন করেছেন</p>";
	echo"<a href=\"http://sbtechbd.com\">সুব্রত দেব নাথ</a>";
}

/*add theme options*/
require_once ('admin/index.php');


function php_text($text) {
 if (strpos($text, '<' . '?') !== false) {
 ob_start();
 eval('?' . '>' . $text);
 $text = ob_get_contents();
 ob_end_clean();
 }
 return $text;
}
add_filter('widget_text', 'php_text', 99);
?>

