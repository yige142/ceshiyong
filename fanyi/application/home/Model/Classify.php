<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15 0015
 * Time: 下午 9:10
 */
namespace app\home\model;
use think\Db;
use think\Model;
class Classify extends Model {

    public function center(){
        $classify=Db('classify');
        // $b= $classify->where('class_id',1)->find();
        $info = $classify -> select();
        return $info;
    }


    public function edit_classify($class_id,$class_name){
        $classify=Db('classify');
        //修改记录
       $update= $classify->where('class_id',$class_id)->update(['class_name' =>$class_name]);
        return $update;
    }

    public function add_classify($class_name){
        $data=array(
            'class_name'=>$class_name
        );
       $result= $this->save($data);
        return $result;
    }
}