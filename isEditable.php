<?php
// renders an 'edit' link
function isEditable(){
	$out = '';
	$page = wire('page');
	if ($page->editable()) {
		$out = "<div class='edit'><a href='$page->editURL'>Edit</a></div>";
	}
	return $out;
}
