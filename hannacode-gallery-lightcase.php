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
	lightcase gallery
  ****************************
*/
$fileField = (isset($gallery_images)) ? $gallery_images : 'gallery_images';

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

$galleryClass = (isset($gallery_class)) ? $gallery_class : "gallery lightcase-gallery";

echo "<ul class='{$galleryClass}'>";
foreach($images as $image) {
		$c++;
		if ($c < $start ) continue;
		
		$thumb = $image->size($thumbWidth,$thumbHeight);
	    $alt = ($image->description) ? $image->description : '';
		$title = ($image->description) ? " title='$image->description'" : '';
		
		echo "<li class='gallery-item gallery-item-{$c}'>";
		echo "<a href='{$image->url}' data-rel='lightcase:{$galleryName}'{$title}>";
		echo "<img src='{$thumb->url}' alt='{$alt}' width='{$thumb->width}' height='{$thumb->height}' />";
		echo "</a>";
		echo "</li>";
		if ($c == $end) break;
	}
	echo "</ul>";
	
}