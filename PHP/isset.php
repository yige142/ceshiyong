<?php
//is_set empty is_null面试题
//$a=0;
//$a='';
$a=null;
if(isset($a)){
    echo 1;
}else{
    echo 0;
}

if(empty($a)){
    echo 1;
}else{
    echo 0;
}

if(is_null($a)){
    echo 1;
}else{
    echo 0;
}