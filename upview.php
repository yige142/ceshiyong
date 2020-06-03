<?php
header("Content-type:text/html;charset=utf-8");
class UpView{

    private $dbms='mysql';     //数据库类型
    private $host='127.0.0.1'; //数据库主机名
    private $dbName='wq_laserfair_com';    //使用的数据库
    private $user='root';      //数据库连接用户名
    private $pass='root';          //对应的密码
    private $mysqli='';





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
//更新观看随机数

$up =  new UpView();
$mysqli=$up->mysqlConn();


//for ($i=0; $i<1500; $i++) {
    $a=mt_rand(1,5);

    try {
        //根据视频的记录条数的范围内 随机更新
        $sql_="SELECT COUNT(*) FROM `ims_fy_lesson_parent`";
        $count = $mysqli->query($sql_)->fetch_assoc();

        $limit=mt_rand(0,$count['COUNT(*)']);

        //取模 0 ID从小到大更新  1从大到小更新

        if($a%3==0){
            $sql="UPDATE `ims_fy_lesson_parent` set `visit_number`= `visit_number`+{$a} order by id desc limit {$limit}";
        }else{
            $sql="UPDATE `ims_fy_lesson_parent` set `visit_number`= `visit_number`+{$a}  limit {$limit}";
        }



// $sql="UPDATE `ims_fy_lesson_parent` set `visit_number`= 0 ";
        $result = $mysqli->query($sql);
//die();

    } catch (Exception $e) {
        // echo $e->getMessage();
        // die(); // 终止异常
    }
//}




echo '随机数'.$a;
echo '<br>';
echo  '取模'.$a%3;
echo '<br>';
echo $limit;
//echo $result;