<?php
require_once "gifMaker.php";
//$stringBe = $_REQUEST["mainImg"];
$stringBe = $_SERVER["QUERY_STRING"];
$madePicture = new imagickManager();
//echo '<script>document.write("check_1");</script>';
echo $madePicture->makePicture();

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