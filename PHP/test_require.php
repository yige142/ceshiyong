<?php
var_dump(dirname(__FILE__));
$a=substr(dirname(__FILE__),0,-4);
var_dump(dirname($a));
require_once $a."/WxpayAPI_php/lib/WxPay.Api.php";