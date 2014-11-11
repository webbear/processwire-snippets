<?php

// use in template (master/main)<?= renderLogoutLink($user)

function renderLogoutLink($user){
	$out='';
	$config = wire('config');
	if ($user->isLoggedin()) {
		$out .= "<div class='logout-link'><a href='{$config->urls->admin}login/logout/'>({$user->name}) - Abmelden</a></div>";
	}
	return $out;
}
