<?php
class imgGifPlan{
    public $szakaszokSzama = 0;
    public $imgSRC;
    public $tartam; // array is lehet
public $delay;  // array is lehet
    public $startX; // array is lehet
    public $startY; // array is lehet
    public $endX; // array is lehet
    public $endY; // array is lehet
    public $startFrame; // array is lehet
    public $endFrame;  // array is lehet
    public $alakitasMod;  // array is lehet, 0= nem valtozi(hatter), 1=mozgat, 2=light, 3=opacity
    public $startOPacity;  // array is lehet
    public $endOpacity;  // array is lehet
    public $startLight;  // array is lehet
    public $endLight;  // array is lehet

    public $height;
    public $width;

    function __construct(){
echo "imgGifPlan class-ban.";
    }
    function setszakaszokSzama($Be){
      $this->szakaszokSzama= $Be;
    }
   
    function getSzakaszokSzama(){
      return $this->szakaszokSzama;
    }

    
 function setIdoTartam($Be){
$this->tartam = $Be;
}
function getIdoTartam(){
   return $this->tartam;
   }


 function setimgSRC($Be){
    $this->imgSRC = $Be; // ?
 }
 function getimgSRC(){
   return $this->imgSRC;
}
 
 function setdelay($Be){
    $this->delay = $Be;
 }
 function getdelay(){
   return $this->delay;
}
 function setstartX($Be){
    $this->startX = $Be;
 }
 function getstartX(){
   return $this->startX;
}

 function setstartY($Be){
    $this->startY = $Be;
 }
 function getstartY(){
   return $this->startY;
 }
 function setendX($Be){
    $this->endX = $Be;
 }
 function getendX(){
   return $this->endX;
}
 function setendY($Be){
    $this->endY = $Be;
 }
 function getendY(){
   return $this->endY;
}
 function setstartFrame($Be){
    $this->startFrame = $Be;
 }
 function getstartFrame(){
   return $this->startFrame;
}
 function setendFrame($Be){
    $this->endFrame = $Be;
 }
 function getendFrame(){
   return $this->endFrame;
}

 function setalakitasMod($Be){
    $this->alakitasMod = $Be;
 }
 function getalakitasMod(){
   return $this->alakitasMod;
}
 function setstartOPacity($Be){
    $this->startOPacity = $Be;
 }
 function getstartOPacity(){
   return $this->startOPacity;
} 
 function setendOpacity($Be){
    $this->endOpacity = $Be;
 }
 function getendOpacity(){
   return $this->endOpacity;
}
 function setstartLight($Be){
    $this->startLight = $Be;
 }
 function getstartLight(){
   return $this->startLight;
}
 function setendLight($Be){
    $this->endLight  = $Be;
 }
 function getendLight(){
return $this->endLight;
}

function setheight($Be){
   $this->height = $Be;
}
function getheight(){
  return $this->height;
}
function setwidth($Be){
   $this->width  = $Be;
}
function getwidth(){
return $this->width;
}


}

?>



