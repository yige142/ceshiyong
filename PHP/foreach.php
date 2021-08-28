<?php
//CRM打印页面 循环输出1000+ div
require_once "../BaseSql.php";
$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('local_wq_laserfair');

$sql="SELECT `id`,`company`,`address`,`name`,`mobile`,`prize`,`status`,`create_time` FROM `ims_awards_apply` WHERE status=1 ORDER BY status ASC,create_time DESC ";
$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
//var_dump($row);

$count=17; //总共多少页
$pageshow=10;//每页显示数目

$b=0;




for($i=1;$i<=17;$i++){
    $pagesize = ($i-1) * $pageshow;
    $limit=$pageshow*$i;
//            var_dump($pagesize);
//            var_dump($limit);

    foreach ($row as $key=>$value){
        if($key>=$pagesize && $key<$limit)
        {
//                    if($key==$pagesize)
//                    {
//                       echo $a= 'sdf';
//                    }
            $tmp[$i][]=$value;
//            var_dump($key);

//                    if($key<=$limit){
//                        echo $c='fff';
//                    }

            $b=$b+1;
            var_dump($pagesize);
            var_dump($limit);

            if($key==$limit-1){
                var_dump('sdfsfsldfkjlsafjslfjalsfdslkfjl');
                break;
            }
        }
        $b=$b+1;
    }
}





//    $b=$b+1;

var_dump($b);
//var_dump($tmp);
//var_dump($row);
