<?php

// call it like renderUtilityNav($options = array('pages' => 'top|site-map|privacy-policy','print' => false));
// checks whether the page name exists in PageArray
function renderUtilityNav(array $options = array()) {
	$defaults = array(
		'print' => true,
		'pages', 'site-map',
		'top_id' => '#top'
	);
	$options = array_merge($defaults, $options);
	$list = array();
	$list = explode("|",$options['pages']);
	$out ='';
	$c = 0;
	foreach($list as $l) {
		$c++;
		$el = wire('pages')->get('/'.$l.'/');
		$first = ($c == 1) ' first-child' : '';
		$last = ($options['print'] == false && $c == count($list) ) ? ' last-child' : '';
		if ($l=='top') {
			$url = $options['top_id'];
			$title = __('Top');
			$name = "top";
		} else {
			$url =$el->url;
			$title = $el->title;
			$name = $el->name;
		}
		$out .= "<li class='item-{$name}{$first}{$last}'><a href='{$url}'>{$title}</a></li>";
	}
	if ($options['print']) {
		$out .= "<li class='item-print'><a href='#' onclick='window.print()'>".__('Print')."</a></li>";
	}
	return $out;

}