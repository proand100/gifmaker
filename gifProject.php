<?php
//echo "imgGifProject-ban!";
require_once 'imgGifPlan.php';
require_once 'gifMaker.php';
//return ;
   $stringBe = $_SERVER["QUERY_STRING"];
$pictures = explode('|', $stringBe); // When set more than one picture. Tobb kep bevitelekor képekre bontja.

$i = 0;
while($i < count($pictures)  - 1){
   $OneImg = new imgGifPlan();
   $pictureArray[$i] = $OneImg->getPictureDatas($pictures[$i]);
   $i++;
 }
 $i = 0;

//----------------------
if($pictureArray[count($pictureArray) - 1]['save'] == "1"){  // SAVE last setted picture datas
  $fileUrl = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/' . $pictureArray[count($pictureArray) - 1]["kepSorszam"] . 'pict' . '.txt';
  $fileSave = fopen($fileUrl, 'w') or die('Unable to open' . $pictureArray[count($pictureArray) - 1]["kepSorszam"]. 'pict' . '.txt');
    fwrite($fileSave, $pictures[count($pictures)  - 2]);  // 
    fclose($fileSave);

  }
if($pictureArray[count($pictureArray) - 1]["save"] == "0"){  // SHOWGIF()

createGif($pictureArray);
}
//----------------------
function createGif($pArr){
  $files = glob($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/Gif/' . '*'); // get all file names
  if(count($files) > 10){
  foreach($files as $file){ // iterate files
    if(is_file($file)) {
      unlink($file); // delete file
    }
  }
  }
//----------

  
$makeGif = new imagickManager();
$makeGif->makeGif($pArr);


  

}


 
?>


