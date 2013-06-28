<?php
function getUriSegments($page) {
	if ($page==null) $page=wire('page');
	$segments = array();
	$segments = explode(" ", trim(str_replace("/", " ", $page->path)));
	foreach($segments as $seg) {
		$c=1;
		$segment$c++ = $seg;
	}
}
?>