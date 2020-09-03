<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：2.0
 * 修改日期：2017-05-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */

require_once 'config.php';
require_once 'pagepay/service/AlipayTradeService.php';

//$arr=$_POST;
$arr='{"gmt_create":"2020-08-28 09:47:34","charset":"UTF-8","gmt_payment":"2020-08-28 09:47:46","notify_time":"2020-08-28 09:47:46","subject":"\u5165\u53e3","sign":"R1v8pVPFahaYAsVshHP61sPln5BYwv3quIBOmXTglCQB\/djqAxUQo6H5mw2GGTz72xQI6a8zcKDiaSUYZMmRCqzTV8URADrbBk0BiFmkozVvlcNe8yUhnGwMXqmegrb6sWyWev7lA4CFgr5c\/qPcLEGtOsPHfP4UDTB1CTmWH80WfFKkOc\/P6JIEYXG9KlI0rP8rdkebBAwZjbmJAqHIgc6z9s4G+6IVjB+yWbuSs\/rOroufx5OBwP051c01YnzhV+rWaOdRAId+28Kxi4hvce8k03FOchXE7Tw46T5VHtjJ6KDFyzWebVJko+TrtbTY5KsNhO395ELbpnJvwls5Kw==","buyer_id":"2088102170188767","body":"\u64e6\u64e6\u64e6","invoice_amount":"0.02","version":"1.0","notify_id":"2020082800222094746088760513048218","fund_bill_list":"[{\"amount\":\"0.02\",\"fundChannel\":\"ALIPAYACCOUNT\"}]","notify_type":"trade_status_sync","out_trade_no":"202082894555850","total_amount":"0.02","trade_status":"TRADE_SUCCESS","trade_no":"2020082822001488760504780162","auth_app_id":"2016073100136265","receipt_amount":"0.02","point_amount":"0.00","app_id":"2016073100136265","buyer_pay_amount":"0.02","sign_type":"RSA2","seller_id":"2088102169356454"}';
$arr=json_decode($arr,true);
var_dump($arr);

$alipaySevice = new AlipayTradeService($config); 
$alipaySevice->writeLog(var_export($_POST,true));
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代

	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	
    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
	
	//商户订单号

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];


    if($_POST['trade_status'] == 'TRADE_FINISHED') {

		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
			//如果有做过处理，不执行商户的业务程序
				
		//注意：
		//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
    }
    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
			//如果有做过处理，不执行商户的业务程序			
		//注意：
		//付款完成后，支付宝系统发送该交易状态通知
    }
	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	echo "success";	//请不要修改或删除
}else {
    //验证失败
    echo "fail";

}
?>