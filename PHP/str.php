<?php

//截取字符串
//$a="http://www.laser123.com/file/upload/202005/26/102827501.png.thumb.png";
//$b=substr($a,0,-10);
//echo $b;

//
//$a="http://old.laserfair.com/uploads/userup/8651/14194a334-b11.jpg";
//$b=strpos($a,'old');

//$a="http://www.laserfair.com/file/upload/202003/20/1723146647220.jpg.thumb.jpg";
//$b=strpos($a,'old');
//echo $b;

//测试过滤字段
//$a="<div>'alert(123)'</div>";
//$a=htmlspecialchars($a);
//$a=addslashes($a);
////$a=stripslashes($a);
//echo $a;

//11>设置session,必须处于脚本最顶部
session_start();

//测试是否能获取到session 的图片文字
var_dump($_SESSION);
session_destroy();