<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/1 0001
 * Time: 下午 3:39
 */
require 'b.php';

header("Content-type: text/html; charset=utf-8");
//工厂模式是我们最常用的实例化对象模式，是用工厂方法代替new操作的一种模式。
//使用工厂模式的好处是，如果你想要更改所实例化的类名等，则只需更改该工厂方法内容即可，
//不需逐一寻找代码中具体实例化的地方（new处）修改了。为系统结构提供灵活的动态扩展机制，减少了耦合。
interface  Skill{
    public function attack();
}

class Fire implements Skill{
    public function attack()
    {
        // TODO: Implement attack() method.
        return '火攻！';
    }
}

class Water implements Skill{
    public function attack()
    {
        // TODO: Implement attack() method.
        return "水攻";
    }
}
class Factory{
    static function creatFire(){
        return new Fire();
    }

    static function creatWater(){
        return new Water();
    }
}

$fireAttack=Factory::creatFire();
echo $fireAttack->attack();
$waterAttack=Factory::creatWater();
echo $waterAttack->attack();


//策略模式
//abstract class Skill { //抽象策略类
//    abstract function attack();
//}
////火攻
//class Fire extends Skill {
//    function attack() {
//        return '使用火攻';
//    }
//}
////水攻
//class Water extends Skill {
//    function attack() {
//        return '使用水攻';
//    }
//}
//
//class Pepole{
//    public function call($obj){
//        return $obj->attack();
//    }
//}
//$p=new Pepole();
//echo $p->call(new Fire());








//$dbl=Uni::getInstance(1);//单例只实例化一次  下面3 还是输出1
//$dbl->getName();
//
//$db2=Uni::getInstance(3);
//$db2->getName();



//7788
//测试行锁
//$mysqli = new mysqli("127.0.0.1", "root", "root","test");
//
//
//if ($mysqli->connect_errno) {
//    printf("Connect failed: %s\n", $mysqli->connect_error);
//    exit();
//}else{
//    echo '连接成功';
//}

//乐观锁-------------------------------下-------------------------

//获取version 值方便后面做比对
//$sql="SELECT `store`,`version` FROM goods where id=1";
//$version_res = $mysqli->query($sql);
//
//if($row = $version_res->fetch_array(MYSQLI_ASSOC)) {//获取到版本号
//    $version=($row['version']);
//    $store=($row['store']);
//}
////19849785745 outku2019
////version 7.0.3
////15914288470 配  19866720952
//// 插入数据
//$sql_2="UPDATE goods set store=$store-1,version=$version+1 where (id=1 and version=$version and $store>0)";
//
//if ($result = $mysqli->query($sql_2)) {
//
//    if($mysqli->affected_rows>0){
//        echo '<br>'."执行sql成功,影响的行数为:".$mysqli->affected_rows;
//    }else{
//        echo '<br>'."没有执行sql，影响的行数为：".$mysqli->affected_rows;
//
//    }
//
//}else{
//    echo '<br>'."执行sql成功,没有更新相应的数据，影响的行数为:".$mysqli->affected_rows;
//}
//乐观锁-------------------------------上---------------



//事务+乐观锁-------------------------------下-------------------------
// 关闭自动提交
//$mysqli->autocommit(false);
//
////获取version 值方便后面做比对
//$sql="SELECT `store`,`version` FROM goods where id=1 FOR UPDATE ";
//$version_res = $mysqli->query($sql);
//
//if($row = $version_res->fetch_array(MYSQLI_ASSOC)) {//获取到版本号
//           $version=($row['version']);
//           $store=($row['store']);
//   }

// 插入数据
//$sql_2="UPDATE goods set store=$store-1,version=$version+1 where (id=1 and version=$version and $store>0)";
//
//if ($result = $mysqli->query($sql_2)) {
//
//    if($mysqli->affected_rows>0){
//        echo '<br>'."执行sql成功,影响的行数为:".$mysqli->affected_rows;
//        $mysqli->commit();
//    }else{
//        echo '<br>'."没有执行sql，影响的行数为：".$mysqli->affected_rows;
//        $mysqli->rollback();
//    }
//
//}else{
//    echo '<br>'."执行sql成功,没有更新相应的数据，影响的行数为:".$mysqli->affected_rows;
//}
//事务+乐观锁-------------------------------上---------------


