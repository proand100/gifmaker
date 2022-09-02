<?php
require_once 'imgGifPlan.php';
   $stringBe = $_SERVER["QUERY_STRING"];
   
  // echo $stringBe;
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
 
?>


