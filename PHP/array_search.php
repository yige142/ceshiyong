<?php

//获取uid 排名
$userdb = array(
    0 => array(
        'uid' => 100,
        'name' => 'Sandra Shush',
        'url' => 'urlof100'
    ),

    1 => array(
        'uid' => 5465,
        'name' => 'Stefanie Mcmohn',
        'pic_square' => 'urlof100'
    ),

    2 => Array(
        'uid' => 40489,
        'name' => 'Michael',
        'pic_square' => 'urlof40489'
    )
);

$found_key = array_search(40489, array_column($userdb, 'uid'));
/**
如果$userdb很大，建议使用一个变量，避免搜索每个元素时都调用array_column()
$uid = array_column($userdb, 'uid');
$found_key = array_search(40489, $uid);
 */
var_dump($found_key);
var_dump($userdb);
var_dump(array_column($userdb, 'uid'));
