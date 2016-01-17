<?php

if(isset($parent)) {
  // If $parent is an ID or path, lets convert it to a Page
  $parent = $pages->get($parent);
} else {
  // otherwise lets assume the current page is the parent
  $parent = $page;
}
$classes = (isset($class)) ? $class : "objects";
$itemClass = substr($classes, 0, -1);

$linkParent = ($link_to_parent === 1) ? true : false;

	echo "<ul class='$classes'>";
	$c = 1;
	foreach($parent->children.$temp as $child) {
		$link = ($linkParent) ? $parent->url : $child->url;
	    echo "<li class=$itemClass-$c'><a href='$link'>";
	    if (count($child->images)) {
	        $image = $child->images->first();
	        $thumb = $image->size(257,0);
	        echo "<div class='image'><img src='{$thumb->url}' width='{$thumb->width}' height='{$thumb->height}' alt='{$child->title}' /></div>";
	    }

	   echo "</a></li>";
	   $c++;
	}
	echo "</ul>";

