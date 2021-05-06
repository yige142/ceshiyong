<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-05-06
 * Time: 22:15
 */

$time = time();
$timeBetween=['09:00:00','23:00:00'];

echo getTime($time,$timeBetween);


function getTime($time,$timeBetween){

    $checkDayStr = date('Y-m-d ',time());
    $timeBegin1 = strtotime($checkDayStr.$timeBetween[0]);
    $timeEnd1 = strtotime($checkDayStr.$timeBetween[1]);
echo $timeBegin1;
    echo '<br>';
    if($time > $timeBegin1 && $time < $timeEnd1){

        echo $time.'<br>'."在区间【".$timeBetween[0]."~".$timeBetween[1]."】内";
    }else{
        echo "不在区间内";
    }

}
