<?php
function treeMenu(Page $page = null, Page $rootPage = null, $id = null) {
	if(is_null($page)) $page = wire('page');
	if(is_null($rootPage)) $rootPage = wire('pages')->get('/');
	if(!is_null($id)) $id = " id='$id'";

	$out = "\n<ul$id>";
	$parents = $page->parents;

	// This is where we get pages we want. You could just say template!=news-item 
	foreach($rootPage->children('template!=post, template!=faq-item, template!=gallery') as $child) {
		$c++;
		$class = "level-" . count($child->parents);
		$class .= $child->numChildren == 0 ? " single" :" parent";
		$class .= " menu-item-".$c;
		$class .= $c==count($child)+1 ? " last-child": "";
		$class .= $c==1 ? " first-child" : "";
		$s = '';
		
		if($child->numChildren  && $parents->has($child)) {
		        $class .= " current has_current";
		        $s = str_replace("\n", "\n\t\t", treeMenu($page, $child));
		
		} else if($child === $page) {
		        $class .= " current current_page";
		        if($page->numChildren) $s = str_replace("\n", "\n\t\t", treeMenu($page, $page));
		} else if ($child->numChildren){
			$s = str_replace("\n", "\n\t\t", treeMenu($page, $child));
		}
		$class .= " page-{$child->id}";
		$class = " class='$class'";
		$out .= "\n\t<li$class>\n\t\t<a$class href='{$child->url}'>{$child->title}</a>$s\n\t</li>";
	}

	$out .= "\n</ul>";
	return $out;
}
?>