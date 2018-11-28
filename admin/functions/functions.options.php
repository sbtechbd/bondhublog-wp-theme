<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing
		function my_list_cats() {
								  $cats = get_categories();
								  foreach($cats as $cat) {
									  $catsArray[] = __('' . $cat->cat_name . '','hs_textdomain') . "";
								  }
								  return $catsArray;
								}
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_select_list 	= array(5,10,15);
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Upload your website logo",
						"desc" 		=> "Choose logo (size must be 300px * 80px)",
						"id" 		=> "site_logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
				
$of_options[] = array( 	"name" 		=> "Upload your website favicon logo",
						"desc" 		=> "Choose logo (size must be 16px * 16px)",
						"id" 		=> "site_favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
				
$of_options[] = array( 	"name" 		=> "Upload your website banner",
						"desc" 		=> "Choose banner",
						"id" 		=> "site_bnr",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
				
// Advertisement settings
$of_options[] = array("name"=> "Ads manager", "type"=> "heading", "icon"=> ADMIN_IMAGES . "icon-slider.png");

$of_options[] = array(	"name" => "Advertise place: 1",
						"desc" => "Paste your ads code here",
						"id" => "ads_1",
						"std" => "Place your ads here",
						"type" => "textarea"
				);
				
$of_options[] = array(	"name" => "Advertise place: 2",
						"desc" => "Paste your ads code here",
						"id" => "ads_2",
						"std" => "Place your ads here",
						"type" => "textarea"
				);

$of_options[] = array(	"name" => "Advertise place: 3",
						"desc" => "Paste your ads code here",
						"id" => "ads_3",
						"std" => "Place your ads here",
						"type" => "textarea"
				);
				
$of_options[] = array(	"name" => "Advertise place: 4",
						"desc" => "Paste your ads code here",
						"id" => "ads_4",
						"std" => "Place your ads here",
						"type" => "textarea"
				);

// sharing option
$of_options[] = array("name"=> "sharing options", "type"=> "heading", "icon"=> ADMIN_IMAGES . "icon-slider.png");
				
$of_options[] = array(	"name" => "Change share this text",
						"desc" => "Translate share this text",
						"id" => "share_area",
						"std" => "Share this",
						"type" => "text"
				);
				
// Translation options
$of_options[] = array("name"=> "Translation option", "type"=> "heading", "icon"=> ADMIN_IMAGES . "icon-slider.png");


$of_options[] = array(	"name" => "notice",
						"desc" => "Your desired information",
						"id" => "notice",
						"std" => "notice here",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Scroller news",
						"desc" => "Your desired information",
						"id" => "notice_here",
						"std" => "Display full notice which scroll",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Read more",
						"desc" => "Your desired information",
						"id" => "r_more",
						"std" => "Read more",
						"type" => "text"
				);

$of_options[] = array(	"name" => "by",
						"desc" => "Your desired information",
						"id" => "b_y",
						"std" => "writen by",
						"type" => "text"
				);

$of_options[] = array(	"name" => "date",
						"desc" => "Your desired information",
						"id" => "date_here",
						"std" => "date",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Category",
						"desc" => "Your desired information",
						"id" => "cat_name",
						"std" => "date",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Author home",
						"desc" => "Your desired information",
						"id" => "auth_home",
						"std" => "Author home",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Full name",
						"desc" => "Your desired information",
						"id" => "auth_name",
						"std" => "Full name",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Registration",
						"desc" => "Your desired information",
						"id" => "auth_reg",
						"std" => "Registration",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Short Bio",
						"desc" => "Your desired information",
						"id" => "auth_bio",
						"std" => "Short Bio",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Total post",
						"desc" => "Your desired information",
						"id" => "tot_post",
						"std" => "Total post",
						"type" => "text"
				);
				
$of_options[] = array(	"name" => "Total comment",
						"desc" => "Your desired information",
						"id" => "tot_com",
						"std" => "Total comment",
						"type" => "text"
				);
				
// Footer options
$of_options[] = array("name"=> "Footer options", "type"=> "heading", "icon"=> ADMIN_IMAGES . "icon-slider.png");

$of_options[] = array(	"name" => "Footer text",
						"desc" => "Your sitename/ copyright information",
						"id" => "copyright",
						"std" => "Copyright info here",
						"type" => "text"
				);

// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
