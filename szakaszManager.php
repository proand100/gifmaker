<?php
class szakaszManager{

var $check;
function steCheck($be){
/*
    $this->check = $be;
    echo 'this->check = ' . be;
    */
}
    function __construct(){
        echo '
        <div  id="pictRange" >
        <button  type="button" Style="color: white;" id="szakaszStShowBtn"  onclick="szakaszStShow()">ShowStart</button>
        <button  type="button" Style="" id="szakaszEndShowBtn"  onclick="szakaszEndShow()">ShowEnd</button>
        <br><br>
    <div class="tartamSor">   
        <label  " for="tartam2">Tartam (mp):</label>
    
        <input id="tartam" name="tartam" type="text" value="">
        <label for="delay">Delay:</label>
        <input id="delay" name="delay" type="text" value="">
        
        <label for="startFr">Start frame :</label>
        <input id="startFr" name="startFr" type="text" value="">
        
        <label for="endFr>">End frame :</label>
        <input id="endFr" name="endFr" type="text" value=""><br>
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
    









}






?>
