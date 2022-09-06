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
    $myDirectory = opendir($imageDir);

    // get each entry
    while($entryName = readdir($myDirectory)) {
        $dirArray[] = $entryName;
    }
    
    // close directory
    closedir($myDirectory);
    
    //	count elements in array
    $indexCount	= count($dirArray);
    
    
    
    
       // function drawImages(){
      
        // loop through the array of files and print them all in a list
        for($index=0; $index < $indexCount; $index++) {
            $extension = substr($dirArray[$index], -3);
            if ($extension == 'png'){ // list only pngs
                $imgTitle = $dirArray[$index];
     //-----------
               $gifmaker->getPictures($imgTitle);
    
     //-----------
             
                echo ' <div><p style="margin-left: calc(50% + 50px); align: center;">' . $imgTitle . '</p>
                <img  id="' . $imgTitle . '" class= "cikk_3" style=" grid-row:' . $index  . '; " src="images/' . $imgTitle . '" alt="Image" 
              onclick="textImgSrc(\'' . $imgTitle . '\')"/>
              
              </div>';
           // }
            }	
        }


}        
}


?>        