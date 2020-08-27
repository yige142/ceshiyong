<?php
include 'Rsa.php';
/*
 * 黎明互联
 * https://www.liminghulian.com/
 */

class Base extends RSA
{
    /**
     * 以下信息需要根据自己实际情况修改
     */
    const PID = '12312313';//合作伙伴ID
    const REURL = 'http://www.yige142.cn/alipay2/return.php';//同步通知地址
    const NOURL = 'http://www.yige142.cn/alipay2/notify.php';//异步通知地址
    const KEY = '支付宝后台获取';
    const PAYGAGEWAY = 'https://openapi.alipaydev.com/gateway.do';
    const CHECKURL = 'https://openapi.alipaydev.com/gateway.do?service=notify_verify&partner=2088102169356454&notify_id=';
    // const CHECKURL = "https://mapi.alipay.com/gateway.do?service=notify_verify&partner=" . self::PID ."&notify_id=";
    const APPPRIKEY = 'MIIEowIBAAKCAQEA6fM/AniC2HXYnzCAHGDIDWvxE30757B2P3JscMkp+kFESVyLkz1jGsESbOdJSpA9qQYWbYiNVo47fv04L1hpd5gSkxAaxnMypfbATicSZa72qOI+V29pYvIYfmt1z1WNgtS2YkUJGtc7wUJ4msyS9htu+jcVCxRnne7dl89cQZ61GrePt7AV3ZlUz/xB5dxAbcgPF06Di3cxqH2dnyV/n6TG3yUMpkUlkJLX2NdhLxZio4Vpt4RTn+4+cxFENjWL8Q8nyuEXudnT8rNg/G/KE0/oMsUJV6J30B0vU4HlStc25mVcFbXtRgh47RzQC9si9Nu2NDHBMlDOVJxBk+d8jwIDAQABAoIBADUV7AtMeyxQ+VmN8NP/pgVdo/NvLGOzZ/GXrkGdc/gETVF0PXuop09P1jV9+eSAfG1ZI0exf5jPZ3K2VMRxhGUNzdEvC1RSmYCNUC+rsAIAxJmn1MuUTU6Vbrdo/O+SEy1HxSbhUWKUyktdIO7HUuWjbfg6/XxpIeX1aLTk6aM9x+LtutthsI23CiohRIAv1p573UlRw7q6XpjK6RDEw5kOD69e5JKIcmYZ0qp9U5PX/WSQxMsbZlS1OEG4nvDYtVzoRQo/Ov0HieeRYANQitEedbhmR9jvkJ0LcDCC/9mOfnwHyh8aCYhXNGmV2o7Ap2ywOAaUb1QYu2FQUCeaQKECgYEA/0aW5nSqXmvqYoqiaowkh+LZbTZF4CGh7R7y9GAH7D20fhRK5Oo2dHh1SQIdBD4XEA3/a4J4F5oGiAH4t9dfEAS7ohcw9knxxYkd5+iUEFFgEhLVzcsZjBwftgL0BLosx7+ftxmH8GJ4EC5pnmMG/m3Julh+5cTZvI0ODTx7KV8CgYEA6p0q6FoQPGLnJ4wqMn6aWxznlAkFzAyCqnriGNrk96lREeeKBY5aHFCyR6aLS//K0EsnL3XtPY2mn9tqg22P/HjWzXYN/5aqOOEZz0boV3wOvVaFuCmcrHrsJt/P0g+Mq1M3OXsnEuZot149yYRqeclEV37edq2N8ImAcRxjCtECgYA//EaYr0eA8VXHq244fLYvZVoQeNkc6/E1iVtmi6eQvIrAS3/WTyqlGQh061WwmYuYV5ndLc/CQrY+YxgfpJlMX5NUdrGsGi7Cz7KyTWbHjE4jWZtDwRO/PdFpAuZ9RNkynEKBV6HuTBBCJhANRk8beRNmZQYxu5zEGSsbgDxyywKBgBNVuoiFi5r+Z6Bpu7yHlH73xdn8WF71lPspv2Je/8mtSYIZO9WzYpe8ysR+5DHyNauu1d7icBfHibjY41FLgTdEWid6mDK9HvArFO5xIIq9LZXLAKApxcCtLLMTdNQR9fzUkdOJ47F6DZ03Bg6KfB/nR1uSmBDdwrnVCyHHPh5RAoGBAKdHMnLJCTidg/xrgf7k4yIX7VrqrORLYJVtTJHCiN1BqD+Wyi4brvoPpauu1mPVyqQgVftDp8HZM4aYNo8mKjsmvEew6cRi0/faiETPUtRZOSGKPb71fcboI6dLQT2+xevut8qY9NOEhy1pvGe5sZhQK0pxHhhdrSTI9RC7qaRh';
    const ALIPUBKEY = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA6fM/AniC2HXYnzCAHGDIDWvxE30757B2P3JscMkp+kFESVyLkz1jGsESbOdJSpA9qQYWbYiNVo47fv04L1hpd5gSkxAaxnMypfbATicSZa72qOI+V29pYvIYfmt1z1WNgtS2YkUJGtc7wUJ4msyS9htu+jcVCxRnne7dl89cQZ61GrePt7AV3ZlUz/xB5dxAbcgPF06Di3cxqH2dnyV/n6TG3yUMpkUlkJLX2NdhLxZio4Vpt4RTn+4+cxFENjWL8Q8nyuEXudnT8rNg/G/KE0/oMsUJV6J30B0vU4HlStc25mVcFbXtRgh47RzQC9si9Nu2NDHBMlDOVJxBk+d8jwIDAQAB';
    const APPID = '2016073100136265';
    const NEW_ALIPUBKE = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAp5NmVEHz9wirLDGc4bSOJp7rt/Ve7iiTJri5T4z/JVlh46MdjWj6GSdECaxkk27iA1y+igEtnMOVWu+ZSOUAlTA8+bWXj3FEU71GqwL+5O55R+FUea4GbV2q0gpNaxi1WknhKkxAaLbMSdd3ltyh8FnK8mfQ8HpTPFg+kx0jhBC836Cm6dVkpKauw3/DIeYXc1vG5NuImY58N7RLtjyr+AaYhbp/sj7fCk6puuhtwdU8rceCwSa8uLS0E5r40tRyiXjcjhwAUqM2Lsdshe+i+u/Fj/H+kkl/DyYUex+Rnp7cI+2qAJNvLgBU3yA1w/w51Fo8UCXSbt5KX2F/mOfnGQIDAQAB';
    const NEW_PAYGATEWAY = 'https://openapi.alipaydev.com/gateway.do';

