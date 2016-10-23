<?php
/* ****************************
	#Gallery code
	#Attributes
	-gallery_images
	-first
	-last
	-thumb_width
	-thumb_height
	-gallery_page
	-gallery_name
	
	#Further instructions
	-set in init.php
	$headScript ='';
	$footScript='';

	
	if (strpos($content, "class='swipebox'")) {
		$headScript .= "<link rel='stylesheet' href='{$config->urls->templates}bower_components/swipebox/src/css/swipebox.min.css' media='screen' />";
		
$footScript .= "<script src='{$config->urls->templates}bower_components/swipebox/src/js/jquery.swipebox.min.js'></script>\n"."<script>\n;( function( $ ) {\n $( '.swipebox' ).swipebox();\n } )( jQuery );\n</script>";
}


	- echo in _main/_masterpage.php $headScript and $footScript in apropriate places

  ****************************
*/
$fileField = (isset($gallery_images)) ? $gallery_images : 'gallery_images';
$swipebox = true;
$galleryPage = (isset($gallery_page)) ? $gallery_page : false;


$start = (isset($first)) ? $first-1 : 0;
$end = (isset($last)) ? $last-1 : '';
$images = array();
if ($galleryPage == false) {
	$images = $page->$fileField;
} else {
    $images = wire('pages')->get($galleryPage)->$fileField;
}
$thumbWidth = (isset($thumb_width)) ? $thumb_width : 500;
$thumbHeight = (isset($thumb_height)) ? $thumb_height : 500;
if(count($images)) {
$start = (isset($first)) ? $first : 1;
$end = (isset($last)) ? $last : count($images);
$galleryName = (isset($gallery_name)) ? $gallery_name : 'gallery-1';
$c =0;

$galleryClass = ($swipeBox) ? "gallery swipebox-gallery" : "gallery lightbox2-gallery";

echo "<ul class='{$galleryClass}'>";
foreach($images as $image) {
		$c++;
		if ($c < $start ) continue;
		
		$thumb = $image->size($thumbWidth,$thumbHeight);
		$description = "";
		$gall = "";
		
		if ($swipebox) {
			$description = ($image->description) ? " title='". $image->description."'" : "";
			$gall = " class='swipebox' rel='{$galleryName}' ";
			

		} else {
			$description = ($image->description) ? " data-title='". $image->description."'" : "";
			$gall = " data-lightbox='{$galleryName}'";
		}
		
		
		$alt = ($image->description) ? ($image->description) : '';
		
		echo "<li class='gallery-item gallery-item-{$c}'>";
		echo "<a href='{$image->url}'{$gall}{$description}>";
		echo "<img src='{$thumb->url}' alt='{$alt}' width='{$thumb->width}' height='{$thumb->height}' />";
		echo "</a>";
		echo "</li>";
		if ($c == $end) break;
	}
	echo "</ul>";
	
}