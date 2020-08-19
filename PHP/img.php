<?php

//测试图片功能
$filename="../img/5houyu.jpg";
//$per=0.3;
list($width, $height)=getimagesize($filename);

$per=round($width*(round(1/600, 4)));


$n_w=$width/$per;
$n_h=$height/$per;



$new=imagecreatetruecolor($n_w, $n_h);
$img=imagecreatefromjpeg($filename);
//copy部分图像并调整
imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
//图像输出新图片、另存为
imagejpeg($new, "../img/pic1.jpg");
imagedestroy($new);
imagedestroy($img);