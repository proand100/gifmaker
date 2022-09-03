<?php
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
foreach($rangeDatArray as $x => $x_value){
    echo 'key= ' . $x . ', value= ' . $x_value . '<br>';
  }
  echo '<br>-----------';
*/

//$startVend = $madePicture->makeRangeShow($rangeDatArray);
$dir = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/';
$files = glob($dir . '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
//-----------
echo $madePicture->makeRangeShow($rangeDatArray);
/*
//$madePicture->makeRangeShow($rangeDatArray["mainImg"]);
if($startVend == "1"){
  echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/rangedS.png";
}
if($startVend == "0"){
  echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/rangedE.png";
}
*/


//echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged.png";
//echo $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png';
//echo 'rangeImg/ranged.png';
/*
//echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged.png";
$rangeDatArray = explode("&",$stringBe);
foreach($rangeDatArray as $x => $x_value){
      $b = explode("=", $x_value);
      $rangeDatArray[$b[0]] = $b[1];
         unset($rangeDatArray[$x]);
}

foreach($rangeDatArray as $x => $x_value){
    echo 'key= ' . $x . ', value= ' . $x_value . '<br>';
  }
  echo '<br>-----------';
*/
?>