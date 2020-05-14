<?php
header("Content-type:text/html;charset=utf-8");
class UpView{


//    private $dbms='mysql';     //数据库类型
//    private $host='127.0.0.1'; //数据库主机名
//    private $dbName='wq_laserfair_com';    //使用的数据库
//    private $user='root';      //数据库连接用户名
//    private $pass='root';          //对应的密码
//    private $mysqli='';


    public function mysqlConn(){
        $mysqli= $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->dbName);
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
$a=mt_rand(2,5);
$up =  new UpView();
$mysqli=$up->mysqlConn();
try {

    $sql="UPDATE `ims_fy_lesson_parent` set `visit_number`= `visit_number`+$a";
    $result = $mysqli->query($sql);

} catch (Exception $e) {
   // echo $e->getMessage();
    // die(); // 终止异常
}

echo $result;