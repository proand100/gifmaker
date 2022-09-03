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
//if(is_file($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $rangeDatArray["fileTime"] . '.png'))

if($rangeDatArray["fileTime"] != "0"){ // delete
unlink($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $rangeDatArray["fileTime"] . '.png') ;
}

//-----------
$madePicture->makeRangeShow($rangeDatArray);
//echo $madePicture->makeRangeShow($rangeDatArray);




//echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged.png";
//echo $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png';




?>