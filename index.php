<?php
$filename = "d.jpg";
$width = 150;
$height = 150;
header('Content-Type: image/jpeg');
$size = getimagesize($filename);
if ($size['mime'] == 'image/png') {
        $image = imagecreatefrompng($filename);
    } else if ($size['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($filename);
    } else if ($size['mime'] == 'image/gif') {
        $image = imagecreatefromgif($filename);
    } else {
        echo "Неопознанный тип данных!";
    }
list($width_orig, $height_orig) = getimagesize($filename);

$image_p = imagecreatetruecolor($width, $height);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

imagejpeg($image_p, null, 100);