<?php
$appid='wx23';
$AppSecret='da28';

$code=$_GET['code'];
var_dump("code:".$code);

//获取code后，请求以下链接获取access_token：
// https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$AppSecret}&code={$code}&grant_type=authorization_code";


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
