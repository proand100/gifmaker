<?php
class imagickManager{
    protected $gifDelay;
    protected $frameArray;// = array();
    //protected $gifFrames ;
    
function  __construct(){
    include_once 'phpToHtml.php';
   // $this->frames = 
}


function makeRangeShow($pictRangeDatas){
$face = new Imagick();
$face->newImage(400, 220, new ImagickPixel('white'));
$face->setImageFormat('png');

$im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$pictRangeDatas["mainImg"]);


 # STEP 3: compose the original with the sliced clone
 //$im->compositeImage($im_clone, \Imagick::COMPOSITE_COPY, 0, 0);
 //$gradient->destroy();
 //$im_clone->destroy();
 //$im->setImageFormat('png');
//$im->setImageOpacity(0.444);
  //$im->setImageFilename("ranged_2.png");
 // $im->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged_2.png');
  //$im->destroy();

 // $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged_2.png');
 if(!$im->getImageAlphaChannel()){
    $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_OPAQUE);
    }
if($pictRangeDatas["startE"] == "1"){
    $x = $pictRangeDatas["startX"];
    $y = $pictRangeDatas["startY"];
    $opacitySt = $pictRangeDatas["startOp"];
     
    $im->evaluateImage(Imagick::EVALUATE_DIVIDE, $opacitySt, Imagick::CHANNEL_ALPHA);
}
if($pictRangeDatas["startE"] == "0"){ /// 
    $x = $pictRangeDatas["endX"];
    $y = $pictRangeDatas["endY"]; 
    
    $opacityEnd = $pictRangeDatas["endOp"];
    //$im->colorizeImage(new ImagickPixel('#0000b0',1.0));
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
//$face->setImageFilename("ranged.png");
/*
$time = trim(time());
//--------
$face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $time . '.png');
//$url = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged' . $time . '.png';
//echo "range.php echo";

echo $time;
*/
   
    }
/*
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
      return $hatteresName;
} 

*/

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
/*

$myDirectory = opendir("GIFproject/Gif/");

while($entryName = readdir($myDirectory)) {
    $pngArray[] = $entryName;
}
*/
$gifDir = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/';
//closedir($myDirectory);

//$animLength = 0;
$i = "0";
while($i < (count($this->frameArray))){
/*while($i < (count($pngArray) - 2)){ // . ..

$frame = new Imagick($gifDir . $i . '.png');
$animation->addImage($frame);  // $frameArray[$i]
*/

$animation->addImage($this->frameArray[$i]);

$animation->setImageDelay($this->gifDelay);
//$animation->resetIterator();
//$animation->nextImage();
//$animLength += sizeof($animation);
$i++;
}

//echo $animLength;
//---- make Gif: -------
/*
$animation->setImageFormat("gif");
$animation->setImageFilename("animated.gif");
echo("count($this->frameArray) = " . count($this->frameArray));
*/////////
$animation->writeImages($gifDir . 'animation.gif', true);

//getPhpImg($animation);
///echo 'count($this->frameArray): ' . count($this->frameArray); // $this->frameArray[$i]
//getPhpGif($this->frameArray["30"]);
//echo strlen($animation);
//           getPhpGif($animation);


$pictureArray = array();
$pngArray = array();
$this->frameArray = array();
//----------------------  
}



function makeCopiedPNG($imgData2, $nullE){
$frameNum = $imgData2["projLength"] * $imgData2["mainDelay"];
$this->gifDelay = $imgData2["mainDelay"];

if($imgData2["mod"] == "1"){ // Unchanged
    $x = "0";
    $y = "0";
    $xDiff = "0";
    $yDiff = "0";
    $stOpacity = 1;
    $endOpacity = 1;
}    
else{
   
   $xDiff = ($imgData2["endX"] - $imgData2["startX"]) / $frameNum; // $float_value_of_var = floatval($var);
   $yDiff = ($imgData2["endY"] - $imgData2["startY"]) / $frameNum;
    $opDiff = ($imgData2["endOp"] - $imgData2["startOp"]) / $frameNum;

}

$i="0";
while($i < $frameNum){
    if($i == "0"){
        $x = $imgData2["startX"];
        $y = $imgData2["startY"];
        $opacity = $imgData2["startOp"];
    }
    else{
        $x += $xDiff;
        $y += $yDiff ;
        $opacity += $opDiff;
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
    

    //if($x > $imgData2["endX"]){ $x = $imgData2["endX"]; }
    //if($y > $imgData2["endY"]){ $y = $imgData2["endY"]; }



    if($nullE == "0"){
        /*
        $face = new Imagick();// white background under all images
        $face->newImage(400, 220, new ImagickPixel('white'));
        */

        $this->frameArray[$i] = new Imagick();// white background under all images
        $this->frameArray[$i]->newImage(400, 220, new ImagickPixel('white'));

       // $face->setImageFormat('png');
    }
    else{ // much than first picture will be copied.There are a PNG array already in Gif directory
       // echo 'if(!$imgData1 == 0){)';
       ////////////     $face = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/' .$i .'.png');
       
       // $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, "0", "0"); 
       // $face->flattenImages();
//$face = $this->frameArray[$i];
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

/*
    $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
    $face->flattenImages(); 
    $face->setImageFormat('png');
        $face->setImageFilename($i . ".png");
        */






        $hatteresName = $i . ".png";
 
    
    //$time = trim(time());
    //--------
    
   // $face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/' . $hatteresName);
   /////////$this->frameArray[$i] =$face;

 $i++;
}
//-------- copy $frameNum copied end -----------------


} //makeCopiedPNG($imgData1, $imgData2){





} // class imagickManager{


?>

