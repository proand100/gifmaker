<?php
//echo "imgGifProject-ban!";
require_once 'imgGifPlan.php';

//return ;
   $stringBe = $_SERVER["QUERY_STRING"];
   
   //echo $stringBe;
   //echo "https://localhost/php_1/gifmaker/GIFproject/Gif/e_e.gif"; 

$pictures = explode('|', $stringBe); // When set more than one picture. Tobb kep bevitelekor képekre bontja.



$i = 0;
while($i < count($pictures)  - 1){

   $OneImg = new imgGifPlan();
   $pictureArray[$i] = $OneImg->getPictureDatas($pictures[$i]);

   $i++;
 }
 $i = 0;

  while($i < count($pictureArray)){
   echo '<br>';
   foreach($pictureArray[$i] as $x => $x_value){
     echo 'key= ' . $x . ', value= ' . $x_value . '<br>';
   }
   echo '<br>-----------';

$i++;
  }

//----------------------
if($pictureArray[count($pictureArray) - 1]['save'] == "1"){  // SAVE last setted picture datas
  $fileUrl = $_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/' . $pictureArray[count($pictureArray) - 1]["kepSorszam"] . 'pict' . '.txt';
  $fileSave = fopen($fileUrl, 'w') or die('Unable to open' . $pictureArray[count($pictureArray) - 1]["kepSorszam"]. 'pict' . '.txt');
    fwrite($fileSave, $pictures[count($pictures)  - 2]);  // 
    fclose($fileSave);

  }
if($pictureArray[count($pictureArray) - 1]["save"] == "0"){  // SHOWGIF()
  $frameNum = $pictureArray["0"]["projLength"] * $pictureArray["0"]["mainDelay"];
  $returner = 'projLength:' . $pictureArray["0"]["projLength"] . ', mainDelay:' . $pictureArray["0"]["mainDelay"] . 'frameNum:' . $frameNum . ')';
echo $returner;


}
//----------------------
function createGif(){


  

}


 
?>