    public function getStr($arr,$type = 'RSA'){
        //筛选
        if(isset($arr['sign'])){
            unset($arr['sign']);
        }
        if(isset($arr['sign_type']) && $type == 'RSA'){
            unset($arr['sign_type']);
        }
        //排序
        ksort($arr);
        //拼接
        return  $this->getUrl($arr,false);
    }
    //将数组转换为url格式的字符串
    public function getUrl($arr,$encode = true){
        if($encode){
            return http_build_query($arr);
        }else{
            return urldecode(http_build_query($arr));
        }
    }
    //获取签名MD5
    public function getSign($arr){
        return  md5($this->getStr($arr) . self::KEY );
    }
    //获取含有签名的数组MD5
    public function setSign($arr){
        $arr['sign'] = $this->getSign($arr);
        return $arr;
    }
    //获取签名RSA
    public function getRsaSign($arr){
        return $this->rsaSign($this->getStr($arr), self::APPPRIKEY) ;
    }
    //获取含有签名的数组RSA
    public function setRsaSign($arr){
        $arr['sign'] = $this->getRsaSign($arr);
        return $arr;
    }
    //获取签名RSA2
    public function getRsa2Sign($arr){
        return $this->rsaSign($this->getStr($arr,'RSA2'), self::APPPRIKEY,'RSA2') ;
    }
    //获取含有签名的数组RSA
    public function setRsa2Sign($arr){
        $arr['sign'] = $this->getRsa2Sign($arr);
        return $arr;
    }
    //记录日志
    public function logs($filename,$data){
        file_put_contents('./logs/' . $filename, $data . "\r\n",FILE_APPEND);
    }
    //2.验证签名
    public function checkSign($arr){
        $sign = $this->getSign($arr);
        if($sign == $arr['sign']){
            return true;
        }else{
            return false;
        }
    }

    //验证是否来之支付宝的通知
    public function isAlipay($arr){
        $str = file_get_contents(self::CHECKURL . $arr['notify_id']);
        if($str == 'true'){
            return true;
        }else{
            return false;
        }
    }
    // 4.验证交易状态
    public function checkOrderStatus($arr){
        if($arr['trade_status'] == 'TRADE_SUCCESS' || $arr['trade_status'] == 'TRADE_FINISHED'){
            return true;
        } else {
            return false;
        }
    }
}