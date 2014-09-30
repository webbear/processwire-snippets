<?php
/*
	Render a <ul> navigation list 
*/
function renderNav(PageArray $items, array $options = array()) {

	if(!count($items)) return '';

	$defaults = array(
		'fields' => array(), // array of other fields you want to display (title is assumed)
		'class' => '', // class for the <ul>
		'active' => 'active', // class for active item
		'dividers' => false, // add an <li class='divider'> between each item?
		'tree' => false, // render tree to reach current $page?
		);

	$options = array_merge($defaults, $options); 
	$page = wire('page');
	$out = "<ul class='$options[class]'>";
	$divider = $options['dividers'] ? "<li class='divider'></li>" : "";

	foreach($items as $item) {

		// if this item is the current page, give it an 'active' class
		$class = $item->id == $page->id ? " class='$options[active]'" : "";
		if(($item->id > 1 && $page->parents->has($item)) || $page->id == $item->id) $class = " class='active' ";
		// render linked item title
		$out .= "$divider<li$class><a href='$item->url'>$item->title</a> "; 

		// render optional extra fields wrapped in named spans
		if(count($options['fields'])) foreach($options['fields'] as $name) {
			$out .= "<span class='$name'>" . $item->get($name) . "</span> ";
		}

		// optionally render a tree recursively to current $page 
		if($options['tree']) {
			if($page->parents->has($item) || $item->id == $page->id) {
				$out .= renderNav($item->children("limit=50"), array(
					'fields' => $options['fields'],
					'tree' => true,
					)); 
			}
		}

		$out .= "</li>";
	}

	$out .= "</ul>";
	return $out; 	
}