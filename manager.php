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
        <?php
     if($isempty == 1){
      echo ' <div id="loadGif" style=" position: fixed; width: 480px;" class="cikk_5">Create New Gif.';
     }
     else{
      echo ' <div id="loadGif" style=" position: fixed; width: 480px;" class="cikk_5">Loaded Gif project.>';
     }
   ?>
        
    

  <section id="gimForm"> 
<!--
<form action="gifProject.php" method="get">
-->
<form action="" method="get">
  <fieldset id="fieldSet">
    <legend>Gif setup for image:</legend>
    <label for="imgMainSrc"> Main image:</label>
    <input style="width: auto;" id="mainImg" name="mainImg" type="text" value="Kattints a MAIN képen! ">
<?php
     if($isempty == 1){
      echo ' <span id="kepSorszam">1</span> .';
     }
     else{
      echo ' <span id="kepSorszam">0</span> .';
     }
    /*  echo ' <span id="kepSorszam">0</span> .';*/
    ?>
    
<br>
    <label for="height">Height (px) :</label>
    <input id="height" name="height" type="text" value="">
    <label for="width">Width (px) :</label>
    <input id="width" name="width" type="text" value="">

    <label for="alakitasMod">Alakitas :</label>
  <select name="alakitasMod" id="mod">
    <option value="0">Change</option>
    <option value="1">Unchanged</option>
    <br>
</select>

 
  
  
</form>
<button type="button" id="saveBtn" class="setButtons" style="width: 40px; left: 420px; " 
onclick="pictureSave()" >SAVE</button>
<br>
<br>


<button  type="button" id="szakaszPlus" class="setButtons" onclick="szakaszShow()">szakasz +</button>

<button  type="button" id="szakaszMinus" class="setButtons" style="width: 80px; left: 90px; " 
onclick="szakaszHide()">szakasz -</button>

<!--
<form id="szakaszDel"  action=  > 
<input class="setButtons" style="width: 80px; left: 90px; " name=\"szakaszMinus\" type="submit" value="lastSzakaszDel"></form>
-->

<button  type="button" id="setCancel" class="setButtons" style="width: 50px; left: 290px; " 
onclick="SetCancel()">CANCEL</button>

<button  type="button" id="setDel" class="setButtons" style="width: 70px; left: 360px; " 
onclick="SetDelete()">DELETE</button>

<br><br>

  </fieldset> 
</form>
</section>

<?php
require_once "szakaszManager.php";
$i=0;
while($i <1){
//echo '<div  id="szakasz_' . $i .'" style="opacity: 0.0;height: 0px">';
echo '<div  id="szakasz_' . $i .'" style="opacity: 1.0;height: 110pxpx">';

$szM = new szakaszManager;
echo '</div>';
$i++;
}

?>
<P id="kiire"></p>
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
   
</div>

<script src="manager.js"></script>

</div>
</div>

  </div>


</body>
</html>
