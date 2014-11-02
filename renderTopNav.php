<?php
/**
 * Render items for placement in Foundation 'top-bar' recursive drop-down navigation
 *
 */
function renderTopNav(PageArray $items, array $options = array(), $level = 0) {

	$defaults = array(
		'tree' => 2, // number of levels it should recurse into the tree
		'dividers' => false,
		'current_class' => 'current',
		'has_dropdown_class' => 'has-dropdown',
		'first_child_class' => 'first-child',
		'last_child_class' => 'last-child',
		'dropdown_class' => 'dropdown',
		'repeat' => false, // whether to repeat items with children as first item in their children nav
		'excluded_pages' => 'site-map'
		);

	$options = array_merge($defaults, $options);
	$divider = $options['dividers'] ? "<li class='divider'></li>" : "";
	$page = wire('page');
	$out = '';
	$c = 0;
	foreach($items as $item) {
		$c++;
		$numChildren = $item->numChildren(true);
		if($level+1 > $options['tree'] || $item->id == 1) $numChildren = 0;
		if(in_array($item->name, explode("|",$options['excluded_pages']))) continue;
		$total = count($items) - count(explode("|",$options['excluded_pages']));
		$class = '';
		if($numChildren) $class .= $options['has_dropdown_class']." ";
		if($page->id == $item->id) $class .= $options['current_class']." ";
		if(($item->id > 1 && $page->parents->has($item)) || $page->id == $item->id) $class .= "active ";
		$class .= " nav-item-".$c;
		if($c == 1) $class .= " ".$options['first_child_class'];
		if($level == 0 && $c ==  $total) $class .= " ".$options['last_child_class'];
		if($level > 0 && $c ==  count($items)) $class .= " "..$options['last_child_class'];
		if($class) $class = " class='" . trim($class) . "'";

		$out .= "$divider<li$class><a href='$item->url'>$item->title</a>";

		if($numChildren) {
			$out .= "<ul class='{$options['dropdown_class']}'>";
			if($options['repeat']) $out .= "$divider<li><a href='$item->url'>$item->title</a></li>";
			$out .= renderTopNav($item->children, $options, $level+1);
			$out .= "</ul>";
		}

		$out .= "</li>";
	}

	return $out;
}