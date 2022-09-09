<?php
$myDirectory = opendir("GIFproject/");

while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}

closedir($myDirectory);

$indexCount	= count($dirArray);
if($indexCount < 9){ // ha ures: . .. images h_images Gif rangeImg temp canvasImg<- ez 8 db. and there is'nt any file!
    // return "1";
    //echo 'GIFproject/ isEmpty!';
}
else{ // if is not empty the directory
   // return "0";
   $fileSzam = ($indexCount - 8);

 //echo 'GIFproject/ -ben' . $fileSzam . ' db. adatfile talalhato';
 //echo 'document.write("projectLoad-ban!");';
 //--------------- read into files:
 
 $myDirectory = opendir("GIFproject/");
 while($entryName = readdir($myDirectory)) {
   // $dirArray[] = $entryName;
   //$extension = substr($entryName, -3);
    if(substr($entryName, -3) == 'txt'){
        $fileArray[] = $entryName ;
    }
}
closedir($myDirectory);
//$filenames = "";
$filesContent = "";
$filesContent2 = "";
$dirUrl = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/';
$i = 0;
while($i < count($fileArray)){
   // $filenames = $filenames . ", " . $fileArray[$i] ;
   $fileUrl = $dirUrl . $fileArray[$i];
   $theFile = fopen( $fileUrl, "r") or die("unable to open " . $fileUrl . " file!");
   //$filesContent2 = $filesContent2 . fread($theFile, filesize($fileUrl)) . '|';
  
 // $filesContent = $filesContent . fread($theFile, filesize($fileUrl)) . '|';
  $filesContent = fread($theFile, filesize($fileUrl));
  $filesContent2 = $filesContent2 . $filesContent. '|';

   fclose($theFile);

//------------------
require_once 'imgGifPlan.php';
$OneImg = new imgGifPlan();
$pictureArray[$i] = $OneImg->getPictureDatas($filesContent);
//$ertek = $pictureArray[$i]["mainImg"];
//return   $pictureArray;

//------------------


    $i++;
}


echo $filesContent2;
 //--------------


}








?>