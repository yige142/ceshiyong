<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/14 0014
 * Time: 下午 2:18
 */
namespace app\home\controller;
use app\home\model\Classify;
use think\Controller;
use think\captcha\Captcha;
use think\Db;
use think\Loader;
class User extends Controller{


    public function register(){
        return $this->fetch();
    }


    public function add_user()
    {
        // dump($request->post('user_name'));
        // $user_name=post('user_name');
        // $user=new \app\home\model\User();
              $user=Loader::model('user');
              $code=input('post.code');

        //检测验证码是否正确
            $captcha = new Captcha();
        if (!$captcha->check($code)) {
           echo -1;exit();
        }
            echo $user->add_user(input('post.user_name'),input('post.password'),input('post.mobile_phone'));

    }

    public function center(){
       // $classify=Loader::model('classify');

        $classify=Loader::model('classify');
        $info= $classify->center();
        $this->assign('info',$info);
        return $this->fetch('center');
    }

}