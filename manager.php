<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <title>Gif Manager page</title>
    <link rel="stylesheet" href="manager.css"> <!-- -->
    <script type="text/javascript" src="manager.js"></script>
</head>
<?php require_once 'isEmpty.php';
$isempty = isEmpty();
if($isempty == 0){echo '<body onload="projectLoad()">';}
else{echo '<body>';}
?>



  <?php //require_once 'isEmpty.php';$isempty = isEmpty();?>
<div class="cikkek"> <!-- 1 -->
    <div class="col1Cikkek"> <!-- 2 --> 
        <?php
        if($isempty == 1){
         echo ' <div id="loadGif" style=" position: fixed; width: 480px;" class="cikk_5">Create New Gif.';
        }// <!-- 3 --> 
        else{
echo '<div  style="top: 100px;">' ;
          require_once "projectLoad.php";  
        echo  '</div>';
          
          echo ' <div id="loadGif" style=" position: fixed; width: 480px;" class="cikk_5">Loaded Gif.';
          $lastPicIndex = count($pictureArray) - 1;
//----/-----------------
/*
$i = 0;
while($i < $lastPicIndex + 1){
echo '-----------';
//$j = 0;
// while($j < 3){//count($pictureArray[$i])){
echo $pictureArray[$i]["mainImg"] . ', ';
echo $pictureArray[$i]["kepSorszam"] . ', ';
echo $pictureArray[$i]["height"] . ', ';
echo $pictureArray[$i]["width"] . ', ';
echo $pictureArray[$i]["mod"] . ', ';
echo $pictureArray[$i]["tartam"] . ', ';
echo $pictureArray[$i]["delay"] . ', ';
echo $pictureArray[$i]["startFr"] . ', ';
echo $pictureArray[$i]["endFr"] . ', ';
echo $pictureArray[$i]["startX"] . ', ';
echo $pictureArray[$i]["startY"] . ', ';
echo $pictureArray[$i]["startOp"] . ', ';
echo $pictureArray[$i]["startLight"] . ', ';
echo $pictureArray[$i]["endX"] . ', ';
echo $pictureArray[$i]["endY"] . ', ';
echo $pictureArray[$i]["endOp"] . ', ';
echo $pictureArray[$i]["endLight"] . ', ';
echo $pictureArray[$i]["projLength"] . ', ';
echo $pictureArray[$i]["mainDelay"] . ', ';
echo $pictureArray[$i]["save"] . ', ';


$i++;
}
*/
//--------------------
         // echo '$pictureArray[0]["mainImg"]=' . $pictureArray["1"]["mainImg"];
        /// echo ' <div id="loadGif" style=" position: fixed; width: 480px; color: brown;" class="cikk_5">Loaded Gif project.>';
//-----------------------------------
/*
echo '<div style=" position: fixed; width: 480px; color: brown;" class="cikk_5">

<script type="text/javascript">
projectLoad();
</script>
';
*/

//-----------------------------------
        }// <!-- 3 --> 
        ?>
        
   

      <section id="gimForm" > 

        <form action="" method="get">
          <fieldset id="fieldSet">
            <legend>Gif setup for image:</legend>
              <label for="imgMainSrc"> Image:</label>
              
              
              <?php
                if($isempty == 1){
                   echo '<input style="width: auto;" id="mainImg" name="mainImg" type="text" value="Click on same picture! ">';
                  echo ' <input id="kepSorszam"  name="kepSorszam" type="text" value="0">';
                  
                }
                else{
                  echo '<input style="width: auto;" id="mainImg" name="mainImg" type="text" value="' . $pictureArray[$lastPicIndex]["mainImg"] . '">';
                  echo ' <input style="width: 30px;"id="kepSorszam"  name="kepSorszam" type="text" value="' . $pictureArray[$lastPicIndex]["kepSorszam"] . '">';
                     }
              ?>
            <span id="felirat"> .picture</span> 
