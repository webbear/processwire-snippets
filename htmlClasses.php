<?php
// set css classes
function htmlClasses() {
	$out='';
	$p = wire('page');
	$classes = array();
	//get the segments
	if ($p->id == 1) {
		if ($p->path != "/") {
			$segment1 = str_replace('/','', $p->path);
			$classes[] = "homepage-$segment1";
		} else {
			$classes[] = "homepage";
		}
	} else {
		$segments = array();
		$segments= explode( " ", trim(str_replace("/", " ", $p->path)));
		//$classes[] = print_r($segments);
		for ($i=0; $i <= count($segments); $i++) {
			$segment = $segments[$i];
			// $classes[] = $segment;
			$classes[] = (is_numeric(substr($segment,0,1))) ? 'n'.$segment : $segment;
		}
	}
	$classes[] = "page-$p->id";
	$classes[]= "t-" . $p->template->name;
	// now fetch the browser
	$browser = (isset($_SERVER['HTTP_USER_AGENT'])) ? strtolower($_SERVER['HTTP_USER_AGENT']) : 'unknown';

	if($browser != 'unknown')
	{
		if(strpos($browser, 'lynx') !== false)
		{
			$classes[] = 'lynx';
		}
		elseif(strpos($browser, 'chrome') !== false)
		{
			$classes[] = 'chrome';
		}
		elseif(strpos($browser, 'safari') !== false)
		{
			$classes[] = 'safari';

			if(strpos($browser, 'ipod') !== false)
			{
				$classes[] = 'ipod';
			}
			elseif(strpos($browser, 'iphone') !== false)
			{
				$classes[] = 'iphone';
			}
			elseif(strpos($browser, 'ipad') !== false)
			{
				$classes[] = 'ipad';
			}
		}
		elseif(strpos($browser, 'firefox') !== false)
		{
			$classes[] = 'firefox';
		}
		elseif(strpos($browser, 'gecko') !== false)
		{
			$classes[] = 'gecko';
		}
		elseif(strpos($browser, 'msie') !== false)
		{	if(strpos($browser, 'msie 11') !== false)
			{
				$classes[] = 'ie11';
			}
			elseif(strpos($browser, 'msie 10') !== false)
			{
				$classes[] = 'ie10';
			}
			elseif(strpos($browser, 'msie 10') !== false)
			{
				$classes[] = 'ie10';
			}
			elseif(strpos($browser, 'msie 9') !== false)
			{
				$classes[] = 'ie9';
			}
			elseif(strpos($browser, 'msie 8') !== false)
			{
				$classes[] = 'ie8';
			}
			elseif(strpos($browser, 'msie 7') !== false)
			{
				$classes[] = 'ie7';
			}
			elseif(strpos($browser, 'msie 6') !== false)
			{
				$classes[] = 'ie6';
			}
			elseif(strpos($browser, 'msie 5') !== false)
			{
				$classes[] = 'ie5';
			}
			else
			{
				$classes[] = 'ie';
			}
		}
		elseif(strpos($browser, 'opera') !== false)
		{
			$classes[] = 'opera';
		}
		elseif(strpos($browser, 'nav') !== false && strpos($browser, 'mozilla/4.') !== false)
		{
			// Haha, Navigator, that's funny.
			$classes[] = 'navigator';
		}
	}
	$out = implode(' ', $classes);
	return $out;
}
// end of htmlClasses
?>