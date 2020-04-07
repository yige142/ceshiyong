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
if($action=='add_topic'){

    $account=I('account');
    $nickname=I('nickname');
    $user_id=I('user_id');
    $message=I('message');
    $token=I('token');

    //连接数据库
    $Base =new Base();
    $mysqli=$Base->mysqlConn();

    //redis 记录限制次数
    //插入留言信息
    if($message) {
           //验证token 格式 '用户名token' '123token';
            $vrify_token=md5($account.'ok'); //
            if($token!==$vrify_token){
                echo json_fail('token失效请重新登陆');
                return;
            }

        $send_time=time();
        $sql = "INSERT INTO topic
                                (`user_id`,`nick_name`,`message`,`send_time`)
                                 VALUES
                                 ('{$user_id}','{$nickname}','{$message}',$send_time)";
        $res = $mysqli->query($sql);
        if( $mysqli -> affected_rows >0){
            //echo 1;//插入成功
            //插入成功删除缓存
            $redis = $Base->redisConnect();
            $redis->del('index_page');
            $redis->del('index_show');

            $token=md5($account['account'].'ok'); //加密token
            setcookie('token',$token,time()+600);
            echo jsonSuccess('插入成功');
        }
    }





    $mysqli->close();
}