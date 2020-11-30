<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15 0015
 * Time: 下午 4:15
 */
namespace app\home\controller;
use think\Controller;

class Captcha extends Controller
{
    // 验证码表单
    public function index()
    {
//        $config=['fontSize'=>20,
//                 'length'=> 4, 'imageH'=> 40, 'imageW'   =>148,  ];
//        $capt = new \think\captcha\Captcha($config);
//        return $capt->entry();
        return $this->fetch();
    }
}