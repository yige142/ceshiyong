<?php
//用curl 方法访问微信接口，获取返回微博端返回的数据


$appid='wx23ab6314b73ae6c5';
$AppSecret='da285fa0c1e23d6e2d72085633ab9db5';
//$data=http_build_query($weibo);  //拼接url参数
//$url='https://api.weibo.com/2/users/show.json'.'?'.$data;
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$AppSecret}";
//$url输出格式   https://api.weibo.com/2/users/show.json?access_token=2.00b_y1GGIdpuiDd2db95d1946hSXXB&uid=5590453423


$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL,$url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //设置0 访问的信息会全部输出到页面上，设置1 则会保存到$output中

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。 //访问https 要设为false,绕开验证，不然页面没反应
// $output contains the output string

$output=curl_exec($ch);

//$json2Array = json_decode($jsonStr,true);
var_dump(json_decode($output,true)) ;
//echo output
//echo $output;

// close curl resource to free up system resources
curl_close($ch);