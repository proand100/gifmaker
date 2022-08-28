<?php
/*
global $szakaszSum;
if(!isset($_GET["szakaszPlus"])){$szakaszSum = 0;}
if(isset($_GET["szakaszPlus"]))
{  
  if( $_GET["szakaszPlus"] < 5){
  $_GET["szakaszPlus"]++;
  $szakaszSum = $_GET["szakaszPlus"];
  echo $_GET["szakaszPlus"] . $szakaszSum;
  }
}
*/ 
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gif Manager page</title>
    <link rel="stylesheet" href="manager.css"> <!-- -->
</head>
<body>

<?php require_once 'isEmpty.php';
$isempty = isEmpty();
//echo " " . $isempty;
?>



    <div class="cikkek"> 
        <div class="col1Cikkek">   
            <div  style=" position: fixed; width: 480px;" class="cikk_5">Tulajdonképpen

  <section id="gimForm"> 
<!--
<form action="gifProject.php" method="get">
-->
<form action="" method="get">
  <fieldset id="fieldSet">
    <legend>Gif setup for image:</legend>
    <label for="imgMainSrc"> Main image:</label>
    <input style="width: auto;" id="mainImg" name="mainImg" type="text" value="Kattints a MAIN képen! "><br>


    <label for="height">Height (px) :</label>
    <input id="height" name="height" type="text" value="">
    <label for="width">Width (px) :</label>
    <input id="width" name="width" type="text" value="">

    <label for="alakitasMod">Alakitas :</label>
  <select name="alakitasMod" id="mod">
    <option value="0">Change</option>
    <option value="1">Background</option>
    <br>
</select>

 
  <input class="setButtons" style="width: 40px; left: 420px; " name=\"save\" type="submit" value="SAVE">
</form>
<br>
<br>


<button  type="button" id="szakaszPlus" class="setButtons" onclick="szakaszShow()">szakasz +</button>

<button  type="button" id="szakaszMinus" class="setButtons" style="width: 80px; left: 90px; " onclick="szakaszHide()">szakasz -</button>

<!--
<form id="szakaszDel"  action=  >
<input class="setButtons" style="width: 80px; left: 90px; " name=\"szakaszMinus\" type="submit" value="lastSzakaszDel"></form>
-->



<form id="szakaszDel"  action=  >
<input class="setButtons" style="width: 50px; left: 290px; " name=\"cancel\" type="submit" value="CANCEL"></form>


<form id="szakaszDel"  action= >
<input class="setButtons" style="width: 70px; left: 360px; " name=\"delete\" type="submit" value="DELETE"></form>
<br><br>

  </fieldset> 
</form>
</section>

<?php
require_once "szakaszManager.php";
$i=0;
while($i < 5){
echo '<div  id="szakasz_' . $i .'" style="opacity: 0.0;height: 0px">';
//echo '<div id="szakasz_" style="opacity: 0.2;">';
$szM = new szakaszManager;
echo '</div>';
$i++;
}

?>
<!--
<div id="szakasz_1">

</div>
<div id="szakasz_2">

</div>
<div id="szakasz_3">

</div>
<div id="szakasz_4">

</div>
<div id="szakasz_5">

</div>
-->




<?php

/*

require_once "szakaszManager.php";
if($szakaszSum == 1){$szM = new szakaszManager; }
if($szakaszSum == 2){$szM = new szakaszManager; }
if($szakaszSum == 3){$szM = new szakaszManager; }
if($szakaszSum == 4){$szM = new szakaszManager;}
if($szakaszSum == 5){$szM = new szakaszManager; }




//$szM = new szakaszManager;
if($szakaszSum == 1){$szM->newSzakasz(); }
if($szakaszSum == 2){$szM->newSzakasz(); }
if($szakaszSum == 3){$szM->newSzakasz(); }
if($szakaszSum == 4){$szM->newSzakasz(); }
if($szakaszSum == 5){$szM->newSzakasz(); }
*/
//$szM->newSzakasz();
//echo '<br>';
/*$szM->newSzakasz();
$szM->newSzakasz();*/
/*$szM->newSzakasz();
//echo '<br>';
$szM->newSzakasz();
$szM->newSzakasz();*/
?>


            </div>



            
        </div>
<div class="col3Cikkek">

<div  style="position: fixed; width: 500px;" class="imgArea"> 

 <span id="w_h" >
  <form id="prLength"  action="gifProject.php" method="get">
  <span style="margin-left: 10px; display: inline-flex; font-size: 13px;"> Canvas width=400px, height=220px; Animated Gif long=  </span>
   <input id="projLength" name="projLength" type="text" value="">

   <span style="display: inline;"> sec</span>
   <?php
     if($isempty == 1){
      echo '<input id="lengthSend" type="submit" value="Length OK">';
     }
   ?>
   
  </form>
 </span>

  <canvas id="MainCanvas" width="400px" height="220px" >
    Your browser not supported HTML Canvas tag.
  </canvas>

 
</div>

<div   style="margin-top: 290px;" >
    <?php include_once 'picsUpload.php'; 
    $images = new pictureLoad("GIFproject/images");
    //$images->drawImages();
  
  
    ?>
í/div>

<script>
  var szakaszSzam = -1;
  
 var canvas=document.getElementById("MainCanvas");
var ctx=canvas.getContext("2d");
ctx.font="20px Arial";
ctx.globalAlpha= 0.1;
ctx.fillText("Click on the Main picture!", 10, 30);
/**/


function szakaszShow(){
  if(szakaszSzam < 4){szakaszSzam++;}
//var x = document.getElementById("szakasz_" + szakaszSzam.toString());
//document.write("szakasz_" + szakaszSzam.toString());
//ctx.globalAlpha= 1.0;
//ctx.fillText("szakasz_" + szakaszSzam, 10, 30);
document.getElementById("szakasz_" + szakaszSzam).style.height="100px";
  document.getElementById("szakasz_" + szakaszSzam).style.opacity= "1.0"; // height: 0px
  
  

}

function szakaszHide(){
  //ctx.globalAlpha= 1.0;
//ctx.fillText("szakasz_" + szakaszSzam.toString(), 10, 30);
document.getElementById("szakasz_" + (szakaszSzam )).style.height="0px"; 
  document.getElementById("szakasz_" + (szakaszSzam )).style.opacity= "0.0";
  
  if(szakaszSzam >= 0){szakaszSzam--; }



}


function textChange(be1){
  mainImg.value=be1;
}
function textChange2(be2){
  subImg.value=be2;
}
function textImgSrc(be){
  mainImg.value=be;

  ctx.globalAlpha= 1.0;
var a = document.getElementById(be);
ctx.drawImage(a, 5, 5);

height.value = a.height;
width.value = a.width;
}
function openImgSet(){
 // dovument.write("openImgSet()-ben")

  document.getElementById("setSaav").style.height = "300px"; // "menu0"
  document.getElementById("menu0").style.opacity= "0.0";
}

function closeImgSet(){
  document.getElementById("setSaav").style.height = "0px"; // "menu0"
  document.getElementById("menu0").style.opacity= "1.0";


}
</script>

</div>
</div>

  </div>


</body>
</html>
