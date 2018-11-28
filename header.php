<!DOCTYPE HTML> 
<html lang="bn-BD"> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width"> 
<title><?php bloginfo('Sitename');?> | <?php if (is_single()) {wp_title('');}else{?><?php echo get_bloginfo ('description'); }?></title> 
<?php if(is_404()){?><meta name='robots' content='noindex,follow' /><?php }?>
<link rel="shortcut icon" href=""/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type='text/css' media='all' />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jquery.bxslider.css" type='text/css' media='all' />

<script type="text/javascript"> $(document).ready(function(){ $('.bxslider').bxSlider({ auto: true, autoControls: true, adaptiveHeight: true }); }); </script>
<?php wp_head();?></head>
 <body> 
 <div id="header" class="wrapper fix"> 
 <div class="header fix">
  <!--Website banner here--> 
 <img src=""height="200px" width="1000px" alt="banner" /> 
 </div> 
 </div>
 <!--End header--> 
 <div style="clear: both;"></div> 
  <div id="navigationbr" class="wrapper"> 
  <div class="navigationbr"> <?php wp_nav_menu();?>
   </div> </div> <!--End navigation-->
    <div style="clear: both;"></div> 
	 <div id="scroller" class="wrapper fix">
	  <div class="scroller left"> 
<div class="scroller_id floatleft fix"> 
  <font color="red"><FONT SIZE=+1>নোটিস : </FONT></font>:</div>
  <div class="scroller_note floatright "> 
     <span style="background-color:#ADD8E6;"> আপনাদের সকলকে অভিনন্দন </span> 
   </div> </div> </div> <!--End scroller--> 
   
   <div style="clear: both;"></div> <div class="wrapper"> 
    <div class="ads_place">
	 <script type="text/javascript">
				var gandr_conf = {
					siteid : 2260,
					slot : 8158,
				};
      </script>
<script type="text/javascript" src="http://www.gandrad.org/lib/ad.js"></script> 
</div> </div> <div id="content" class="wrapper fix"><div class="content fix">