<?php 
function renderSublevel($page, $options = array()) {
	$out = '';
	if ($page->rootParent->hasChildren > 1 && $page != $homepage) {
		$out =  "<ul>";
		foreach($page->rootParent->children as $child) {
			$class = ($page->id == $child->id) ? " class='active'" : "";
			$out .= "<li{$class}><a href='{$child->url}'>{$child->title}</a></li>";
		}
		$out .=  "</ul>";
	}
	return $out;
}
