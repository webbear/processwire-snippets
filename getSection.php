<?php
function getSection($section, $className = 'body') {
	$out = "";
	if ($section) {
		$out .= "<section class='section {$className}'>";
		$out .= $section;
		$out .= "</section>";
	}
	echo $out;
}
?>