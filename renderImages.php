<?php
/*
 render images
options:
		'resize' => true, //resize image
		'width' =>257, // image width
		'height' =>165, // image height -> 0 == no resizing/cropping
		'wrap' => true, // wrap the image
		'wrap_tag' => 'div', // wrap the image with
		'wrap_tag_class' => 'image', // wrap css class
		'limit' => 0 // 0 == all images, any integer
*/

function renderImages($images, $options= array()) {
	$defaults = array(
		'resize' => true,
		'width' =>257,
		'height' =>165,
		'wrap' => true,
		'wrap_tag' => 'div',
		'wrap_tag_class' => 'image',
		'limit' => 0
	);
	$options = array_merge($defaults, $options);

	$out='';
	if (count($images)) {
		$c = 0;
		foreach($images as $image) {
			$c++;
			$thumb = ($options['resize']) ? $image->size($options['width'],$options['height']) : $image;
			$img = "<img src='{$thumb->url}' alt='{$image->description}' width='{$thumb->width}' height='{$thumb->height}' />";
			if ($options['wrap']) {
				$out .= "<".$options['wrap_tag']." class='".$options['wrap_tag_class']." ".$options['wrap_tag_class']."{$c}'>{$img}</".$options['wrap_tag'].">";
			} else {
				$out .= $img;
			}
			if($c == $options['limit']) break;
		}
	}

	return $out;
}