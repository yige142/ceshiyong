<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/20
 * Time: 21:22
 */
$dir=dirname(__FILE__);
require_once "$dir/BaseSql.php";

$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('laser_shop');

$sql = "SELECT * FROM `destoon_article_data_21` limit 10";
$result = $mysqli->query($sql);

if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $count_row=count($row);

    foreach($row as $key =>$value){
        $content=str_replace('<a href=\'http://www.v550.com\'>&nbsp; </a>', '', $value['content']);

        $sql="UPDATE `destoon_article_data_21` set `content`= {$content} WHERE `itemid`={$value['itemid']}";
        $result = $mysqli->query($sql);
        echo $result;
    }

//    var_dump($row);die();
}


//$a=htmlspecialchars($row[0]['content'],ENT_COMPAT);
//$b=str_replace('<a href=\'http://www.v550.com\'>&nbsp; </a>', '', $row[0]['content']);
//
//echo $b;die();
//var_dump($a);