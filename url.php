<?php
//测试json数据
phpinfo();die();

$a="{ \"text\":\"sdf\",\"color\":\"white\",\"size\":\"1\",\"position\":\"0\",\"user\":\"ceshi\"}";
$b=json_decode($a,true);
var_dump($b);
echo gettype($a);die();


$dir=dirname(__FILE__);
echo $dir;die();


echo $_SERVER['SERVER_NAME'];
$a=33445;
var_dump($a);
echo '<br>';
//获取当前域名的后缀
echo $_SERVER["REQUEST_URI"];
echo phpinfo();


