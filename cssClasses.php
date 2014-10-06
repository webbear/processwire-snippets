<?php
function cssClasses() {
	$out='';
	$page = wire('page');
	$classes = array();
	//get the segments
	if ($page->id == 1) {
		if ($page->path != "/") {
			$segment1 = str_replace('/','', $page->path);
			$classes[] = "homepage-$segment1";
		} else {
			$classes[] = "homepage";
		}
	} else {
		$segments = array();
		$segments= explode( " ", trim(str_replace("/", " ", $page->path)));
		for ($i=0; $i <= count($segments); $i++) {
			$segment = $segments[$i];
			$classes[] = (is_numeric(substr($segment,0,1))) ? 'n'.$segment : $segment;
		}
	}
	$classes[] = "page-$page->id";
	$classes[] = "section-$page->rootParent->name";
	$classes[]= "template-" . $page->template->name;

	$out = implode(' ', $classes);
	return $out;
}

?>