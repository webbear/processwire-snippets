<?php

if(isset($parent)) {
  // If $parent is an ID or path, lets convert it to a Page
  $parent = $pages->get($parent);
} else {
  // otherwise lets assume the current page is the parent
  $parent = $page; 
}
echo "<ul class='sub-nav'>";

foreach($parent->children as $child) {
	$description = ($child->summary) ? "<div class='summary'>{$child->summary}</div>" : "";
    $c++;
  echo "<li class='item-$c'><a href='$child->url'>$child->title</a>".$description."</li>";
}
echo "</ul>";