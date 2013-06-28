<?php
// draw the box list
function boxListing($boxes) {
	$out = "";
	 if($boxes) {
		$out.= "<section class='boxes'>";
		$out .= "<ul>";
		foreach ($boxes as $box) {
			$c ++;
			$last = ($c == count($boxes)? ' last-child' : '');
			$first = ($c == 1 ? ' first-child' : '');
			$linkTitle = ($box->box_title)? ' title="'.$box->box_title.'"': '';
			$out .= "<li class='box box{$c}{$first}{$last}'{$linkTitle}>";
			$out .= "<a href='{$box->box_link}'>";
			$out .= "{$box->box_content}";
			$out .= "</a>";
			$out .= "</li>";
			
		}
		$out .= "</ul>";
		$out .= "</section>";
	}
	echo $out;
}
?>