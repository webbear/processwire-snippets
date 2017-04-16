<?php

if(isset($parent)) {
  // If $parent is an ID or path, lets convert it to a Page
  $parent = $pages->get($parent);
} else {
  // otherwise lets assume the current page is the parent
  $parent = $page;
}
echo "<ul class='nav sub-nav'>";
$c = 0;
foreach($parent->children as $child) {
    echo "<li class='item-$c'><a href='$child->url'>$child->title";
	$description = ($child->summary) ? "<div class='summary'>{$child->summary}</div>" : "";
	echo $description."</li></a>";
    $c++;  
}
echo "</ul>";