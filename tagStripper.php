<?php

function tagStripper($str)
if ($str = '') return:
	$out = preg_replace('#<[^>]+>#', ' ', $str);
	// All two space-runs to single space runs & No leading or trailing spaces.
	$out = trim(preg_replace('/\s+/', ' ',$out));
	return $out;
?>