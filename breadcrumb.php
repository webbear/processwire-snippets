<?php

function renderBreadcrumb($page, $options = array()) {
	$defaults = array(
		'show_current' => true,
		'show_home' => true
	);
	$options = array_merge($defaults, $options);	
	$parents = $page->parents();
	$out = "<ul class='breadcrumbs'>";
	$c = 0;
	foreach($parents as $item) {
		++$c;
		if ($item->id == 1 && $options['show_home'] == false) continue;
		$out .= "<li class='crumbs crumb-{$c} crumb-{$item->name}'><a href='$item->url'>$item->title</a></li>";
	}
	if ($options['show_current']) $out .= "<li class='crumbs crumb-current last'>$page->title</li>";
	$out .= "</ul>";
	return $out;
}