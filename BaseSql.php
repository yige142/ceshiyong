<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/20
 * Time: 20:48
 */
class BaseSql{

    private $dbms='mysql';     //数据库类型
    private $host='127.0.0.1'; //数据库主机名
    private $user='root';      //数据库连接用户名
    private $pass='root';          //对应的密码
    private $mysqli='';


    public function mysqlConn($dbName){
        $mysqli= $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$dbName);
        //连接有错 提示错误信息
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }else{
            echo '链接成功';
        }
        return $mysqli;
    }


}