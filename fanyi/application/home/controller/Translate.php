<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 17:09
 */

namespace app\home\controller;
use think\Controller;
use think\Loader;
class Translate extends Controller{
    public function search(){
//        $query='严正警告';
//        $from='zh';
//        $to='en';
        $query=input('post.search');
        $fanyi_btn=input('post.fanyi_btn');

        if(empty($query)){
            $this->error('没有输入');
        }
            if($fanyi_btn==1){ //如果是翻译按钮提交，就翻译
                if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',trim($query))) {
                    // print("该字符串全部是中文");
                    $from='zh';
                    $to='en';
                } else {
                    //  print("该字符串不全部是中文");
                    $from='en';
                    $to='zh';
                }
                $result= translate($query,$from,$to);
                $this->assign('result',$result);
                //var_dump($result);

                //再输出分类，方便保存
                $classify=Loader::model('classify');
                $info= $classify->center();
                $this->assign('info',$info);

                return $this->fetch('translate');
            }else{ //是搜索按钮就返回搜索结果

                $book_model=Loader::model('book');
                $result=$book_model->show_list($query);
                $this->assign('result',$result);
                return $this->fetch('search');
            }

    }

    public function ajax_translate(){
        $query=input('post.query');
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$query)) {
            // print("该字符串全部是中文");
            $from='zh';
            $to='en';
        } else {
            //  print("该字符串不全部是中文");
            $from='en';
            $to='zh';
        }
        $result= translate($query,$from,$to);
        $new_result=$result['trans_result'][0]['dst'];
        echo $new_result;
    }

    //直接显示翻译页面
    public function show_translate(){
        //定义变量不然页面报错
        $result['trans_result'][0]['src']='';
        $result['trans_result'][0]['dst']='';
        $this->assign('result',$result);
        //再输出分类，方便保存
        $classify=Loader::model('classify');
        $info= $classify->center();
        $this->assign('info',$info);
        return $this->fetch('translate');
    }
}