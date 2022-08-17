<?php
class pictureLoad {
public $imageDir;
public $dirArray;
public $indexCount;

function __construct($imageDir){
// open this directory 
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
            $gRowIndex = $index + 1;
          //  echo '<li><img src="images/' . $dirArray[$index] . '" alt="Image" /><span>' . $dirArray[$index] . '</span>';
          echo ' <div><img class= "cikk_3" style=" grid-row:' . $index  . '; " src="images/' . $dirArray[$index] . '" alt="Image" />
          <span>' . $dirArray[$index] . '</span></div>';
        }	
    }
  
   // } //function drawImages(){
    } // function __construct($imageDir){
}


?>        