//事务+悲观锁-------------------------------下-------------------------
// 关闭自动提交
//$mysqli->autocommit(false);
//
//$sql="SELECT `store`,`version` FROM goods where id=1 FOR UPDATE";
//
//
//
//// 插入数据
//$sql_2="UPDATE goods set store=store-1,version=version+1  where (id=1 and store>0)";
//
//if ($result = $mysqli->query($sql_2)) {
//
//    if($mysqli->affected_rows>0){
//        echo '<br>'."执行sql成功,影响的行数为:".$mysqli->affected_rows;
//        $mysqli->commit();
//    }else{
//        echo '<br>'."没有执行sql，影响的行数为：".$mysqli->affected_rows;
//        $mysqli->rollback();
//    }
//
//}else{
//    echo '<br>'."执行sql成功,没有更新相应的数据，影响的行数为:".$mysqli->affected_rows;
//}
//事务+悲观锁-------------------------------上---------------


//$mysqli->close();





//测试生成二维码
//include 'phpqrcode.php';
////QRcode::png('http://www.baidu.com');
//$value = 'http://fanyi.yige142.cn/'; //二维码内容
//$errorCorrectionLevel = 'L';//容错级别
//$matrixPointSize = 6;//生成图片大小
////生成二维码图片
//QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
//
////输出图片
//$QR = 'qrcode.png';
//$QR = imagecreatefromstring(file_get_contents($QR));
////imagepng($QR, 'baidu.png');
//echo '<img src="qrcode.png">';


//ff




//$a=time();
//ini_set('date.timezone','Asia/Shanghai');
//
//echo date('Y-m-d');


//调试输出代码
//$str = "This is some <b>bold</b> text.";
//
//echo $str;
//echo '<br>';
//echo htmlspecialchars($str);



//调试cooke; 222222222222222222222222222
//session_start();
//setcookie('testcok','333',time()+20,$httponly=true);
//setcookie('sessid',session_id(),time()+20);
//setcookie('tttcc', '22', time()+20, $path = null, $domain = null, $secure = null, $httponly = true);




//测试session
//$member=array();
//session_start();
//
//$_SESSION['user']='xiexiaomao';
//$_SESSION['user2']='333';
//
//unset($_SESSION['user2']);
//
//var_dump($_SESSION);
//echo  session_id();
//var_dump($_SESSION);





//面试题

//$a=137.70;   // .20   .70  $b * 100 再用intval 会损失精度， 不丢失精度如下 先strval
//$b=intval(strval($a * 100));
//echo $b;

//$x=1;
//++$x;
//$y=$x++;
//echo $y; //y=++a表示先将a的值增加1后，再把值赋给y；而，y=a++表示先把a的值给y，a自己再增加1


//哪一种方法不能让字符串$s1 合$s2 组成一个字符串；
//$s1='a'; $s2='b';
//echo"{$s1} {$s2}" ;
//echo$s1.$s2 ;
//echo implode('',array($s1,$s2));
//echo $s1 + $s2; //这个不可以  直接输出0  应该是+是运算符 直接把字符串转成数字计算了

//$s='12345';
//$s[$s[1]]='2';  //先$s[1]=2  $s[$s[1]]=$s[2]=3  等于$s下标数 3；
//echo gettype($s[1]);
//echo $s[1];
//echo $s;//12245


//解析：这里的考点有两个：1，echo false和true的值；2、浮点类型不能用于精确计算；首先浮点类型的数据不能用于计算，
//他会将浮点类型转为二进制，所以有一定的损耗，故它无限接近于0.8，也就是0.79999999...，所以echo 应该是个false；echo false；
//结果是空；echo true；结果是1；
//$a= 0.1; $b = 0.7;if($a+$b ==0.8){ echo true; }else{ echo false; }



//++ 字母往后加以为 abz z后面是a 输出 aba
//$a = "abz"; $a++; echo $a;




//测试redis
//$redis = new Redis();

//$redis->connect('127.0.0.1',6379);
//$redis->set('test','hello redis');


//$redis_name = 'kill';

//模拟100人请求秒杀(高压力)
//for ($i = 0; $i < 100; $i++) {
//    $uid = rand(10000000, 99999999);
//    //获取当前队列已经拥有的数量,如果人数少于十,则加入这个队列
//    $num = 10;
//    if ($redis->lLen($redis_name) < $num) {
//        $redis->rPush($redis_name, $uid);
//        echo $uid . "秒杀成功"."<br>";
//    } else {
//        //如果当前队列人数已经达到10人,则返回秒杀已完成
//        echo "秒杀已结束<br>";
//    }
//}
//echo $redis->lLen('kill');

