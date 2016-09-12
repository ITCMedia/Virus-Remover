<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
<title>Поиск слов по файлам</title>
</head>
<body>
 
 
<?php
$dir = '/home/k/kenai';
$sss = Array(
'$mode==',
'<?php eval(gzinflate(base64_decode(',
'FilesMan',
'<?php                                                                                                    ',
'$d4="',
'{eval (',
';}?> <?php',
';}?><?php',
'echo@serialize'
);

function imTimer($name= 'default', $mode= ''){
    static $timers= array();
    $now=microtime(true);
    if(!isset($timers[$name])){
    $timers[$name]= $now;
    return 0;}
    $ret= $now - $timers[$name];
    if($mode == 'reset')
    $timers[$name]= $now;
    return round($ret, 5);
}
imTimer();

error_reporting (E_ALL);
if(count($sss) > 0){
    $files_in_dir=array();

    function filesdir($dir='.'){
        global $files_in_dir;
        $scandir=scandir($dir);
        foreach ($scandir as $num_file => $name_file){
            if($name_file=='.' or $name_file=='..') continue;
            if($dir=='.') $add_name=""; else $add_name="$dir/";
            if(is_file($add_name.$name_file)){
                $ext=explode('.',$add_name.$name_file); $ext=$ext[count($ext)-1];
                $scriptFileName=explode('/', $_SERVER['PHP_SELF']); $scriptFileName=$scriptFileName[count($scriptFileName)-1]; 
                
                if($ext=='gif' or $ext=='zip' or $ext=='rar' or $ext=='jpg' or $ext=='jpeg' or $ext=='png' or $name_file==$scriptFileName) continue; //Не текстовые файлы, не искать в них. 
                
                $files_in_dir[]=$add_name.$name_file;
                }
            elseif(is_dir($add_name.$name_file)) filesdir($add_name.$name_file);
            }
        }
    filesdir($dir);
 
    
    foreach ($files_in_dir as $num_file => $name_file)
        {
        $file=file($name_file);
        $found=false;
        foreach ($file as $line_num => $line_text)
            {
                for($s=0; $s<count($sss); $s++){
                    if (strpos($line_text, $sss[$s]) !== false) {$found=true; $num_line[]=$line_num+1; $text_num_line[]=htmlspecialchars(trim($line_text), ENT_QUOTES);}
                }
            }
        if($found==true){
            if(!strpos($name_file, '.tar')){
                echo '<b>'.$name_file.'</b><br>';
                $newname = str_replace('/', '___', $name_file);
                copy($name_file, '/home/k/kenai/ВПИСАТЬ_СЮДА_ДИРЕКТОРИЮ/public_html/virus/'.$newname); // ВПИСАТЬ_СЮДА_ДИРЕКТОРИЮ
                unlink($name_file);
            }
            
            $count=count($num_line);
            $num_line='';
        }
    }
        
    
}
?>
</body>
</html>