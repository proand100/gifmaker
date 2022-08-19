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
  
    <div class="cl_fSaav">  
    <section id="gimForm">
<form action="gifProject.php">
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

<input id="setSend0" type="submit" value="Send">

  </fieldset>
</form>
</section>
<!--
      <form id="menu1" action="PHP_IM/gifManager.php" method="GET" class="tablinks">
        <input name="menu_1" type="submit" value="menu1">
      </form>
      <form id="menu2" action="PHP_IM/gifManager.php" method="GET" class="tablinks">
        <input name="menu_1" type="submit" value="menu2">
      </form>
      <form id="menu3" action="PHP_IM/gifManager.php" method="GET" class="tablinks">
        <input name="menu_1" type="submit" value="menu3">
      </form>  
-->
 <!--     
      <form  action="PHP_IM/gifManager.php" method="GET" class="tablinks">
     <span style="font-size: 17px; color: white;">   Main image:  </span>
        <input id="mainImg" name="mainImg" type="text" value="Kattints a MAIN képen!">
      </form>

      <form  action="PHP_IM/gifManager.php" method="GET" class="tablinks">
     <span style="font-size: 17px; color: white;">   Sub image:  </span>
        <input id="subImg" name="subImg" type="text" value="Kattints a SUB képen!">
      </form>

      <button onclick="textChange('Parameter')">click to change</button>
      <button onclick="textChange2('Parameter2')">click to 2. change</button>
-->


 </div>



    <div class="cikkek"> 
        <div class="col1Cikkek">   
           




   
            <div class="cikk_5">Tulajdonképpen
            </div>
        </div>
    <!--<div class="cikk_2">b</div> -->
    <div class="col3Cikkek">

    <?php include_once 'picsUpload.php'; 
    $images = new pictureLoad("images");
    //$images->drawImages();
  
  
    ?>
    <script>
       // var img=document.getElementById("gifForm");
function textChange(be1){
  mainImg.value=be1;
}
function textChange2(be2){
  subImg.value=be2;
}
function textImgSrc(be){
  mainImg.value=be;
}
        </script>
<!--
        <div class="cikk_3"> A programozás témájáról
        </div>
        <div class="cikk_4"> A programozás témájáról. 
        </div>
-->
</div>
</div>

  </div>
  <!--<script src="manager.js"></script> -->

</body>
</html>