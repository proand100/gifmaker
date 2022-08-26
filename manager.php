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
  
    <div class="cl_fSaav" id="setSaav">
      


    <section id="gimForm"> 



<form action="gifProject.php" method="get">
  <fieldset id="fieldSet">
    <legend>Gif setup for image:</legend>
    <label for="imgMainSrc"> Main image:</label>
    <input style="width: auto"; id="mainImg" name="mainImg" type="text" value="Kattints a MAIN képen!"><br>


    <label for="height">Height (px) :</label>
    <input id="height" name="height" type="text" value="">
    <label for="width">Width (px) :</label>
    <input id="width" name="width" type="text" value="">


<label for="tartam">Tartam (mp):</label>
<input id="tartam" name="tartam" type="text" value="">
<label for="delay">Delay:</label>
<input id="delay" name="delay" type="text" value="">

<label for="szakasz">Szakasz:</label>
<input id="szakasz" name="szakasz" type="text" value="">

<label for="alakitasMod">Alakitas :</label>
<select name="alakitasMod" id="mod">
  <option value="0">Változatlan</option>
  <option value="1">Mozgatás</option>
  <option value="2">Fényerő</option>
  <option value="3">Átlátszóság</option>
</select>
<br>

<label for="startFr">Start frame :</label>
<input id="startFr" name="startFr" type="text" value=""><br>

<label for="endFr>">End frame :</label>
<input id="endFr" name="endFr" type="text" value=""><br>

<br>

<label for="startX">Start X :</label>
<input id="startX" name="startX" type="text" value="">
<label for="startY>">Start Y :</label>
<input id="startY" name="startY" type="text" value="">

<label for="startOp">Start opacity :</label>
<input id="startOp" name="startOp" type="text" value="">

<label for="startLight">Start Light :</label>
<input id="startLight" name="startLight" type="text" value=""><br>

<label for="endX">End X :</label>
<input id="endX" name="endX" type="text" value="">
<label for="endY>">End Y :</label>
<input id="endY" name="endY" type="text" value="">

<label for="endOp>">End opacity :</label>
<input id="endOp" name="endOp" type="text" value="">

<label for="endLight>">End Light :</label>
<input id="endLight" name="endLight" type="text" value="">
<!--
<button id="setSend0" onclick="readyGifSet()">OK</button>
-->
<input id="setSend0" type="submit" value="OK submit">
  </fieldset>
</form>
</section>
<!--
<a href="javascript.void(0)" class="closeSetImg" onclick="closeImgSet()">&times;</a>-->
<div class="closeSetImg" onclick="closeImgSet()">&#9776; Set close</div>

 </div>

 <div class="imgArea">
 <canvas id="MainCanvas" width="340px" height="220px" >
    Your browser not supported HTML Canvas tag.
  </canvas>
  <canvas id="SubCanvas" width="340px" height="220px" >
    Your browser not supported HTML Canvas tag.
  </canvas>
<div id="menu0" style="font-size:20px;margin-top: 10px;cursor:pointer" onclick="openImgSet()">&#9776; Set open</div>

 </div>



    <div class="cikkek"> 
        <div class="col1Cikkek">   
            <div class="cikk_5">Tulajdonképpen
            </div>
        </div>
    <div class="col3Cikkek">

    <?php include_once 'picsUpload.php'; 
    $images = new pictureLoad("images");
    //$images->drawImages();
  
  
    ?>
<script>
 var canvas=document.getElementById("MainCanvas");
var ctx=canvas.getContext("2d");
ctx.font="20px Arial";
ctx.globalAlpha= 0.1;
ctx.fillText("Click on the Main picture!", 10, 30);


function textChange(be1){
  mainImg.value=be1;
}
function textChange2(be2){
  subImg.value=be2;
}
function textImgSrc(be){
  mainImg.value=be;
ctx.globalAlpha= 1.0;
  var a = document.createElement("img");
  a.src="images/" + be;
ctx.drawImage(a, 5, 5);


}
/*function readyGifSet(){

}
*/
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
