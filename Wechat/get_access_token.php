<?php
//用curl 方法访问微信接口，获取返回微博端返回的数据


$appid='wx23ab6314b73ae6';
$AppSecret='da285fa0c1e23d6e2d72085633ab9d';

//还必须得放到公众号绑定的域名环境，要不然会提示40164 ip没加白名单
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$AppSecret}";



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
//array(2) { ["access_token"]=> string(157) "35_MLO3uvgG0vjO6dTsVXHFF1n70hgN72s85rAB9S1tvTMuVzkWSN5frXsnSgaUwTgs5ObolYmnpjfUx6JJcWcjtsPZN4OjUT7Gt7mvvKoMzcw31LcUzkQz6LU1Taj62XTEnekISAXt_q3JwzRCHWViAFAODC" ["expires_in"]=> int(7200) }
//echo output
//echo $output;

// close curl resource to free up system resources
curl_close($ch);