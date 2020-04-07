<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-11-17
 * Time: 下午 11:27
 */
require './Base.php';
require './common.php';
ini_set('date.timezone','Asia/Shanghai');
$action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';

if($action=='login'){

    $account=I('account');
    $password=I('password');

    if (!$account) {
        echo json_fail('请填写用户名');
        return;
    }

    if (!$password) {
        echo json_fail('请填写密码');
        return;
    }

    //连接数据库
    $Base =new Base();
    $mysqli=$Base->mysqlConn();

    if($account){
        $sql = "SELECT * FROM user WHERE account='{$account}'";
        $result = $mysqli->query($sql);
        if($result){
           if($row = $result->fetch_array(MYSQLI_ASSOC)){//获取到该用户结果集
               $redis = $Base->redisConnect();
               $err_num=$redis->get($account.'err_num'); //获取该用户号redis 登陆错误记录

               if($err_num>=5){
                   echo json_fail('登陆次数过多，已限制登陆');
                   return ;
               }

               if(md5($password)!==$row['password']){
                   echo json_fail('密码不正确');
                    //记录redis error次数
                   $user_name = $account.'err_num';
                   $res = null;
                   // 是否有记录
                   if($redis->exists($user_name)){
                       $res = $redis->incr($user_name); // +1
                   } else { // 记录一次失败登陆
                       $redis->set($user_name, 1);
                       $res = $redis->expire($user_name, 86400);
                   }
                   return ;
               }

               //redis
               //登录成功 更新登陆时间 redis错误记录数 + 写入cookie
               $last_login_time=time();
               $sql="UPDATE user set `last_login`={$last_login_time} where (account='{$row['account']}')";
               $result = $mysqli->query($sql);
               setcookie('user_id',$row['user_id'],time()+600);
               setcookie('account',$row['account'],time()+600);
               setcookie('nick_name',$row['nick_name'],time()+600);
               $token=md5($row['account'].'ok'); //加密token
               setcookie('token',$token,time()+600);

               $redis->set($row['account'].'token',  $token);
               //$redis->expire($row['account'].'token', 60*10); // Token 有效时间 10 分钟

               echo jsonSuccess('登陆成功');
               //echo 1;  //返回1  登录成功

           }else{
               echo json_fail('没有该用户');
              //echo 2;//没有该用户
               return;
           }
        }
    }


    $mysqli->close();
}