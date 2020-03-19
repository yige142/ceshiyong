<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2020/3/16
 * Time: 22:19
 */
header("Content-type: text/html; charset=utf-8");
//生成唯一订单号
@date_default_timezone_set("PRC");
//4000开始就有重复值
//for($j=0;$j<40000;$j++)
//{
//    //订购日期
//    $order_date = date('Y-m-d');
//    //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
//    $order_id_main = date('YmdHis') . rand(10000000,99999999);
//    //订单号码主体长度
//    $order_id_len = strlen($order_id_main);
//    $order_id_sum = 0;
//
//    for($i=0; $i<$order_id_len; $i++){
//        $order_id_sum += (int)(substr($order_id_main,$i,1));
//    }
//
//    //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
//    $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
//   // echo $order_id ;
//   // echo "<br>";
//    $a[]=$order_id;
//}
//echo "生成完成";
//echo "<br>";
//if (count($a) != count(array_unique($a))) {
//    echo '该数组有重复值';
//}else{
//    echo '没有重复的值';
//}







//php判断检测一个数组里有没有重复的值  array_unique 判断数组只有唯一的值，如果两个值不相等，肯定里面就有重复的值，反之亦然
//$arr1 = [1,2,3,4,5,6,4,7,0];
//if (count($arr1) != count(array_unique($arr1))) {
//    echo '该数组有重复值';
//    echo var_dump(array_unique($arr1)) ;
//}else{
//    echo '没有重复的值';
//}



//获取微秒
//$a=microtime(true);
//echo trim(substr($a,2,strlen($a)));
//echo '<br>';
//echo substr($a,2,8).substr($a,10,strlen($a));
//echo '<br>';
//echo ($a);
//die;
//echo microtime();
//die;

//php自带生成唯一ID的函数
//echo uniqid();

//第二种，利用时间戳的方法
//echo md5(time() . mt_rand(1,1000000));













//生成订单用此处下------------------------
echo microtime()."    ----微妙数：" ;
echo "<br>";
echo  substr(microtime(), 2, 5)."  --截取微妙数  substr(microtime(), 2, 5):";
echo "<br>";
echo date('Ymd')."    输出日期数：--";
echo "<br>";
echo time()." --时间戳";
echo "<br>";
echo date('Ymd').substr(time(), -5)."截取后的日期数+时间戳";
echo "<br>";
echo date('Ymd').substr(time(), -5) . substr(microtime(), 2, 5)."日期数+微秒数" ;
echo "<br>";
echo sprintf('%02d', rand(1000, 9999));

$danhao = date('Ymd').substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));

echo $danhao;
// echo $danhao;
//php生成唯一订单号的方法  10秒生成100w订单号，平均一秒插入10W条，测试无重复值  可以用这ge!!
for ($i=1;$i<1000000;$i++){
   // $danhao = substr(date('Ymd'), 2,strlen(date('Ymd'))). str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

   //尝试用微妙数
    $danhao = date('Ymd').substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));

    $a[]=$danhao;
   // echo $danhao;
}


echo "生成完成";
echo "<br>";
if (count($a) != count(array_unique($a))) {
    echo '该数组有重复值';
}else{
    echo '没有重复的值';
}

//生成订单用此处上------------------------



