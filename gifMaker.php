<?php
class imagickManager{
    protected $gifDelay;
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
/**/
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



function makeGif($pictureArray){
 /*   echo "makeGif($pictureArray)= " . $pictureArray;
 */
    $i = 0;
    
    while($i < count($pictureArray)){
       foreach($pictureArray[$i] as $x => $x_value){
       }

            if($i == 0){
                    $this->makeCopiedPNG("0", $pictureArray[$i], "0");
            }
            else{
                $this->makeCopiedPNG($pictureArray[$i - 1], $pictureArray[$i], "1");

            }
    
    $i++;
  }
   //----- make GIF from PNG array: --------------
$animation = new Imagick();
$animation->setFormat("GIF");

$myDirectory = opendir("GIFproject/Gif/");

while($entryName = readdir($myDirectory)) {
    $pngArray[] = $entryName;
}
$gifDir = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/';
closedir($myDirectory);

$i = "0";
while($i < (count($pngArray) - 2)){ // . ..
$frame = new Imagick($gifDir . $i . '.png');
$animation->addImage($frame);
$animation->setImageDelay($this->gifDelay);
$animation->nextImage();

$i++;
}
//---- make Gif: -------
$animation->writeImages($gifDir . 'animation.gif', true);
//----------------------  
}



function makeCopiedPNG($imgData1, $imgData2, $nullE){
$frameNum = $imgData2["projLength"] * $imgData2["mainDelay"];
$this->gifDelay = $imgData2["mainDelay"];

if($imgData2["mod"] == "1"){ // Unchanged
    $x = "0";
    $y = "0";
    $xDiff = "0";
    $yDiff = "0";
}    
else{
   
   $xDiff = ($imgData2["endX"] - $imgData2["startX"]) / $frameNum; // $float_value_of_var = floatval($var);
   $yDiff = ($imgData2["endY"] - $imgData2["startY"]) / $frameNum;
}

$i="0";
while($i < $frameNum){
    if($i == "0"){
        $x = $imgData2["startX"];
        $y = $imgData2["startY"];
    }
    else{
        $x += $xDiff;
        $y += $yDiff ;
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
        if($y > $imgData2["endY"]){ $y = $imgData2["endY"]; }
    }    
    

    //if($x > $imgData2["endX"]){ $x = $imgData2["endX"]; }
    //if($y > $imgData2["endY"]){ $y = $imgData2["endY"]; }



    if($nullE == "0"){
        $face = new Imagick();// white background under all images
        $face->newImage(400, 220, new ImagickPixel('white'));
       // $face->setImageFormat('png');
    }
    else{ // much than first picture will be copied.There are a PNG array already in Gif directory
       // echo 'if(!$imgData1 == 0){)';
        $face = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/' .$i .'.png');
       // $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, "0", "0"); 
       // $face->flattenImages();

    }
 
    
    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/' .$imgData2["mainImg"]);
  $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $x, $y); 
     /// $face->compositeImage($im, Imagick::COMPOSITE_DEFAULT, $y, $x); 
    $face->flattenImages(); 
    $face->setImageFormat('png');
        $face->setImageFilename($i . ".png");
        $hatteresName = $i . ".png";
 
    
    //$time = trim(time());
    //--------
    
    $face->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/' . $hatteresName);


 $i++;
}
//-------- copy $frameNum copied end -----------------


} //makeCopiedPNG($imgData1, $imgData2){





} // class imagickManager{


?>

