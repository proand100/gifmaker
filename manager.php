<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <title>Gif Manager page</title>
    <link rel="stylesheet" href="manager.css"> <!-- -->
    <script src="manager.js"></script>
</head>
<body>

  <?php require_once 'isEmpty.php';$isempty = isEmpty();?>
<div class="cikkek"> <!-- 1 -->
    <div class="col1Cikkek"> <!-- 2 --> 
        <?php
        if($isempty == 1){
         echo ' <div id="loadGif" style=" position: fixed; width: 480px;" class="cikk_5">Create New Gif.';
        }// <!-- 3 --> 
        else{
         echo ' <div id="loadGif" style=" position: fixed; width: 480px; color: red;" class="cikk_5">Loaded Gif project.>';
        }// <!-- 3 --> 
        ?>
        
   

      <section id="gimForm"> 

        <form action="" method="get">
          <fieldset id="fieldSet">
            <legend>Gif setup for image:</legend>
              <label for="imgMainSrc"> Main image:</label>
              <input style="width: auto;" id="mainImg" name="mainImg" type="text" value="Kattints a MAIN képen! ">
              <?php
              if($isempty == 1){
                    //echo ' <span id="kepSorszam">1</span> .';
                  echo ' <input id="kepSorszam"  name="kepSorszam" type="text" value="0">';
                  echo '<span id="felirat"> .picture</span> .';
                }
                else{
                         //  echo ' <input id="kepSorszam" name="kepSorszam" type="text" value="">';
                      echo '<span id="felirat2"> Loaded project picture-szamozas kidolgozasa itt.</span> .';
                    }
                  /*  echo ' <span id="kepSorszam">0</span> .';*/
              ?>

<span id="imgBtnKeret">
<button type="button" id="imgBtn_1" Class="imgBtns" onclick="switchPict('1')">1</button>
<button type="button" id="imgBtn_2" Class="imgBtns" onclick="switchPict('2')">2</button>
<button type="button" id="imgBtn_3" Class="imgBtns" onclick="switchPict('3')">3</button>                  
<button type="button" id="imgBtn_4" Class="imgBtns" onclick="switchPict('4')">4</button>
<button type="button" id="imgBtn_5" Class="imgBtns" onclick="switchPict('5')">5</button>

</span> 
<button type="button" id="imgSwitch"  Style="position: absolute;display: inline;font-size: 10px; left: 420px;" onclick="picturesImprove()">Improve</button>


    
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

 
  
  
                <!--</form> -->
              <button type="button" id="saveBtn" class="setButtons" style="font-size: 10px;" onclick="pictureSave(1)" >Save Picture</button>
              <br>
              <br>


              <button  type="button" id="szakaszPlus" class="setButtons" onclick="szakaszShow()">szakasz +</button>

              <button  type="button" id="szakaszMinus" class="setButtons" style="width: 80px; left: 90px; " onclick="szakaszHide()">szakasz -</button>

              <button type="button" id="showGif" class="setButtons" style="" onclick="showGif2()" >Show</button>

              

              <button  type="button" id="setCancel" class="setButtons" style="width: 50px; left: 290px; " onclick="SetCancel()">CANCEL</button>

              <button  type="button" id="setDel" class="setButtons" style="width: 70px; left: 360px; " onclick="SetDelete()">DELETE</button>

              <br><br>

          </fieldset> 
        </form>
      

           <?php
              require_once "szakaszManager.php";
              
              $i=0;
                 while($i <1){
                  // echo '<div  id="szakasz_' . $i .'" class="ranges"' . 'style="opacity: 1.0;height: 110pxpx">';
                   $szM = new szakaszManager;
                  /// echo '</div>';
                    $i++;
                   }
              
            ?>
 
        <P id="kiire"></p>

      </section>            


      </div><!-- 3 -->
    </div><!-- 2 -->
<div class="col3Cikkek"><!-- 1 -->

    <div  style="position: fixed; width: 500px; height: 276px;" class="imgArea"> 
      <!-- 4 -->
      <span id="w_h" >
       
          <span style="margin-left: 10px; display: inline-flex; font-size: 13px;"> Canvas width=400px, height=220px; Gif long=  </span>
          <input id="projLength" name="projLength" type="text" value="">

          <span style="display: inline;"> sec Frame/sec:</span>
          <span >
            <input id="mainDelay" type="text" value="">
            <input id="mainFrameDb" type="text" disabled> db frames.
                  </span>
          <?php
            if($isempty == 1){
          // echo '<input id="lengthSend" type="submit" value="Length OK">';
           
            }
          ?>

        
      </span>
        
<!--
      <canvas id="MainCanvas" width="400px" height="220px" >
                Your browser not supported HTML Canvas tag.
      </canvas> 
  --> 
      
      <img  id="canvasIMG" style="width:400px; height:220px;margin-left: 40px;margin-top: 0px;"  
    src="https://localhost/php_1/gifmaker/GIFproject/canvasImg/canvasIMG0.png" alt="Image" >

    <button type="button" id="saveProject"  style="" onclick="saveProj()" >SAVE</button>

    <br>
 
     <!-- <img id="canvasIMG" src="" style="margin-top:78px;  margin-left: 52px; "></img> -->

 
    </div><!-- 4 -->

    <div  id="uploadedPictures" style="margin-top: 290px;" > <!--5 -->
      <?php 
      include_once 'picsUpload.php'; 
             $images = new pictureLoad();
              $images->picsLoad("GIFproject/images");
              //$images->drawImages();
            /*  */
      ?>
   
    </div> <!--5 -->

   



</body>
</html>
