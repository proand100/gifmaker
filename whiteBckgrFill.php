<?php
include_once "phpToHtml.php";
    $face = new Imagick();
    $face->newImage(400, 220, new ImagickPixel('white'));
    $face->setImageFormat('png');
    getPhpImg($face);



?>