<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7
 * Time: 11:16
 */

namespace app\home\model;
use think\Db;
use think\Model;
class Book extends Model {

    //显示搜索列表
    public function show_list($query){
        $book_model=Db('book');
        $result=$book_model->where('cn_text|en_text','like','%'.$query.'%')->select();
        return $result;
    }

    //保存翻译记录
    public function  add_book($cn_text,$en_text,$class_id){
        $data=array(
            'cn_text'=>$cn_text,
            'en_text'=>$en_text,
            'class_id'=>$class_id
        );
        $result=$this->save($data);
        return $result;
    }

    //根据分类id显示记录
    public function show_book($class_id){
        $book_model=Db('book');
        $result=$book_model->where('class_id',$class_id)->select();
        return $result ;
    }
}