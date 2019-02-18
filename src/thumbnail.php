<?php
header ("Content-type: image/jpeg");
//to make this dynamic, we'll need the pic name!
$pic = $_GET['pic'];
$max_width = $_GET['wd'];
$max_height = $_GET['ht'];
$size = getimagesize($pic);

$width_ratio = $size[0]/$max_width;
$height_ratio = $size[1]/$max_height;     

if ($width_ratio >= $height_ratio){
    $ratio = $width_ratio;
}

if ($height_ratio >= $width_ratio){
    $ratio = $height_ratio;
}

$width = $size[0];
$height = $size[1];
$new_width=$size[0]/$ratio;
$new_height=$size[1]/$ratio;

$src_img = imagecreatefromjpeg($pic);
$thumb = imagecreatetruecolor($new_width,$new_height);

imagecopyresampled($thumb,$src_img,0,0,0,0,$new_width,$new_height,$size[0],$size[1]);
imagejpeg($thumb);
?>