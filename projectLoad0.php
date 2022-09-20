<?php
$myDirectory = opendir("GIFproject/");

while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}

closedir($myDirectory);

$indexCount	= count($dirArray);
if($indexCount < 5){ // ha ures: . .. images  Gif <- ez 8 db. and there is'nt any file!
}
else{ // if is not empty the directory
   // return "0";
   $fileSzam = ($indexCount - 4);

 //--------------- read into files:
 
 $myDirectory = opendir("GIFproject/");
 while($entryName = readdir($myDirectory)) {
    if(substr($entryName, -3) == 'txt'){
        $fileArray[] = $entryName ;
    }
}
closedir($myDirectory);
$filesContent = "";
$filesContent2 = "";
$dirUrl = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/';
$i = 0;
while($i < count($fileArray)){

   $fileUrl = $dirUrl . $fileArray[$i];
   $theFile = fopen( $fileUrl, "r") or die("unable to open " . $fileUrl . " file!");
  $filesContent = fread($theFile, filesize($fileUrl));
  $filesContent2 = $filesContent2 . $filesContent. '|';

   fclose($theFile);

//------------------
require_once 'imgGifPlan.php';
$OneImg = new imgGifPlan();
$pictureArray[$i] = $OneImg->getPictureDatas($filesContent);


//------------------


    $i++;
}

//return  $filesContent2;
//echo $filesContent2;
 //--------------


}








?>