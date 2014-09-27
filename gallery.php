<?php
/* 	renderGallery function
	- use with a gallery template (set $headScript with link to lightbox.css and $footScript script to lightbox.js or include both files in main.css and main.js)
	- use options

*/
function renderGallery( $images, $options = array() ) {
	$defaults = array('lightbox'=>true, 'start' => 1, 'end' => false,'thumb_width' => 200, 'thumb_height' => 200, 'image_max_width' => 0, 'gallery_name' => 'name','container_class' =>'gallery', 'item_class' => 'gallery-item');
	$options = array_merge($defaults, $options);
	$page = wire('page');
	$out = '';
	if (count($images)) {
		$out .= "<ul class='{$options['container_class']}'>";
		foreach($images as $image) {
			$c++;
			$thumb = $image->size($options['thumb_width'], $options['thumb_height']);
			$description = ($image->description) ? " data-title='". $image->description."'" : "'";
			$largeImage = ($options['image_max_width'] > 0) ? $image->size($options['image_max_width']) : $image;
			$alt = ($image->description) ? ($image->description) : '';
			$lightbox = ($options['lightbox']) ? " data-lightbox='{$page->$options['gallery_name']}'" : "";
			$out .= "<li class='{$options['item_class']} {$options['item_class']}-{$c}'>";
			$out .= "<a href='{$largeImage->url}'{$lightbox}{$description}>";
			$out .= "<img src='{$thumb->url}' alt='{$alt}' width='{$thumb->width}' height='{$thumb->height}' />";
			$out .= "</a>";
			$out .= "</li>";
		}
		$out .= "</ul>";
	}
	return $out;
}