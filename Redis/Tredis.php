<?php

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$redis->set('test','hello redis');
//输出 所有key
//$a= $redis->keys('*');
//print_r($a);

$a = $redis->get('ccc');
$b=json_decode($a,true);
var_dump($b['name']);

