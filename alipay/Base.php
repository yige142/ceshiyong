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
    const REURL = 'http://139.199.166.244/shop3.2';//同步通知地址
    const NOURL = 'http://139.199.166.244/shop3.2';//异步通知地址
    const KEY = '支付宝后台获取';
    const PAYGAGEWAY = 'https://mapi.alipay.com/gateway.do';
    const CHECKURL = 'https://mapi.alipay.com/gateway.do?service=notify_verify&partner='.self::PID.'&notify_id=';
  // const CHECKURL = "https://mapi.alipay.com/gateway.do?service=notify_verify&partner=" . self::PID ."&notify_id=";
    const APPPRIKEY = 'MIIEpAIBAAKCAQEApJVTHDjMxt40Ea12UPdzRITXDXldmH372kzDpZt83d7RFsZWefI/gW7mdCF61q8/MlxIWdgUkaWZ+gQDG055Ly/8/Sjh7QprgiiEyI2OBRbeUKFCGUj/i+QmNxE4wPA29yPs2z8eyrpIqLbLp2+W9VWwXRx5X2FMOUE8pThJoYauA/gGA1falG3mM5+W+em9L0c90WBKp7lNd1eXnfNoGdGxGqlA5kpumZPESk2AXzm6+BqMKirB0FMAOxk6Iwqyze6heTuPd2s/NwvS6c4aYpRodO6iVUten1TWwo/S2ya78W4gqIqGDmU87AMhdh4eDPqPni+r5OzgXxYM/wGVkQIDAQABAoIBAQCELrXINcopci7Jf9JFpud5wWLinHXSUmSi6AI+EIoRu7GcJAEyAaCFeKc33+fDYo5UCQ/GsKecbi8jQHOqS7VCc70xKdOByFud9qLmW+ITLlGw2kK3AgzTspIKqhc1xfevN7g0Qhad5U0Ty3P27sWEFqUFsye7te49Ear+Wx2vzqwNf8a79+bqv+S8LUBdbB6hZLrik2IAf9bmX1Yx2sUuizxPRLuA9RloIlJu2u8c8eyEgsckKdDZAuOZW0Uxi3hg+CiLiec1P2XqmQcv198uMAx/S+4W4IsftyuXxGa1eR7YJtAxyHNrq63wnt0dhm0ow+TbKNOsNqh/1LeP0Kj9AoGBANZ80x0L3fo/xHBUGt6LEBi5MKrjly60cpv6VyCgJmwUqWZCz9jHJehqVguu3U4aSM1nsK/wle3Pv63mSQuu+TbqK/e9ksxiF5P8zmLD71uduMT4DePqsaEtx5KkCtJsF+tIGdqk7HUBTjkREwnLrVRx551nIaPYlONkEVzzmou7AoGBAMRv5sZ8A2NFwrNax2Ji5JNjIzQdXZ50B0JbYMXQ8rADimX/4I12L2IL1bVfOV0ETXZRricmd6BjwcqH/BLS3jTc+RNOPl2GJFMwom28dY2mfO3878aMpyntQNnrxZqLjNdgek0LS0fl90gK6MnZjW0qaBE8QXD/IKGTL/U80kEjAoGALRhzfpDnK91KXN+iApY0XS5aiCNvvtcbnaXFuctSKLkzYJe9gXNlifcJfk1WpDwsgFtDr8oii6x5PYPEadtw9FXJxr2p5qTdFjU541QUuCtyFJ+etAO9MwkgA7nPuKwXX1V6chjoyjTrEF6BpTaYi7+jFdoAHaXEsAZzDBr/rE8CgYEAhJ1XGyCV2Os7qoHaoV1KGwaOuZwpm9ORIwc1qdaKQLHjOUEpg9cJ3hNHT47d1yIUeZBjFiMuF6XBKs3rK3oYcW/M52+nQtRQqajnv1W/tsVzCef8p/pE0FVPts8pNFCJ4M1NQ74gMIXcD1LuHXc1t0EtyJT5SSO0D+CiO9m3yCkCgYA/Qjr2RQm7pmIeMKoMAgrKaiN252SvsGVswfEb3mMEWpTq9IFaSg4m1AiLU6S5z61IGDiFnDyUp1OdnNdRb5pZNXPjfFATjFSWv8ifkPsHq3PGwgdEQD+lzUul6Ktr5PvIn1/fO+71zRAKFmSILxCnXiZRtB46QyEArBAqa5jv4w==';
    const ALIPUBKEY = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAp5NmVEHz9wirLDGc4bSOJp7rt/Ve7iiTJri5T4z/JVlh46MdjWj6GSdECaxkk27iA1y+igEtnMOVWu+ZSOUAlTA8+bWXj3FEU71GqwL+5O55R+FUea4GbV2q0gpNaxi1WknhKkxAaLbMSdd3ltyh8FnK8mfQ8HpTPFg+kx0jhBC836Cm6dVkpKauw3/DIeYXc1vG5NuImY58N7RLtjyr+AaYhbp/sj7fCk6puuhtwdU8rceCwSa8uLS0E5r40tRyiXjcjhwAUqM2Lsdshe+i+u/Fj/H+kkl/DyYUex+Rnp7cI+2qAJNvLgBU3yA1w/w51Fo8UCXSbt5KX2F/mOfnGQIDAQAB';
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