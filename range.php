<?php
//echo "range.php echo";

require_once "gifMaker.php";

//$stringBe = $_REQUEST["mainImg"];
$stringBe = $_SERVER["QUERY_STRING"];
$madePicture = new imagickManager();
//echo '<script>document.write("check_1");</script>';
$rangeDatArray = explode("&",$stringBe);
foreach($rangeDatArray as $x => $x_value){
      $b = explode("=", $x_value);
      $rangeDatArray[$b[0]] = $b[1];
         unset($rangeDatArray[$x]);

}

/*
if($rangeDatArray["fileTime"] != "0"){ // delete
unlink($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $rangeDatArray["fileTime"] . '.png') ;
}
*/

$files = glob($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/' . '*'); // get all file names
if(count($files) > 10){
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
}

//-----------
$madePicture->makeRangeShow($rangeDatArray);
/**/





?>