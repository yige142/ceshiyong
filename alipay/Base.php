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
    const REURL = 'https://www.liminghulian.com/alipay/return.php';//同步通知地址
    const NOURL = 'https://www.liminghulian.com/alipay/notify.php';//异步通知地址
    const KEY = '支付宝后台获取';
    const PAYGAGEWAY = 'https://mapi.alipay.com/gateway.do';
    const CHECKURL = 'https://mapi.alipay.com/gateway.do?service=notify_verify&partner='.self::PID.'&notify_id=';
  // const CHECKURL = "https://mapi.alipay.com/gateway.do?service=notify_verify&partner=" . self::PID ."&notify_id=";
    const APPPRIKEY = 'MIIEpAIBAAKCAQEAvK1R+sxXG4jeZLPVdCPyC1rU0ElwmxAXPIGCHDzxRgxrrcrhMyf602QmB/E2AzCHYgl4Ssldmf94W+ZXw97C16rEt11sQOcyQIuutiJ2faId8WGk5X/qINVgjZKbIhivEIY1n8Gqnlod9EEGimDY8BQTJRizonvpWT36H9iAUaW1OWAJmlTzmH2rSPDqHvxV6pdJbl1Qsnlwh6TrU6EB+cihQ/IBnokKVoFhT+HoV3vxGXuS9nRbz59TaiscGbBQDUYFb4vMCVVb+8qfkLCdwlP0Waov5100/mPKJsXOsoVeCGvtVOWfrS7aOvtRttu6WT7FdjIGAaH4tsGsYGtREQIDAQABAoIBAQCOsdJniHV0uJ3hsXSFAs6DMe3znSdRzuiT9SqO6rRbEve5F9Ab3WfAymRM62u7G8+4IItenE5zMpg3gMztsSLQ8zEVsM03hOMnl7zJuOS+fYaB0SRiAczzig0c5Tz4m4yDRc12hoTggC1ZVnh43WgUokoca0MoZuiDevEZdqcNl6XaDqIIfTJ6ikVoV7izOcCZZVK/Lwb5boFA/fyCwF6X10aG/K+APM2bFmu1UA5wDfEZrG3OBqJGriCs/rVJS6Jw+LDp7hzQ1koyIig2ryo8cmgcj3pW0J9qT8vLWwDTxO+n70TYXXkIhP/sMeCcBV5z3yCiguhDqMRGDRNoLjYVAoGBAOZzTry9FgxsBYp4vKTUW7xI645LMPP3cnADk0NprFYrmihvhdebyM49Ik1cB6RunO9iLRZteePb36Cc61ybAToI9kCriC/ypAPJrIrYjdTs6zS0hGXm+doGR9Gmso2cyzqDQld3MT3QbpJS1fGF8nLDyeiBrhNnK19MbKAfwRRfAoGBANGYZD0B29b5AIDeGjP5SE50g6KHblaaQ4F0t7DDRWBpaL79KEIYYU3XWmJSTMCkaxQ1X++x/aoCUnqYpwpEgaq7m/pSphg/r7EKcZ3mmQFPHMUAVi9d9M3L3YauCfzGTU0RTD+ZF4wGEgYmqdTeEir/9Fdm8RbNLXgkz3WplRCPAoGBANzwT9zDrA/cwLMxbirZLdomTy/tBtHfuueJhfZrqb4zr2h1A2zi/nI8SlbAlNMg+XTIO1H1Q5chhhUGXOA7+8EYNn9p9PeDOZwoDjRPyisJubaeGxFXkNNmkhR+LVF3saA3l7MjoyIQYvIGWPdl5DwDWeB/89TGZN7I9pvN1d8hAoGAHYCu82t0j4EDUiBxXcmEJQ7/jHw1ytjyEaHlTWtfM6ACz4eBCDS4VaWvolFlXmSGchTFSU8rnqevBnTAZpCYE/lOjmDd4mHskCYhMhHIjceeDBjtCMPX9rPwncmXvE4JiYSa0ATzrJEaLmV42G7d7dGTik4CN6xv7w53aV+SjP8CgYBVxJEmF684ikTiYhe9NrRBJyOnpt/VDCrHj6hQX6UAs/v7bmxKLV6jGKdvzNud+8fye10ZPi8Jz2KCnXwCY10f07YkEEKBBtIO4hVisjWjarJiYug4Of1cB3YEco0nitcGHL0rx3HnscGbUt8TPWQoT9xCZmlQKtn4hse8DuVWSw==';
    const ALIPUBKEY = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB';
    const APPID = '2016121404252170';
    const NEW_ALIPUBKE = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0/hl6rBbL5J3oqkfQrCZ+C3eoROrtv/yKlDQP/24NrpZ0w4iPyuUrWANGk5TszBvdGO4GCCq2aWJj1Qn6G0yuSZZIk/aL8YwSC81y8tjEYDKhTu3Zv6doQRXqcq/oLKJzwuKiVmlWu20Gg+fByb/MnQAmj7GuVXsdXPU5kX2Bb/OOmoj1OwgaNLHQs0rgf98V7V5STinH3/FXeN9UTUN+Jc86Fq0VbDcSPs4o0ePr+MbGXYqllUNbQGaKTUD7zfuOn78MwO9CCiKdHWHMvCZOiGS9z+rq+yy8BuLg+nlxej7taZAFJ10eZQKpigJzT8qgPELqLChTpykYdKtfG1D3QIDAQAB';
    const NEW_PAYGATEWAY = 'https://openapi.alipay.com/gateway.do';

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