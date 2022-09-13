<?php

class pictureLoad{
//public $imageDir;

 
   // } //function drawImages(){
   protected $gifmaker;

function __construct(){
    include_once 'gifMaker.php'; 
    $this->gifmaker = new imagickManager();
} //

function canvasImgLoad(){
  /*  echo '<img  id="canvasIMG" style="width:400px; height:220px;margin-left: 40px;margin-top: 0px;"  
    src="canvasImg/canvasIMG0.png" alt="Image" >';
*/
    echo '<img  id="canvasIMG" style="width:400px; height:220px;margin-left: 40px;margin-top: 0px;"  
    src="' . $this->gifmaker->canvasWhite() .'" alt="Image" >';

}


function picsLoad($imageDir){
    /////////$gifmaker = new imagickManager();
  //-----  
  $myDirectory = opendir("GIFproject/images");
  while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
    
}
// close directory
closedir($myDirectory);
//$is_hat = "1";

//echo 'document.write(" count($dirArray) = "' . count($dirArray) . '")';
if(count($dirArray) == "2"){ // There is not created h_... bacgrounded file(s), the h_images dir is empty
   // echo 'document.write(" if(!count($dirArray) > "0"){ !!")';
return;
    }
    //	count elements in array
    $indexCount	= count($dirArray);
    

       // function drawImages(){
      
        // loop through the array of files and print them all in a list
     
        for($index=0; $index < $indexCount; $index++) {
            $extension = substr($dirArray[$index], -3);
            if ($extension == 'png'){ // list only pngs

              
                $imgTitle = $dirArray[$index];
     //-----------
     //If there is no prefix "hat_" in it, then:
 
                    $pngPicture = $this->gifmaker->getPictures($imgTitle);
     
   
    
     //-----------
    // echo 'document.write(" imgTitleH = "' . $imgTitleH . '", $shortTitle= "' . $shortTitle . '")"';
                echo ' <div><p style="margin-left: calc(50% + 50px); align: center;">' . $imgTitle . '</p>
                <img  id="' . $imgTitle . '" class= "cikk_3" style=" grid-row:' . $index  . '; " src="data:image/png;base64,' . $pngPicture . '" alt="Image" 
              onclick="textImgSrc(\'' . $imgTitle . '\')"/>
              
              </div>';
           // }
            }
        }


        
}

}

?>        