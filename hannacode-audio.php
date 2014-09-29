<?php

if (isset($mp3) && isset($ogg)) {
    $pageFiles = explode('|',$page->files);
   if (in_array($ogg,$pageFiles) && in_array($mp3,$pageFiles)) {
       echo "<audio preload controls>".
    "<source src='/site/assets/files/$page->id/$mp3'>".
    "<source src='/site/assets/files/$page->id/$page->id $ogg'>".
    "</audio>";
    } else {
   echo "Eine oder beide Dateien existieren nicht.";
   }
   
} else {
    echo "Bitte ogg und mp3 angeben";
}