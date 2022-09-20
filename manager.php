
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv='cache-control' content='no-cache'> -->
    <title>Gif Manager page</title>
    <link rel="stylesheet" href="manager.css"> <!-- -->
    <script type="text/javascript" src="manager.js"></script>

</head>
<?php require_once 'isEmpty.php';
$isempty = isEmpty();
if($isempty == "0"){
  
  
   echo '<body  onload="projectLoad()"';
}

else{echo '<body  onload="newGif()">';}
?>

<div class="cikkek"> <!-- 1 -->
    <div class="col1Cikkek" style="color: black;"> <!--   2 --> 
        <?php
        if($isempty == "1"){
         echo ' <div id="loadGif" style=" position: fixed; width: 480px; color: black;" class="cikk_5">Create New Gif.';
        }// <!-- 3 --> 
        else{
            echo '<div  style="top: 100px;">' ;
            require_once "projectLoad0.php";  
            echo  '</div>';
            echo ' <div id="loadGif" style=" position: fixed; width: 480px; color: black;" class="cikk_5">Loaded Gif.';
          $lastPicIndex = count($pictureArray) - 1;
//----/-----------------
       }// <!-- 3 --> 
        ?>
      <section id="gimForm" > 

        <form action="" >
          <fieldset id="fieldSet">
            <legend>Gif setup for image:</legend>
              <label for="imgMainSrc"> Image:</label>
              
              
              <?php
              $isempty = isEmpty();
                if($isempty == "1"){
                 // echo '<input style="width: auto;" id="mainImg" name="mainImg2" type="text" value="">';
                   echo '<input style="width: auto;" id="mainImg" name="mainImg2" type="text" value="Click on same picture! ">';
                  echo ' <input id="kepSorszam"  name="kepSorszam" type="text" value="0">';
                  
                }
                if($isempty == "0"){
                  echo '<input style="width: auto;" id="mainImg" name="mainImg2" type="text" value="' . $pictureArray[$lastPicIndex]["mainImg"] . '">';
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
                if($isempty == "1"){
                   echo ' <label for="height">Height (px) :</label>';
                  echo ' <input id="height" name="height" type="text" value="0">';
                  echo ' <label for="width">Width (px) :</label>';
                  echo ' <input id="width" name="width" type="text" value="0">';                
                  echo ' <label for="alakitasMod" style="display: none;">Alakitas :</label>';
                  echo ' <select name="alakitasMod" id="mod" style="display: none;">';                  
                  echo ' <option value="0" style="display: none;">Change</option>';
                  echo ' <option value="1" style="display: none;">Unchanged</option>';     
                }
                else{
                  echo ' <label for="height">Height (px) :</label>';
                  echo ' <input id="height" name="height" type="text"value="' . $pictureArray[$lastPicIndex]["height"] . '">';
                  echo ' <label for="width">Width (px) :</label>';
                  echo ' <input id="width" name="width" type="text" value="' . $pictureArray[$lastPicIndex]["width"] . '">';                
                  echo ' <label for="alakitasMod" style="display: none;">Alakitas :</label>';
                  echo ' <select name="alakitasMod" id="mod" style="display: none;">';
                  /*  
                  if($pictureArray[$lastPicIndex]["mod"] == "0"){
                    echo ' <option value="0"style="display: none;" selected>Change</option>';
                    echo ' <option value="1" style="display: none;">Unchanged</option>';
                  } 
                  else{
                    echo ' <option value="0">Change</option>';
                    echo ' <option value="1" selected>Unchanged</option>';
                  } 
                  */              
                  
                  
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
              <button type="button" id="showGif" class="setButtons" style="display: inline;" onclick="showGif2()" >Show</button>
              <button  type="button" id="setCancel" class="setButtons" style="width: 50px; left: 290px; " onclick="SetCancel()">CANCEL</button>
              <button  type="button" id="setDel" class="setButtons" style="width: 70px; left: 360px; " onclick="SetDelete()">DELETE</button>
              <br><br>
          </fieldset> 
        </form>
         <?php
                  //----------------------------
                  if($isempty == "1"){
                    
                    echo '
                    <div  id="pictRange" >
                    <button  type="button" Style="color: white;" id="szakaszStShowBtn"  onclick="szakaszStShow()">ShowStart</button>
                    <button  type="button" Style="" id="szakaszEndShowBtn"  onclick="szakaszEndShow()">ShowEnd</button>
                    <br><br>
                <div class="tartamSor" style="display: none;">   
                    <label  " for="tartam2">Tartam (mp):</label>
                
                    <input id="tartam" name="tartam" type="text" value="0">
                    <label for="delay">Delay:</label>
                    <input id="delay" name="delay" type="text" value="" disabled>
                    
                    <label for="startFr">Start frame :</label>
                    <input id="startFr" name="startFr" type="text" value="" disabled>
                    
                    <label for="endFr>">End frame :</label>
                    <input id="endFr" name="endFr" type="text" value="" disabled><br>
                   </div>
            
                   <span id="opTt"  >1 - 20</span>
                   <span id="lightTt"  >0 - 200</span><br>

                   <div class="startSor"  >   
                    <label for="startX">Start X :</label>
                    <input id="startX" style="background-color: rgb(239, 224, 150);" name="startX" type="text" value="0">
                    <label for="startY>">Start Y :</label>
                    <input id="startY" style="background-color: rgb(239, 224, 150);"name="startY" type="text" value="0">
                    
                    <label for="startOp">Start opacity :</label>

                 
                      <input id="startOp" class="tooltip" style="background-color: rgb(208, 239, 150); " name="startOp" type="text" onmouseover="stOpTt()" onmouseout="stOpTtKi()" value="1">
 
                    
                    <label for="startLight">Start Light :</label>
                    <input id="startLight" name="startLight" type="text" onmouseover="stLiTt()" onmouseout="stLiTtKi()" value="100">
                  </div>
                  
                  <div class="endSor">   
                    <label for="endX">End X :</label>
                    <input id="endX" name="endX" type="text" value="0">
                    <label for="endY>">End Y :</label>
                    <input id="endY" name="endY" type="text" value="0">
                    
                    <label for="endOp>">End opacity :</label>
                    <input id="endOp" style="background-color: rgb(208, 239, 150);" name="endOp" type="text" onmouseover="stOpTt()" onmouseout="stOpTtKi()" value="1">
                    
                    <label for="endLight>">End Light :</label>
                    <input id="endLight" name="endLight" type="text" onmouseover="stLiTt()" onmouseout="stLiTtKi()" value="100">
                    </div>
                </div>';
                  }
                  else{
                    
                    echo '
                    <div  id="pictRange" >
                    <button  type="button" Style="color: white;" id="szakaszStShowBtn"  onclick="szakaszStShow()">ShowStart</button>
                    <button  type="button" Style="" id="szakaszEndShowBtn"  onclick="szakaszEndShow()">ShowEnd</button>
                    <br>
                    <!-- <br>-->
                <div class="tartamSor"  style="display: none;">   
                    <label  " for="tartam2">Tartam (mp):</label>
                
                    <input id="tartam" name="tartam" type="text" value="' . $pictureArray[$lastPicIndex]["tartam"] . '">
                    <label for="delay">Delay:</label>
                    <input id="delay" name="delay" type="text" value="' . $pictureArray[$lastPicIndex]["delay"] . '" disabled>
                    
                    <label for="startFr">Start frame :</label>
                    <input id="startFr" name="startFr" type="text" value="' . $pictureArray[$lastPicIndex]["startFr"] . '" disabled>
                    
                    <label for="endFr>">End frame :</label>
                    <input id="endFr" name="endFr" type="text" value="' . $pictureArray[$lastPicIndex]["endFr"] . '" disabled><br>
                   </div>
                  
            
                   <span id="opTt"  >1 - 20 </span>
                   <span id="lightTt"  >0 - 200</span><br>
                   <div class="startSor"  >   
                    <label for="startX">Start X :</label>
                    <input id="startX" style="background-color: rgb(239, 224, 150);" name="startX" type="text" value="' . $pictureArray[$lastPicIndex]["startX"] . '">
                    <label for="startY>">Start Y :</label>
                    <input id="startY" style="background-color: rgb(239, 224, 150);"name="startY" type="text" value="' . $pictureArray[$lastPicIndex]["startY"] . '">
                   
                    <label for="startOp">Start opacity :</label>
                    <input id="startOp" class="tooltip" style="background-color: rgb(208, 239, 150); " name="startOp" type="text" onmouseover="stOpTt()" onmouseout="stOpTtKi()" value="' . $pictureArray[$lastPicIndex]["startOp"] . '">

                   
                    

                    <label for="startLight">Start Light :</label>
                    <input id="startLight" name="startLight" type="text" onmouseover="stLiTt()" onmouseout="stLiTtKi()" value="' . $pictureArray[$lastPicIndex]["startLight"] . '">
                    </div>
                  
                    <div class="endSor">   
                    <label for="endX">End X :</label>
                    <input id="endX" name="endX" type="text" value="' . $pictureArray[$lastPicIndex]["endX"] . '">
                    <label for="endY>">End Y :</label>
                    <input id="endY" name="endY" type="text" value="' . $pictureArray[$lastPicIndex]["endY"] . '">
                    
                    <label for="endOp>">End opacity :</label>
                    <input id="endOp" style="background-color: rgb(208, 239, 150); " onmouseover="stOpTt()"  onmouseout="stOpTtKi()"name="endOp" type="text" value="' . $pictureArray[$lastPicIndex]["endOp"] . '">
                    
                    <label for="endLight>">End Light :</label>
                    <input id="endLight" name="endLight" type="text" onmouseover="stLiTt()" onmouseout="stLiTtKi()" value="' . $pictureArray[$lastPicIndex]["endLight"] . '">
                    </div>
                    </div>';

                  }
              
            ?>
 
        <!--<P id="kiire"></p>-->

      </section>            


      </div><!-- 3 -->
    </div><!-- 2 -->
<div class="col3Cikkek"><!-- 11 -->

    <div  style="position: fixed; width: 500px; height: 276px;" class="imgArea"> 
      <!-- 4 -->
      <span id="w_h" >
       
          <span style="margin-left: 10px; display: inline-flex; font-size: 13px;"> Canvas width=400px, height=220px; Gif long=  </span>
          
          <?php
               if($isempty == "1"){
               echo ' <input id="projLength" name="projLength" type="text" value="" onkeyup="calcFrPerSec()">';
               echo ' <span style="display: inline;"> sec Frame/sec:</span>';
               echo ' <span >';
               echo '  <input id="mainDelay" type="text" value="" onkeyup="calcFrPerSec()">';
               echo '  <input id="mainFrameDb" type="text" disabled> db frames.';
               echo '        </span>  ';            
                              
                }
                else{
                  echo ' <input id="projLength" name="projLength" type="text" onkeyup="calcFrPerSec()" value="' . $pictureArray[$lastPicIndex]["projLength"] . '">';
                  echo ' <span style="display: inline;"> sec Frame/sec:</span>';
                  echo ' <span >';
                  echo '  <input id="mainDelay" type="text" onkeyup="calcFrPerSec()" value="' . $pictureArray[$lastPicIndex]["mainDelay"] . '">';
                  echo '  <input id="mainFrameDb" type="text" disabled value= ""> db frames.';
                  echo '        </span>  ';               
                     }
                     
              ?>         
 
          <?php
            if($isempty == "1"){
          // echo '<input id="lengthSend" type="submit" value="Length OK">';
            }
          ?>
    
      </span>
       
      <img  id="canvasIMG" style="width:400px; height:220px;margin-left: 40px;margin-top: 0px;"  
    src="https://localhost/php_1/gifmaker/GIFproject/canvasImg/canvasIMG0.png" alt="Image" >

    <button type="button" id="saveProject"  style="" onclick="saveProj()" >SAVE</button>

    <br>
    </div><!-- 4 -->

    <div  id="uploadedPictures" style="margin-top: 290px;" > <!--5 -->
      <?php 
      include_once 'picsUpload.php'; 
             $images = new pictureLoad();
              $images->picsLoad("GIFproject/images");
          ?>
   
    </div> <!--5 --> 
  </div>  <!--11 --> 
  </div>  <!--1 --> 
 </body>
</html>





