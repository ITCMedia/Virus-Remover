<?php
$vp = '/home/k/kenai/ВПИСАТЬ_СЮДА_ДИРЕКТОРИЮ/public_html/virus/'; // ВПИСАТЬ_СЮДА_ДИРЕКТОРИЮ
$files=glob($vp.'*.*'); 
foreach($files as $f){
    $file=substr($f, strlen($root));
    $newfile = str_replace('___', '/', $file);
    $newfile = str_replace($vp, '', $newfile);
    copy($file, $newfile);
    //echo $newfile.'<br>';
} 
?>