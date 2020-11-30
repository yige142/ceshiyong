<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->assign('name','12344444');
        return $this->fetch();

       //return 'TP5';
    }
}
