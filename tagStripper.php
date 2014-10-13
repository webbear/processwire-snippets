<?php

function tagStripper($str) {
	if (!isset($str)) return;
	$temp = preg_replace('#<[^>]+>#', ' ', $str);
	$out = trim(preg_replace('/\s+/', ' ',$temp));
	return $out;
}