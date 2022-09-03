<?php
class imgGifPlan{

public $pictureDatArray;
    
function __construct(){
//echo "imgGifPlan class-ban.";
//echo $this->kepSorszam . "," . $this->imgSRC;
    }
function getPictureDatas($pictureBe){
    
    $pictureDatArray = explode("&",$pictureBe);
   foreach($pictureDatArray as $x => $x_value){
         $b = explode("=", $x_value);
         $pictureDatArray[$b[0]] = $b[1];
            unset($pictureDatArray[$x]);
   }
   return $pictureDatArray;
 
}


}

?>



