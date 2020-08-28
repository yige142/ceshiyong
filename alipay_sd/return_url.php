<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
/* *
 * 功能：支付宝页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2017-05-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require_once("config.php");
require_once 'pagepay/service/AlipayTradeService.php';


//$arr=$_GET;

$arr='{"charset":"UTF-8","out_trade_no":"202082810289298","method":"alipay.trade.page.pay.return","total_amount":"0.23","sign":"ktvaavZ3\/xldCwCauZ6\/c9t7\/fDl2+DeMLRWd3HdNLMdkkaGRhYjHXv0ACpeA5FGv5jCUgHIu67x8BNYsYyg1ffBrSYYvsoABBqHHtLKXdnwSW4OSHLpBRJ1YZMgxrlQcn3THC8N3SrQ3LtcZOC0NDISlXndHvrglYeYTk1oAj0OuYQp9aeLpVcw\/yTV1TjAv59N1WOn4fXqnLDSiwcEb2VCDjwhUmLXxaxVm0rxv0jm1NTuT28U7qHFHxMJNcqtGL4SBy09Ht1Cs0bVJhum0kTq7u7IBnr3MCh5sDtj4JrWtNx3KGTpEZA+t\/uOcNains4xXwgtgAyoZHGemPmsyQ==","trade_no":"2020082822001488760504779166","auth_app_id":"2016073100136265","version":"1.0","app_id":"2016073100136265","sign_type":"RSA2","seller_id":"2088102169356454","timestamp":"2020-08-28 10:29:39"}';
$arr=json_decode($arr,true);

var_dump($arr);
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号
	$trade_no = htmlspecialchars($_GET['trade_no']);
		
	echo "验证成功<br />支付宝交易号：".$trade_no;

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "验证失败";
}
?>
        <title>支付宝电脑网站支付return_url</title>
	</head>
    <body>
    </body>
</html>