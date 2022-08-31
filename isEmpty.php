
<?php
/*
 $dir = 'GIFproject';
  $q = (count(glob("$dir/*")) === 0) ? 'Empty' : 'Not empty'; 
  if ($q=="Empty") echo "the folder is empty"; else echo "the folder is NOT empty"; ?>
*/

function isEmpty(){
$myDirectory = opendir("GIFproject/");

while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}

closedir($myDirectory);

$indexCount	= count($dirArray);
if($indexCount < 6){ // ha ures: . .. images Gif rangeImg <- ez 3 db. and there is'nt any file!
     return "1";
}
else{
    return "0";
}
}




?>