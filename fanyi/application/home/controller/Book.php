<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7
 * Time: 11:16
 */
namespace app\home\controller;
use think\Controller;
use think\Loader;
use think\Request;
class Book extends Controller{
      public function add_book(){
           $cn_text=input('post.cn_text');
           $en_text=trim(input('post.en_text'));
           $class_id=input('post.class_id');

           $book_model=Loader::model('book');
           $result= $book_model->add_book($cn_text,$en_text,$class_id);
           echo $result;
      }

      //按照分类显示
      public function show_book(){
          //$class_id=input('get.class_id');
          $request = Request::instance();
          $param=$request->param();
          $class_id=$param['class_id'];
          $book_model=Loader::model('book');
          $result=$book_model->show_book($class_id);
          $this->assign('result',$result);
          return $this->fetch();

      }
}