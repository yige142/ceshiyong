<?php

include_once './aliyun-php-sdk-core/Config.php';

use afs\Request\V20180112 as Afs;

//YOUR ACCESS_KEY、YOUR ACCESS_SECRET请替换成您的阿里云accesskey id和secret
$iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "LTxxxxxxxxxxxxx", "vvxxxxxxxxxx");
$client = new DefaultAcsClient($iClientProfile);
DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", "afs", "afs.aliyuncs.com");

$sign=$_POST['sig'];
$token=$_POST['token'];
$sessionId=$_POST['sessionId'];
$scene=$_POST['scene'];

$request = new Afs\AuthenticateSigRequest();
$request->setSessionId($sessionId);// 必填参数，从前端获取，不可更改，android和ios只传这个参数即可
$request->setToken($token);// 必填参数，从前端获取，不可更改
$request->setSig($sign);// 必填参数，从前端获取，不可更改
$request->setScene($scene);// 必填参数，从前端获取，不可更改
$request->setAppKey("FFFF0N00000000009ED0");//必填参数，后端填写
$request->setRemoteIp("127.0.0.1");//必填参数，后端填写

$response = $client->getAcsResponse($request);//返回code 100表示验签通过，900表示验签失败
print_r($response);