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
class User extends Model {



    public function add_user($user_name,$password,$mobile_phone){
     //  Db::execute("INSERT into `cms_user` (user_name) VALUES ('$user_name');");
        if(empty($user_name||$password||$mobile_phone)){
            return 0; exit();
        }

        $data=array(
            'user_name'=>$user_name,
            'password'=>md5($password),
            'mobile_phone'=>$mobile_phone,
            'create_time'=>getTime()
        );
        $this->save($data);
       //echo  Db::table('user')->getLastSql();//输出执行过的sql语句
        return 1;
    }
}