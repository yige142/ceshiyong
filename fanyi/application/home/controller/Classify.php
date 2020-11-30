<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 14:35
 */
namespace app\home\controller;
use think\Controller;
use think\Loader;
class Classify extends Controller
{
     public function edit_classify(){
         $class_id=input('post.class_id');
         $class_name=input('post.class_name');

         $classfiy=Loader::model('classify');  //调用model
         $update=  $classfiy->edit_classify($class_id,$class_name);//update 返回0 没有任何更新， 1更新成功
         echo $update;die();
     }

    public function add_classify(){
        $class_name=input('post.class_name');
        $classfiy=Loader::model('classify');
        $result=  $classfiy->add_classify($class_name);
        echo $result;
    }
}