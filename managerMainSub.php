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
 </div>



    <div class="cikkek"> 
        <div class="col1Cikkek">   
            <div class="cikk_1">Tulajdonképpen 
            </div>
            <div class="cikk_5">Tulajdonképpen
            </div>
        </div>
    <div class="cikk_2">b</div> <!---->
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