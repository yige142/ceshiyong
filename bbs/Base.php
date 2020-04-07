<?php
/**
 * Created by PhpStorm.
 * User: yige142
 * Date: 2019/11/20
 * Time: 15:23
 */
class Base{

    private $dbms='mysql';     //数据库类型
    private $host='127.0.0.1'; //数据库主机名
    private $dbName='bbs';    //使用的数据库
    private $user='root';      //数据库连接用户名
    private $pass='root';          //对应的密码
    private $mysqli='';


    public function mysqlConn(){
        $mysqli= $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->dbName);
        //连接有错 提示错误信息
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        return $mysqli;
    }

    public function redisConnect(){
        $redis = new Redis();
        $redis->connect('127.0.0.1',6379);
        return $redis;
    }


}