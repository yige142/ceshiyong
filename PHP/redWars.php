<?php

header('Content-type: text/html; charset=UTF8');
//抢红包
$a=1/100;
if(!$a<0.01){
    echo 333;
}
echo $a;

function create($money,$ncount){
    define('MIN_MONEY',0.01);
    $result = array();
    if($money >= $ncount*MIN_MONEY){
        $money *= 100;
        for($i=0; $i<$ncount; $i++){
            if($i === $ncount -1){
                array_push($result,$money);
            }else{
                array_push($result,mt_rand(1,$money-($ncount-$i-1)));
            }

            $money -= $result[$i];
            $result[$i] /= 100;
        }
        shuffle($result);
        return $result;
    }
    return false;
}

$result = create(1,100);
if($result!=false){
    var_dump($result);
    echo "\n".'sum:'.array_sum($result);
}else{

}