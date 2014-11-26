<?php

function renderFirstImage($images, $options = array()) {
	$defaults = array(
		'resize' => true,
		'width' => 257,
		'image_height' =>0,
		'wrap' => true,
		'wrap_tag' => 'div',
		'wrap_class' => 'image'
	);
	$options = array_merge($defaults, $options);
	$out = '';
	if(count($images)) {
		$image = $images->first();
		$thumb = ($options['resize']) ? $image->size($options['width'],$options['height']) : $image;
		$description = ($image->description) ? $image->description : '';
		$img = "<img src='{$thumb->url}' alt='{$description}' width='{$thumb->width}' height='{$thumb->height}' />";
		if($options['wrap']) {
			$out .= "<{$options['wrap_tag']} class='{$options['wrap_class']}'>{$img}</{$options['wrap_tag']}>";
		}
		else
		{
			$out .= $img;
		}
	}
	return $out;

}