//$b=$redis->lRange('kill',0,-1);
//var_dump($b);










//判断类型
//if(1==true){
//    echo '相等';
//}
//
//if(1===true){
//    echo '不相等';
//}



//9 9乘法表
//for($i=1;$i<=9;$i++)
//{
//    for($j=1;$j<=$i;$j++)
//    {
//        echo "$i * $j =".$i*$j ."&nbsp&nbsp&nbsp&nbsp";
//    }
//    echo '<br>';
//}






//二分法
//intval返回整数值*/

//function search($array,$k,$low=0,$high=0){ //low =1  high=4
//    if(!in_array($k,$array)) //防止死循环
//    {
//        return '该数组没有该数字';
//    }
//
//
//    //判断数组元素的数量
//    if(count($array)!=0 and $high==0){      //判断是否为第一次调用
//        //数组的元素个数
//        $high = count($array);   //$high=13
//    }
//
//    if($low <= $high){      //如果还存在剩余的数组元素
//        $mid = intval(($low+$high)/2);      //取$low 与$high的中间值  $mid=2
//
//        if($array[$mid] == $k){
//            return $mid;    //如果找到则返回
//        }elseif($k <$array[$mid]){
//            //如果上面没有找到，则继续查找
//            return search($array,$k,$low,$mid);
//        }else{
//            return search($array,$k,$mid,$high);
//        }
//    }
//
//    return "没有要查找的值";
//}




//练习2分法
//$array = array(1,2,3,5,75);
//echo search($array,75);
//function search($array,$k,$low=0,$high=0){
//    if(!in_array($k,$array)){
//        return '该数组不存在';
//    }
//
//    //判断是否是第一次调用
//    if(count($array)!=0 and $high==0){
//        $high=count($array);
//    }
//
//    if($low <= $high){
//        $mid = intval(($low+$high)/2);  //取的中间值
//
//        if($array[$mid] == $k){
//            return $mid;
//        }elseif($k <$array[$mid]){
//            return search($array,$k,$low,$mid);
//        }elseif($k>$array[$mid]){
//            return search($array,$k,$mid,$high);
//        }
//    }
//}




//冒泡
//function bubbleSort($list)
//{
//    $count = count($list);  //$count=6
//    for ($i = 0; $i < $count - 1; $i++) {
//        for ($j = 0; $j < $count - 1; $j++) {  //$j < 4
//            if ($list[$j] > $list[$j + 1]) {
//                $tem = $list[$j];
//                $list[$j] = $list[$j + 1];
//                $list[$j + 1] = $tem;
//            }
//
//        }
//
//    }
//
//    return $list;
//}







//$list = [5, 4 ,18, 2, 1];  //[3,5,4,9,10]
//var_dump(bubbleSort($list));

//练习冒泡

//function bubbleSort($list){
//   // $total=count($list);
//
//    for($i=0;$i<count($list)-1;$i++){
//        for($j=0;$j<count($list)-1;$j++){
//            if($list[$j]>$list[$j+1]){
//                $tmp=$list[$j];
//                $list[$j]=$list[$j+1];
//                $list[$j+1]=$tmp;
//            }
//        }
//    }
//
//    return $list;
//}
































//$a=123456;
//$t=2764;
//echo md5($a);
//echo md5(md5($a).$t);

//function getColName($j){
//    //$col = array('A','B',....'Z');
//    $col = range('A','Z');
//    return $col[$j];
//}
//
//echo getColName(33);
//
?>

<!--<html>-->
<!--<meta charset="UTF-8">-->
<!--<script type="text/javascript" src="jquery3.2.js"></script>-->
<!--<input type="text" id="shurukuang" value="2">-->
<!--<div><a id="aaa" href="b.php?"+document.getElementById("shurukuang").value+"."> 跳转</a> </div>-->
<!---->
<!--<script>-->
<!--    var i=$('#shurukuang').val();-->
<!--   // alert(i);-->
<!--    //document.getElementById("aaa").href='b.php?id='+i;-->
<!--    $('#aaa').attr('href','b.php?id='+i);-->
<!--</script>-->
<!--</html>-->
