<?php

// renders an updated time stamp on assets files
function makeAssetLink($filename){
	if ($filename == '') return;
	$out = '';
	if (file_exists($_SERVER["DOCUMENT_ROOT"].$filename))
	{
		$fileTime = date('Y-m-d-H:i:s', filemtime($_SERVER["DOCUMENT_ROOT"].$filename));
		$out = $filename . '?updated=' . $fileTime;
	}
	else
	{
		$out = $filename ;
	}
	return $out;
}