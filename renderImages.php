<?php
function renderImages($images, $options= array()) {
	$defaults = array(
		'image_resize' => true,
		'image_width' =>257,
		'image_height' =>165,
		'image_wrap' => 'div',
		'image_wrap_class' => 'img',
		'limit' => 3
	);
	$options = array_merge($defaults, $options);

	$out='';
	if (count($images)) {
		foreach($images as $image) {
			$c++;
			$thumb = ($options['image_resize']) ? $image->size($options['image_width'],$options['image_height']) : $image;
			$out .= "<".$options['image_wrap']." class='".$options['image_wrap_class']." ".$options['image_wrap_class']."{$c}'><img src='{$thumb->url}' alt='{$image->description}' width='{$thumb->width}' height='{$thumb->height}' /></".$options['image_wrap'].">";
			if($c == $options['limit']) break;

		}
	}

	return $out;
}


?>