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

if($action=='register'){
    //$user_name=array(['dfsdf'],['gggg']);
    //<script></script>
    // htmlspecialchars()
    //addcslashes()
    $account=I('account');
    $nickname=I('nickname');
    $password=I('password');
    $password2=I('password2');
    $introduction=I('introduction');
    $last_login=time();

    $Base =new Base();
    $mysqli=$Base->mysqlConn();

    if (!preg_match('/^\w+$/', $account)) {
        echo json_fail('账号只能是大小写字母和下划线');
        return;
    }
    if (!$nickname) {
        echo json_fail('请填写昵称');
        return;
    }
    if (strlen($password) <= 0 ) {
        echo json_fail('请填写密码');
        return;
    }
    if ($password != $password2) {
        echo json_fail('两次输入密码不一致');
        return;
    }

    //判断是否已注册该用户
    if($account) {
        $sql = "SELECT `account` FROM user WHERE account='{$account}'";
        $result = $mysqli->query($sql);
        if($result){
            if($row = $result->fetch_row()){
                echo json_fail('该用户已存在');
            }else{  //没有则注册新用户
                $password=md5($password);
                $sql = "INSERT INTO user
                                (`account`,`nick_name`,`password`,`introduction`,`last_login`)
                                 VALUES
                                 ('{$account}','{$nickname}','{$password}','{$introduction}','{$last_login}')";
                $res = $mysqli->query($sql);
                if( $mysqli -> affected_rows >0){
                    echo jsonSuccess('注册成功');
                   // echo 2;//注册成功
                }
            }
        }
    }
    $mysqli->close();
}