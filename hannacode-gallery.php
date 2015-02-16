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

	#Further instructions
	-set in init.php
	$headScript ='';
	$footScript='';
	if (strpos($body, "data-lightbox")) {
		$headScript = "<link rel='stylesheet' href='{$config->urls->templates}bower_components/lightbox2/css/lightbox.css' media='screen' />";
		$footScript = "<script src='{$config->urls->templates}bower_components/lightbox2/js/lightbox.min.js'></script>";
	}

	- echo in _main/_masterpage.php $headScript and $footScript in apropriate places

  ****************************
*/
$fileField = (isset($gallery_images)) ? $gallery_images : 'gallery_images';
$galleryPage = (isset($gallery_page)) ? $gallery_page : false;
$gallerName = (isset($gallery_name)) ? $gallery_name : 'lightbox-gallery';
$start = (isset($first)) ? $first-1 : 0;
$end = (isset($last)) ? $last-1 : '';
$images = array();
if ($galleryPage == false) {
	$images = $page->$fileField;
} else {
    $images = wire('pages')->get($galleryPage)->$fileField;
}
$thumbWidth = (isset($thumb_width)) ? $thumb_width : 240;
$thumbHeight = (isset($thumb_height)) ? $thumb_height : 240;
if(count($images)) {
$start = (isset($first)) ? $first : 1;
$end = (isset($last)) ? $last : count($images);
$galleryclass = (isset($gallery_class)) ? $gallery_class : "gallery";


echo "<ul class='{$galleryclass}'>";
$c = 0;
foreach($images as $image) {
		$c++;
		if ($c < $start ) continue;

		$thumb = $image->size($thumbWidth,$thumbHeight);
		$description = ($image->description) ? " data-title='". $image->description."'" : "";
		$title = ($image->description) ? " title='".$image->description."'" : '';
		$alt = ($image->description) ? ($image->description) : '';
		$lightbox = " data-lightbox='{$galleryclass}'";
		echo "<li class='gallery-item gallery-item-{$c}'>";
		echo "<a href='{$image->url}'{$lightbox}{$description}{$title}>";
		echo "<img src='{$thumb->url}' alt='{$alt}' width='{$thumb->width}' height='{$thumb->height}' />";
		echo "</a>";
		echo "</li>";
		if ($c == $end) break;
	}
	echo "</ul>";
}