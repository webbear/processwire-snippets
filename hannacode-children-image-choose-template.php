<?php

if(isset($parent)) {
  // If $parent is an ID or path, lets convert it to a Page
  $parent = $pages->get($parent);
} else {
  // otherwise lets assume the current page is the parent
  $parent = $page;
}
echo "<ul class='sub-page-nav'>";
$c = 0;
foreach($parent->children as $child) {
    echo "<li class='item-$c'><a href='$child->url'><h2>$child->title</h2>";
    if (count($child->images)) {
        $image = $child->images->first();
        $thumb = $image->size(220,220);
        echo "<div class='img'><img src='{$thumb->url}' width='{$thumb->width}' height='{$thumb->height}' alt='{$child->title}' /></div>";
    }
	$description = ($child->summary) ? "<div class='summary'>{$child->summary}</div>" : "";
    $c++;
   echo $description."</a></li>";
}
echo "</ul>";