<?php
// utility-nav
$pagelist = (isset($page_list)) ? $page_list : 'top|sitemap';
$printLink = (isset($print)) ? $print : false;
$gotop = (isset($top)) ? $top : "Top";
$list = array();
$list = explode("|", $pagelist);

echo "<ul class='utilities nav'>";
$c = 1;
foreach($list as $l) {
	$c++;
	if (is_numeric($l)) {
	    $el = $pages->get($l);
	} else {
	    $el = $pages->get('/'.$l.'/');
	}
	$first = ($c == 1) ? " first-child"  : "";	
	$last =  ($printLink == false && $c == count($list)) ? " last-child" : "";
	if ($l=='top') {
		$url = "#top";
		$title = $gotop;
		$name = "top";
	} else {
	    $url =$el->url;
		$title = $el->title;
		$name = $el->name;
	}
	if ($el->id  && $l != 'top') {
	    	echo "<li class='item-{$name}{$first}{$last}'><a href='{$url}'>{$title}</a></li>";
	}
}
if ($printLink) {
   	echo "<li class='item-print'><a href='#' onclick='window.print()'>".$printLink."</a></li>";
}
   echo '</ul>';