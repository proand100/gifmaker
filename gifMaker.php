<?php
class imagickManager{
function  __construct(){}
function makePicture(){

    $im = new Imagick ($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/images/Main.png');
   // $im = new Imagick ('GIFproject/rangeImg/ranged.png');
//echo '<script>document.write("check_1");</script>';
   // $im->readImage("GIFproject/images/Main.png");
   // $im->newImage (100, 130, "blue");
    // //$im->setImageFormat ("png");
    $im->writeImage($_SERVER['DOCUMENT_ROOT'] . '/php_1/gifmaker/GIFproject/rangeImg/ranged.png');
     //imagepng($im, 'GIFproject/images/new_image.png');
   //file_put_contents ("GIFproject/rangeImg/ranged2.png", $im);


    //echo $image;
//$image->writeImages("GIFproject/rangeImg/ranged.png", true); // GIFproject/rangeImg/ranged.png
echo "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged.png";
    }

}



?>

