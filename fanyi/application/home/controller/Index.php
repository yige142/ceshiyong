<?php
namespace app\home\controller;

use think\Controller;
use think\Loader;
class Index extends Controller
{
    //    public function index()
    //    {
    //        $this->assign('name','12344444');
    //        return $this->fetch();
    //
    //       //return 'TP5';
    //    }

    public function index()
    {
        $classify=Loader::model('classify');
        $info= $classify->center();
        $this->assign('info',$info);
        return $this->fetch();
    }
}
