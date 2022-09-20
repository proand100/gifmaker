<?php
//$stringBe = $_SERVER["QUERY_STRING"];
$face = new Imagick();
$face->newImage(400, 220, new ImagickPixel('yellow'));
$draw = new ImagickDraw();
//$color = new ImagickPixel( 'gray');
$draw->setFillColor('Magenta');
//$draw->setFont('Bookman-DemiItalic');
$draw->setFontSize( 30 );
$face->annotateImage($draw, 30, 45, 0, '      PHP Imagick is 
now making the animation.');




$face->setImageFormat('png');
include_once 'phpToHtml.php';
getPhpImg($face);



?>

