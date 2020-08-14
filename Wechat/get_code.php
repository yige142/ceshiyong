<?php
//这是投票入口，用户点击进来跳转$url，再回跳到tt.php,tt.php获取到code,转换成access_token,openid


$appid='wx23';
$AppSecret='da28';

//还必须得放到公众号绑定的域名环境，要不然会提示40164 ip没加白名单
//$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$AppSecret}";
$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx23ab6314b73ae6c5&redirect_uri=http://wq.laserfair.com/test/tt.php&response_type=code&scope=snsapi_base&state=123#wechat_redirect";

if (isset($url))

{

    Header("HTTP/1.1 303 See Other");

    Header("Location: $url");

    exit; //from www.w3sky.com

}