<span id="imgBtnKeret">
<button type="button" id="imgBtn_1" Class="imgBtns" onclick="switchPict('1', '0', '0')">1</button>
<button type="button" id="imgBtn_2" Class="imgBtns" onclick="switchPict('2', '0', '0')">2</button>
<button type="button" id="imgBtn_3" Class="imgBtns" onclick="switchPict('3', '0', '0')">3</button>                  
<button type="button" id="imgBtn_4" Class="imgBtns" onclick="switchPict('4', '0', '0')">4</button>
<button type="button" id="imgBtn_5" Class="imgBtns" onclick="switchPict('5', '0', '0')">5</button>

</span> 
<button type="button" id="imgSwitch"  Style="position: absolute;display: inline;font-size: 10px; left: 420px;" onclick="picturesImprove()">Improve</button>


    
               <br>
               <?php
                if($isempty == 1){
                   echo ' <label for="height">Height (px) :</label>';
                  echo ' <input id="height" name="height" type="text" value="">';
                  echo ' <label for="width">Width (px) :</label>';
                  echo ' <input id="width" name="width" type="text" value="">';                
                  echo ' <label for="alakitasMod">Alakitas :</label>';
                  echo ' <select name="alakitasMod" id="mod">';                  
                  echo ' <option value="0">Change</option>';
                  echo ' <option value="1">Unchanged</option>';     
                }
                else{
                  echo ' <label for="height">Height (px) :</label>';
                  echo ' <input id="height" name="height" type="text"value="' . $pictureArray[$lastPicIndex]["height"] . '">';
                  echo ' <label for="width">Width (px) :</label>';
                  echo ' <input id="width" name="width" type="text" value="' . $pictureArray[$lastPicIndex]["width"] . '">';                
                  echo ' <label for="alakitasMod">Alakitas :</label>';
                  echo ' <select name="alakitasMod" id="mod">';  
                  if($pictureArray[$lastPicIndex]["mod"] == "0"){
                    echo ' <option value="0" selected>Change</option>';
                    echo ' <option value="1">Unchanged</option>';
                  } 
                  else{
                    echo ' <option value="0">Change</option>';
                    echo ' <option value="1" selected>Unchanged</option>';
                  }               
                  
                  
                }
              ?>




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
           /*
              require_once "szakaszManager.php";
              
              $i=0;
                 while($i <1){
                  // echo '<div  id="szakasz_' . $i .'" class="ranges"' . 'style="opacity: 1.0;height: 110pxpx">';
                   $szM = new szakaszManager();
                  /// echo '</div>';
                    $i++;
                   }
                   */
                  //----------------------------
                  if($isempty == "1"){
                    
                    echo '
                    <div  id="pictRange" >
                    <button  type="button" Style="color: white;" id="szakaszStShowBtn"  onclick="szakaszStShow()">ShowStart</button>
                    <button  type="button" Style="" id="szakaszEndShowBtn"  onclick="szakaszEndShow()">ShowEnd</button>
                    <br><br>
                <div class="tartamSor">   
                    <label  " for="tartam2">Tartam (mp):</label>
                
                    <input id="tartam" name="tartam" type="text" value="">
                    <label for="delay">Delay:</label>
                    <input id="delay" name="delay" type="text" value="" disabled>
                    
                    <label for="startFr">Start frame :</label>
                    <input id="startFr" name="startFr" type="text" value="" disabled>
                    
                    <label for="endFr>">End frame :</label>
                    <input id="endFr" name="endFr" type="text" value="" disabled><br>
                   </div>
            
                   
                   <div class="startSor"  >   
                    <label for="startX">Start X :</label>
                    <input id="startX" name="startX" type="text" value="">
                    <label for="startY>">Start Y :</label>
                    <input id="startY" name="startY" type="text" value="">
                    
                    <label for="startOp">Start opacity :</label>
                    <input id="startOp" name="startOp" type="text" value="">
                    
                    <label for="startLight">Start Light :</label>
                    <input id="startLight" name="startLight" type="text" value="">
                    </div>
                  
                    <div class="endSor">   
                    <label for="endX">End X :</label>
                    <input id="endX" name="endX" type="text" value="">
                    <label for="endY>">End Y :</label>
                    <input id="endY" name="endY" type="text" value="">
                    
                    <label for="endOp>">End opacity :</label>
                    <input id="endOp" name="endOp" type="text" value="">
                    
                    <label for="endLight>">End Light :</label>
                    <input id="endLight" name="endLight" type="text" value="">
                    </div>
                    </div>';
                  }
                  else{
                    
                    echo '
                    <div  id="pictRange" >
                    <button  type="button" Style="color: white;" id="szakaszStShowBtn"  onclick="szakaszStShow()">ShowStart</button>
                    <button  type="button" Style="" id="szakaszEndShowBtn"  onclick="szakaszEndShow()">ShowEnd</button>
                    <br><br>
                <div class="tartamSor">   
                    <label  " for="tartam2">Tartam (mp):</label>
                
                    <input id="tartam" name="tartam" type="text" value="' . $pictureArray[$lastPicIndex]["tartam"] . '">
                    <label for="delay">Delay:</label>
                    <input id="delay" name="delay" type="text" value="' . $pictureArray[$lastPicIndex]["delay"] . '" disabled>
                    
                    <label for="startFr">Start frame :</label>
                    <input id="startFr" name="startFr" type="text" value="' . $pictureArray[$lastPicIndex]["startFr"] . '" disabled>
                    
                    <label for="endFr>">End frame :</label>
                    <input id="endFr" name="endFr" type="text" value="' . $pictureArray[$lastPicIndex]["endFr"] . '" disabled><br>
                   </div>
            
                   
                   <div class="startSor"  >   
                    <label for="startX">Start X :</label>
                    <input id="startX" name="startX" type="text" value="' . $pictureArray[$lastPicIndex]["startX"] . '">
                    <label for="startY>">Start Y :</label>
                    <input id="startY" name="startY" type="text" value="' . $pictureArray[$lastPicIndex]["startY"] . '">
                    
                    <label for="startOp">Start opacity :</label>
                    <input id="startOp" name="startOp" type="text" value="' . $pictureArray[$lastPicIndex]["startOp"] . '">
                    
                    <label for="startLight">Start Light :</label>
                    <input id="startLight" name="startLight" type="text" value="' . $pictureArray[$lastPicIndex]["startLight"] . '">
                    </div>
                  
                    <div class="endSor">   
                    <label for="endX">End X :</label>
                    <input id="endX" name="endX" type="text" value="' . $pictureArray[$lastPicIndex]["endX"] . '">
                    <label for="endY>">End Y :</label>
                    <input id="endY" name="endY" type="text" value="' . $pictureArray[$lastPicIndex]["endY"] . '">
                    
                    <label for="endOp>">End opacity :</label>
                    <input id="endOp" name="endOp" type="text" value="' . $pictureArray[$lastPicIndex]["endOp"] . '">
                    
                    <label for="endLight>">End Light :</label>
                    <input id="endLight" name="endLight" type="text" value="' . $pictureArray[$lastPicIndex]["endLight"] . '">
                    </div>
                    </div>';

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
          
          <?php
               if($isempty == 1){
               echo ' <input id="projLength" name="projLength" type="text" value="">';
               echo ' <span style="display: inline;"> sec Frame/sec:</span>';
               echo ' <span >';
               echo '  <input id="mainDelay" type="text" value="">';
               echo '  <input id="mainFrameDb" type="text" disabled> db frames.';
               echo '        </span>  ';            
                              
                }
                else{
                  echo ' <input id="projLength" name="projLength" type="text" value="' . $pictureArray[$lastPicIndex]["projLength"] . '">';
                  echo ' <span style="display: inline;"> sec Frame/sec:</span>';
                  echo ' <span >';
                  echo '  <input id="mainDelay" type="text" value="' . $pictureArray[$lastPicIndex]["mainDelay"] . '">';
                  echo '  <input id="mainFrameDb" type="text" disabled value= ""> db frames.';
                  echo '        </span>  ';               
                     }
                     
              ?>         
          
          

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





