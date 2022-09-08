<?php

class pictureLoad{
//public $imageDir;

 
   // } //function drawImages(){
   

function __construct(){
    include_once 'gifMaker.php'; 
} //

function canvasImgLoad(){
    echo '<img  id="canvasIMG" style="width:400px; height:220px;margin-left: 40px;margin-top: 0px;"  
    src="canvasImg/canvasIMG0.png" alt="Image" >';

}


function picsLoad($imageDir){
    $gifmaker = new imagickManager();
  //-----  
  $myDirectory = opendir("GIFproject/h_images");
  while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
    
}
// close directory
closedir($myDirectory);
$is_hat = "1";

//echo 'document.write(" count($dirArray) = "' . count($dirArray) . '")';
if(count($dirArray) == "2"){ // There is not created h_... bacgrounded file(s), the h_images dir is empty
   // echo 'document.write(" if(!count($dirArray) > "0"){ !!")';
    $is_hat = "0";
   $myDirectory = opendir($imageDir);

    // get each entry
    while($entryName = readdir($myDirectory)) {
        $dirArray[] = $entryName;
    }
    
    // close directory
    closedir($myDirectory);
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
     if($is_hat == "0"){ // Directory h_images is empty
                    $imgTitleH = $gifmaker->getPictures($imgTitle);
                     $shortTitle = substr($imgTitleH, 4);
           }
      else{
        $imgTitleH = $imgTitle;
        $shortTitle = substr($imgTitle, 4);
      }     
   
    
     //-----------
    // echo 'document.write(" imgTitleH = "' . $imgTitleH . '", $shortTitle= "' . $shortTitle . '")"';
                echo ' <div><p style="margin-left: calc(50% + 50px); align: center;">' . $shortTitle . '</p>
                <img  id="' . $shortTitle . '" class= "cikk_3" style=" grid-row:' . $index  . '; " src="images/' . $shortTitle . '" alt="Image" 
              onclick="textImgSrc(\'' . $shortTitle . '\')"/>
              
              </div>';
           // }
            }
        }


        
}

}

?>        