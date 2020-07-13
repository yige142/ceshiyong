<?php
// 合并相同的数组 ，mysql 有gurop by

$laArray = array(
    0 => array("id"=>11,"name"=>"happy","age"=>"20","moeny"=>100),
    1 => array("id"=>29,"name"=>"lucy","age"=>"20","moeny"=>100),
    2 => array("id"=>34,"name"=>"happy","age"=>"20","moeny"=>235),
    3 => array("id"=>42,"name"=>"happy","age"=>"15","moeny"=>100),
    4 => array("id"=>51,"name"=>"happy","age"=>"20","moeny"=>600),
    5 => array("id"=>61,"name"=>"lucy","age"=>"20","moeny"=>350),
    6 => array("id"=>61,"name"=>"lucy","age"=>"23","moeny"=>150),
);

$tmpArray = array();
//foreach ($laArray as $row) {
//    $key = $row['name'] . $row['age'];
//    if (array_key_exists($key, $tmpArray)) {
//        $tmpArray[$key]['id'] = $tmpArray[$key]['id'] . '+' . $row['id'];
//        if (is_array($tmpArray[$key]['moeny'])) {
//            $tmpArray[$key]['moeny'][] = $row['moeny'];
//        } else {
//            $tmpArray[$key]['moeny'] = array($tmpArray[$key]['moeny'], $row['moeny']);
//            $tmpArray[$key]['num']=count($tmpArray[$key]['moeny']);
//        }
//    } else {
//        $tmpArray[$key] = $row;
//    }
//    $tmpArray[$key]['num']=count($tmpArray[$key]['moeny']);
//}

foreach ($laArray as  $row) {
        $key=$row['name'];
        //判断$row['name'] 的值是否在$tmpArray的数组里，第一次遍历肯定是不在的，第二次有的话走下面循环
    if (array_key_exists($row['name'], $tmpArray)) {
        $tmpArray[$key]['id'] = $tmpArray[$key]['id'] . '+' . $row['id'];
        //判断$tmpArray[$key]['moeny'] 是否是数组，如果进入到这一步一定是循环了第二遍的数组，但第二遍的数组$row['moeny']并不是数组
        //所以让它追加循环第一遍的$tmpArray[$key]['moeny'] 使其变成数组
        if (is_array($tmpArray[$key]['moeny'])) {
            //跳到这个循环定是数组循环了三次或三次以上，然后在$tmpArray[$key]['moeny'][]数组里追加 该次循环数组$row['money']的值
            $tmpArray[$key]['moeny'][] = $row['moeny'];
        } else {
            $tmpArray[$key]['moeny'] = array($tmpArray[$key]['moeny'], $row['moeny']);

        }
    } else {
        $tmpArray[$key] = $row;
    }
    $tmpArray[$key]['num']=count($tmpArray[$key]['moeny']);
}

echo "<pre>";
var_dump($tmpArray);