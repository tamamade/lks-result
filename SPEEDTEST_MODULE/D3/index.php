<?php

$logoWM = imagecreatefrompng('logo.png');
$logo_size = getimagesize('logo.png');
$image = imagecreatefromjpeg('image.jpg');
$image_size = getimagesize('image.jpg');
$xCoor = $image_size[0] - $logo_size[0] - 7;
$yCoor = $image_size[1] - $logo_size[1] - 280;
imagecopy($image, $logoWM, $xCoor, $yCoor, 0, 0, $logo_size[0], $logo_size[1]);
header('Content-Type: image/png');
imagepng($image);
