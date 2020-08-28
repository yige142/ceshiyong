<?php
header('Content-Type:text/html;charset=utf-8');
include 'Base.php';
/*
 * 黎明互联
 * https://www.liminghulian.com/
 */
/*
 *  1.获取数据
 *  2.验证签名
 *  3.验证是否来自支付宝的请求
 *  4.验证交易状态
 *  5. 验证订单号和金额
 *  6.更改订单状态
 *
 */

class Notify extends Base
{
    public function __construct() {
        // 1.获取数据
//        $postData = $_POST;
        $postData='{"gmt_create":"2020-08-28 09:38:04","charset":"UTF-8","gmt_payment":"2020-08-28 09:38:12","notify_time":"2020-08-28 09:38:13","subject":"\u65b0\u7248\u652f\u4ed8\u5b9d\u652f\u4ed8","sign":"ja2LH314mNYOuw\/2puMitXv8MvEnAId8WVb\/tRUzKWXzkMqR1pHpNvJ7rd1NAg9hEs3PdTW+bxf8dNFyuyafJ01A+cb9574o6VcNU2NcCVJmnJO9wa+OrUgZALfr2lPfQ90o89KfL+By3\/kdBoatlY+0BmpK5pzxCOY43mt6a5JabIfK1dsEAuoTXxSHTN4HSu8PZkV9v5t8nycrrSQp2K2SXz9fLrbqAyz0wXqa08Gw3iE2S9WNLgy7NMwlG2uBpFXUzwKkMRBGrKniPM3LSvVThJzyFwtdfBNXD5eX3a9AhBm4ekoTxGVit4xbEkwORFylni2qCSGwFO5HDiv8vg==","buyer_id":"2088102170188767","invoice_amount":"0.06","version":"1.0","notify_id":"2020082800222093813088760513047088","fund_bill_list":"[{\"amount\":\"0.06\",\"fundChannel\":\"ALIPAYACCOUNT\"}]","notify_type":"trade_status_sync","out_trade_no":"20200828033705","total_amount":"0.06","trade_status":"TRADE_SUCCESS","trade_no":"2020082822001488760504780311","auth_app_id":"2016073100136265","receipt_amount":"0.06","point_amount":"0.00","app_id":"2016073100136265","buyer_pay_amount":"0.06","sign_type":"RSA2","seller_id":"2088102169356454"}';
        $postData=json_decode($postData,true);
var_dump($postData);

        //2.验证签名MD5和RSA
        if($postData['sign_type'] == 'MD5'){
            if(!$this->checkSign($postData)){
                $this->logs('log.txt', 'MD5签名失败!');
                exit();
            }else{
                $this->logs('log.txt', 'MD5签名成功!');
            }
        }elseif($postData['sign_type'] == 'RSA'){
            if(!$this->rsaCheck($this->getStr($postData), self::ALIPUBKEY, $postData['sign']) ){
                $this->logs('log.txt', 'RSA签名失败!');
                exit();
            }else{
                $this->logs('log.txt', 'RSA签名成功!');
            }
        }elseif($postData['sign_type'] == 'RSA2'){
            if(!$this->rsaCheck($this->getStr($postData), self::NEW_ALIPUBKE, $postData['sign'],'RSA2') ){
                $this->logs('log.txt', 'RSA2签名失败!');
                exit();
            }else{
                $this->logs('log.txt', 'RSA2签名成功!');
            }
        }else{
            exit('签名方式有误');
        }
        //验证是否来自支付宝的请求
        if(!$this->isAlipay($postData)){
            $this->logs('log.txt', '不是来之支付宝的通知!');
            exit();
        }else{
            $this->logs('log.txt', '是来之支付宝的通知验证通过!');
        }
        // 4.验证交易状态
        if(!$this->checkOrderStatus($postData)){
            $this->logs('log.txt', '交易未完成!');
            exit();
        }else{
            $this->logs('log.txt', '交易成功!');
        }
        //5. 验证订单号和金额
        //获取支付发送过来的订单号  在商户订单表中查询对应的金额 然后和支付宝发送过来的做对比
        $this->logs('log.txt', '订单号:' . $postData['out_trade_no'] . '订单金额:' . $postData['total_amount']);

        //更改订单状态
        echo 'success';
    }
}

$obj = new Notify();