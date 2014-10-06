<?php
	function wordLimiter($str = '', $limit = 120, $endstr = '...'){

		if($str == '') return '';

		if(strlen($str) <= $limit) return $str;

		$out = substr($str, 0, $limit);
		$pos = strrpos($out, " ");
		if ($pos>0) {
			$out = substr($out, 0, $pos);
		}
		$out .= $endstr;
		return $out;

	}

?>