<?php
$myDirectory = opendir("GIFproject/");

while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}

closedir($myDirectory);

$indexCount	= count($dirArray);
if($indexCount < 9){ // ha ures: . .. images h_images Gif rangeImg temp canvasImg<- ez 8 db. and there is'nt any file!
     return "1";
}
else{
    return "0";
}








?>