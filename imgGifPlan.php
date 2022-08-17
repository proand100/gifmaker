<?php
class gifPlan{
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
    
    function setszakaszokSzama(){
       $this->szakaszokSzama++;
     }
    
     function getSzakaszokSzama(){
       return $this->szakaszokSzama;
     }

 function setIdoTartam($Be){
      /// $GLOBALS['tartam'][$GLOBALS['szakaszokSzama']] = $Be;
 $this->tartam[$this->szakaszokSzama] = $Be;

 }
 function setimgSRC($Be){
    $this->imgSRC = $Be; // ?
 }
 
 function setdelay($Be){
    $this->delay[$this->szakaszokSzama] = $Be;
 }
 function setstartX($Be){
    $this->startX[$this->szakaszokSzama] = $Be;
 }

 function setstartY($Be){
    $this->startY[$this->szakaszokSzama] = $Be;
 }
 function setendX($Be){
    $this->endX[$this->szakaszokSzama] = $Be;
 }
 function setendY($Be){
    $this->endY[$this->szakaszokSzama] = $Be;
 }
 function setstartFrame($Be){
    $this->startFrame[$this->szakaszokSzama] = $Be;
 }
 function setendFrame($Be){
    $this->endFrame[$this->szakaszokSzama] = $Be;
 }


 function setalakitasMod($Be){
    $this->alakitasMod[$this->szakaszokSzama] = $Be;
 }
 function setstartOPacity($Be){
    $this->startOPacity[$this->szakaszokSzama] = $Be;
 }
 
 function setendOpacity($Be){
    $this->endOpacity[$this->szakaszokSzama] = $Be;
 }
 function setstartLight($Be){
    $this->startLight[$this->szakaszokSzama] = $Be;
 }

 function setendLight($Be){
    $this->endLight[$this->szakaszokSzama]  = $Be;
 }




}

?>



