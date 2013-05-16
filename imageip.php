<?php
include('getip.php');
$img_number = imagecreate(200,25);
$backcolor = imagecolorallocate($img_number,102,102,153);
$textcolor = imagecolorallocate($img_number,255,255,255);

imagefill($img_number,0,0,$backcolor);
$number = "    " . ipCheck();

Imagestring($img_number,10,5,5,$number,$textcolor);

header("Content-type: image/jpeg");
imagejpeg($img_number);
?>
