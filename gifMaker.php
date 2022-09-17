<?php
class imagickManager{
    protected $gifDelay;
    protected $framePerSec;
    protected $frameArray;// = array();

    //protected $gifFrames ;
    
function  __construct(){
    include_once 'phpToHtml.php';
   // $this->frames = 
}


function makeRangeShow($pictRangeDatas){
   // echo "makeRangeShow($pictRangeDatas)";
$face = new Imagick();
$face->newImage(400, 220, new ImagickPixel('white'));
$face->setImageFormat('png');

$im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$pictRangeDatas["mainImg"]);

 if(!$im->getImageAlphaChannel()){
    $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_OPAQUE);
    }
if($pictRangeDatas["startE"] == "1"){
    $x = $pictRangeDatas["startX"];
    $y = $pictRangeDatas["startY"];
    $opacitySt = $pictRangeDatas["startOp"];
    $lightSt = $pictRangeDatas["startLight"];

    $im->modulateImage($lightSt,$lightSt,100);
     
    $im->evaluateImage(Imagick::EVALUATE_DIVIDE, $opacitySt, Imagick::CHANNEL_ALPHA);
}
if($pictRangeDatas["startE"] == "0"){ /// 
    $x = $pictRangeDatas["endX"];
    $y = $pictRangeDatas["endY"]; 
    
    $opacityEnd = $pictRangeDatas["endOp"];

    $lightEnd = $pictRangeDatas["endLight"];

    $im->modulateImage($lightEnd,$lightEnd,100);
    $im->evaluateImage(Imagick::EVALUATE_DIVIDE, $opacityEnd, Imagick::CHANNEL_ALPHA);
}



$face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
//$face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, 20, 40); 
$face->flattenImages(); 
$face->setImageFormat("png");
$face->setImageFilename("ranged.png");
///////////include_once 'phpToHtml.php';
getPhpImg($face);

//echo $face;
  
    }
  

function getPictures($thePicture){

    
    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$thePicture);

return (base64_encode($im));


} 



function makeGif($pictureArray){
 /*   echo "makeGif($pictureArray)= " . $pictureArray;  $imgData2["projLength"] * $imgData2["mainDelay"]
 */
$frames = $pictureArray[0]["projLength"] * $pictureArray[0]["mainDelay"];
$frameArray =  array($frames);
    $i = 0;
    
    while($i < count($pictureArray)){
       foreach($pictureArray[$i] as $x => $x_value){
       }

            if($i == 0){
                  $this->makeCopiedPNG( $pictureArray[$i], "0");
            }
            else{
                 $this->makeCopiedPNG( $pictureArray[$i], "1");

            }
    
    $i++;
  }
   //----- make GIF from PNG array: --------------
$animation = new Imagick();
$animation->setFormat("GIF");

$gifDir = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/';

$i = "0";
while($i < (count($this->frameArray))){


$animation->addImage($this->frameArray[$i]);

$animation->setImageDelay($this->gifDelay);

$i++;
}


$animation->writeImages($gifDir . 'animation.gif', true);



$pictureArray = array();
$pngArray = array();
$this->frameArray = array();
//----------------------  
}



function makeCopiedPNG($imgData2, $nullE){
    $this->$framePerSec = $imgData2["mainDelay"]; 
    $this->gifDelay = (100 / $this->$framePerSec);
    /*
$frameNum = $imgData2["projLength"] * $imgData2["mainDelay"];
$this->gifDelay = $imgData2["mainDelay"];

$frameNum = $imgData2["projLength"] * $imgData2["mainDelay"];
*/
$frameNum = $imgData2["projLength"] * $this->$framePerSec;

if($imgData2["mod"] == "1"){ // Unchanged
    $x = "0";
    $y = "0";
    $xDiff = "0";
    $yDiff = "0";
    $stOpacity = 1;
    $endOpacity = 1;
    $lightSt = 100;
    $lightEnd = 100;
}    
else{
   
   $xDiff = ($imgData2["endX"] - $imgData2["startX"]) / $frameNum; // $float_value_of_var = floatval($var);
   $yDiff = ($imgData2["endY"] - $imgData2["startY"]) / $frameNum;
    $opDiff = ($imgData2["endOp"] - $imgData2["startOp"]) / $frameNum;
    $lightDiff = ($imgData2["endLight"] - $imgData2["startLight"]) / $frameNum;
}

$i="0";
while($i < $frameNum){
    if($i == "0"){
        $x = $imgData2["startX"];
        $y = $imgData2["startY"];
        $opacity = $imgData2["startOp"];
        $light = $imgData2["startLight"];
    }
    else{
        $x += $xDiff;
        $y += $yDiff ;
        $opacity += $opDiff;
        $light += $lightDiff;
    }

    if($xDiff < 0){
        if($x < $imgData2["endX"]){ $x = $imgData2["endX"]; }
    }
    if($xDiff > 0){
        if($x > $imgData2["endX"]){ $x = $imgData2["endX"]; }
    } 

    if($yDiff < 0){
        if($y < $imgData2["endY"]){ $y = $imgData2["endY"]; }
    }
    if($yDiff > 0){
        if($opacity > $imgData2["endY"]){ $y = $imgData2["endY"]; }
    }
    
    if($opDiff < 0){
        if($opacity < $imgData2["endOp"]){ $y = $imgData2["endOp"]; }
    }
    if($opDiff > 0){
        if($opacity > $imgData2["endOp"]){ $y = $imgData2["endOp"]; }
    }   
    
    if($lightDiff < 0){
        if($light < $imgData2["endLight"]){ $y = $imgData2["endLight"]; }
    }
    if($lightDiff > 0){
        if($light > $imgData2["endLight"]){ $y = $imgData2["endLight"]; }
    } 




    if($nullE == "0"){
   

        $this->frameArray[$i] = new Imagick();// white background under all images
        $this->frameArray[$i]->newImage(400, 220, new ImagickPixel('white'));

 
    }
    else{ // much than first picture will be copied.There are a PNG array already in Gif directory
       
    }
    
    // THE IMAGES ARE SAVED IN FILES YET:
    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$imgData2["mainImg"]);
    if(!$im->getImageAlphaChannel()){
    $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_OPAQUE);
    }
    $im->evaluateImage(Imagick::EVALUATE_DIVIDE, $opacity, Imagick::CHANNEL_ALPHA);

    $this->frameArray[$i]->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
    $this->frameArray[$i]->flattenImages(); 
   // $this->frameArray[$i]->setImageFormat('png');
    //$this->frameArray[$i]->setImageFilename($i . ".png");
    $this->frameArray[$i]->setImageFormat('GIF');
    $this->frameArray[$i]->setImageFilename($i . ".gif");

        $hatteresName = $i . ".png";
 
 $i++;
}
//-------- copy $frameNum copied end -----------------


} //makeCopiedPNG($imgData1, $imgData2){





} // class imagickManager{


?>

