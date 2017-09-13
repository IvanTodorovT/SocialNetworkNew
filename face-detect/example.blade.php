<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);

include "FaceDetector.php";

$face_detect = new Face_Detector('detection.dat');
$face_detect->face_detect($_GET['image']);
$face_detect->toJpeg();




?>
<style>

    img{
        border: 10px solid transparent;
        padding: 15px;
    }
</style>