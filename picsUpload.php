<?php
class pictureLoad{
public $imageDir;
public $dirArray;

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


} // function __construct($imageDir){

    function drawImages(){
  
    // loop through the array of files and print them all in a list
    for($index=0; $index < $indexCount; $index++) {
        $extension = substr($dirArray[$index], -3);
        if ($extension == 'png'){ // list only pngs
            echo '<li><img src="images/' . $dirArray[$index] . '" alt="Image" /><span>' . $dirArray[$index] . '</span>';
        }	
    }
  
    } //function drawImages(){

}


?>        