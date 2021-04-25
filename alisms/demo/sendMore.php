<?php


require  "../../BaseSql.php";
require './sendMoreSms.php';



$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('ccc');

$sql="SELECT * FROM c_user limit 2";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}

\Aliyun\DySDKLite\Sms\sendSms('13129529646','yige142');
var_dump($row);

foreach($row as $key => $value){
    \Aliyun\DySDKLite\Sms\sendSms('13129529646','yige142','sfddf');
    //\Aliyun\DySDKLite\Sms\sendSms($value['mobile'],$value['username'],$value['prize']);
}