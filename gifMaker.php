<?php
class imagickManager{
function  __construct(){}
function makeRangeShow($pictRangeDatas){


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
//$face->setImageFormat("png");
$face->setImageFilename("ranged.png");

$time = trim(time());
//--------
$face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $time . '.png');
//$url = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $time . '.png';
//echo "range.php echo";

echo $time;

   
    }

function getPictures($thePicture){


    $face = new Imagick();
    $face->newImage(400, 220, new ImagickPixel('white'));
    $face->setImageFormat('png');
    
    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$thePicture);
    $x = "0";
    $y = "0";
      
    $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
    //$face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, 20, 40); 
    $face->flattenImages(); 
    //$face->setImageFormat("png");
    if(!str_contains($thePicture, "hat_")) {
        $face->setImageFilename("hat_" . $thePicture);
        $hatteresName = "hat_" . $thePicture;
    }
    else{
        $hatteresName = $thePicture;
    }
    
    //$time = trim(time());
    //--------
    
    $face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/h_images/' . $hatteresName);
    //$url = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $time . '.png';
    //echo "range.php echo";
    
    return $hatteresName;


}    

}



?>

