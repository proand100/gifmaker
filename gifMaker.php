<?php
class imagickManager{
function  __construct(){}
function makeRangeShow($pictRangeDatas){

/*
foreach($rangeDatArray as $x => $x_value){
    echo 'key= ' . $x . ', value= ' . $x_value . '<br>';
  }
  echo '<br>-----------';//  width=400px, height=220px
*/
$face = new Imagick();
$face->newImage(400, 220, new ImagickPixel('white'));
$face->setImageFormat('png');

$im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$pictRangeDatas["mainImg"]);
if($pictRangeDatas["startE"] == "1"){
    $x = $pictRangeDatas["startX"];
    $y = $pictRangeDatas["startY"];
}
if($pictRangeDatas["startE"] == "0"){
    $x = $pictRangeDatas["endX"];
    $y = $pictRangeDatas["endY"];    
}



$face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
//$face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, 20, 40); 
$face->flattenImages(); 

/*
if($pictRangeDatas["startE"] == "1"){
    $face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/rangedS' . time() . '.png');
}  
if($pictRangeDatas["startE"] == "0"){
    $face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/rangedE' . time() . '.png');
}
*/
//return $pictRangeDatas["startE"] ;
//$face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png');
//$time = time();
//--------
$dir = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/';
$files = glob($dir . '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
//-----------
$url = '/php_1/gifmaker/GIFproject/rangeImg/ranged' . time() . '.png';
$face->writeImage($_SERVER['DOCUMENT_ROOT'] . $url);
//$imgUrl = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/rangedE' . $time . '.png'";

return 'https://localhost' . $url;





/*
    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$pictName);







    $im->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png'); */

    //clearstatcache();

    // return $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png';
   //return "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged.png";
   
    }

}



?>

