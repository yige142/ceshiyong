<?php

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//$redis->set('test','hello redis');
//输出 所有key
//$a= $redis->keys('*');
//print_r($a);

//测试json 字符转数组
//$a = $redis->get('ccc');
//$b=json_decode($a,true);
//var_dump($b['name']);

//测试redis排序
//$t_set = $redis->zRevRange('t_sorted_set',0,-1,'withscore');
//$t_set = $redis->zRange('t_sorted_set',0,-1,'withscore');
//var_dump($t_set);
//
//foreach ($t_set as $key => $value){
//    $a=$key;
//    break;
//}
//var_dump(json_decode($a,true));



/*
 关于游戏排行双维度排序问题
 1.根据游戏人物的攻击力从高到低排序
 2.如果攻击力排名相同按时间排序，越早到达该攻击力排名靠前
 （reids sorted_set里的 [score] 排序默认按分数排名 score后面的 [member] 则按字母排序，汉字还未测试）

 测试用例
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "yige142-1595572350"
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "xyz-1595572349"
127.0.0.1:6379[1]> zadd t_sort_set 1000002 "zxc666-1595572355"
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "zxc-1595572350"
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "zdd-1595572348"
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "1595572348-yige142"
127.0.0.1:6379[1]> zadd t_sort_set 1000000 "1595572349-zdr"
127.0.0.1:6379[1]> zadd t_sort_set 1000001 "1595572349-ccccccc"

127.0.0.1:6379[1]> zrevrange t_sort_set 0 -1 withscores
                 1) "zxc666-1595572355"
                 2) "1000002"
                 3) "1595572349-ccccccc"
                 4) "1000001"
                 5) "zxc-1595572350"
                 6) "1000000"
                 7) "zdd-1595572348"
                 8) "1000000"
                 9) "yige142-1595572350"
                10) "1000000"
                11) "xyz-1595572349"
                12) "1000000"
                13) "1595572349-zdr"
                14) "1000000"
                15) "1595572348-yige142"
                16) "1000000"

   测试结果得出:
   1.zrevrange t_sort_set 0 -1 withscores 可以得出按攻击力从高到低排序
   2.[member] 字段录入“  13) "1595572349-zdr"
                       14) "1000000"”
                       15) "1595572348-yige142"
                       16) "1000000"
             按时间戳格式排序， zdr实则比yige142攻击力晚到达，但因为时间戳的值比较大，所以排在前面
             逆向思考，取今天的时间戳，如今天最晚的20200724 23:59 的时间戳（1595606399），减去之前到达的时间戳数，数值越大则说明越靠前
             因此排序则可。

             所以数据在插入redis之前 算好时间戳的差 录入格式为
             zadd t_sort_set 1000000 "34051-yige142" (30451 = 1595606399-1595572348)
             zadd t_sort_set 1000000 "34050-zdr"
             按此数据格式插入，后面php获取到数据再做处理就很方便
*/
$redis->select(1);
$a = $redis->zRevRange('t_sort_set',0,-1,'withscore');
var_dump($a);
 foreach ($a as $key => $value){
     $b[]=$key;
 }
var_dump($b);
