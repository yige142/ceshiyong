<?php
//测试生成二维码
include '../phpqrcode.php';
//QRcode::png('http://www.baidu.com');
$value = 'http://wq.laserfair.com/cultural/2020/get_code.php'; //二维码内容
$errorCorrectionLevel = 'L';//容错级别
$matrixPointSize = 6;//生成图片大小
//生成二维码图片
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);

//输出图片
$QR = 'qrcode.png';
$QR = imagecreatefromstring(file_get_contents($QR));
//imagepng($QR, 'baidu.png');
echo '<img src="qrcode.png">';