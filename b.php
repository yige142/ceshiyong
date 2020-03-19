<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3 0003
 * Time: 下午 10:59
 */

header("Content-type: text/html; charset=utf-8");
//测试单例模式
class Uni{
    //创建静态私有的变量保存该类对象
    static private $instance;
    //参数
    private $config;
    //防止直接创建对象
    private function __construct($config){
        $this -> config = $config;
        echo "我被实例化了";
    }
    //防止克隆对象
    private function __clone(){

    }
    static public function getInstance($config){
        //判断$instance是否是Uni的对象
        //没有则创建
        if (!self::$instance instanceof self) {
            self::$instance = new self($config);
        }
        return self::$instance;

    }
    public function getName(){
        echo $this -> config;
    }
}





//测试排序数组
//sort() - 以升序对数组排序  按a-z的顺序往下排
//$cars=array("Volvo","BMW","Toyota");
//echo sort($cars);
//var_dump($cars);

//rsort() - 以降序对数组排序  按z-a的顺序往上排
//$cars=array("Volvo","BMW","Toyota");
//echo rsort($cars);
//var_dump($cars);

//asort() - 根据值，以升序对关联数组进行排序   ["Mark"]=> string(2) "31" ["Steve"]=> string(2) "56" ["Bill"]=> string(2) "60"
//$age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
//asort($age);
//var_dump($age);

//arsort() - 根据值，以降序对关联数组进行排序  ["Bill"]=> string(2) "60" ["Steve"]=> string(2) "56" ["Mark"]=> string(2) "31"
//$age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
//arsort($age);
//var_dump($age);

//ksort() - 根据键，以升序对关联数组进行排序  ["Bill"]=> string(2) "60" ["Steve"]=> string(2) "56" ["mark"]=> string(2) "31"
//$age=array("Bill"=>"60","Steve"=>"56","mark"=>"31");
//ksort($age);
//var_dump($age);


//krsort() - 根据键，以降序对关联数组进行排序 ["mark"]=> string(2) "31" ["Steve"]=> string(2) "56" ["Bill"]=> string(2) "60"
//$age=array("Bill"=>"60","Steve"=>"56","mark"=>"31");
//krsort($age);
//var_dump($age);





//class Person{
//    static  $country='中国';
//   public function aa(){
//       echo 'public aa';
//   }
//
//   private function bb(){
//       echo 'private bb';
//   }
//
//   protected function cc($a){
//       echo 'pro cc';
//   }
//}
//
//class student extends Person{
//
//        function __call($function_name, $args)
//        {
//        echo "你所调用的函数：$function_name(参数：<br />";
//        var_dump($args);
//        echo ")不存在！";
//        }
//
//    function cd($a,$b){
//      echo '子类CC';
//   }
//
//};
//
//$b=new Person();
////$b->cc($c);
//echo $b::$country;




//$中国=0b110011;
//list([$a,$b],[$c,$d]) =[[1,2],[3,4]];
//s[$a,$b,$c]=[$c,$b,$a];
//$num=8;
//function getNum(){
//    static $num=0;
//    return $num++;
//}
//++$num;
//echo  $num."".getNum()."",$num."",getNum()."",$num;


//echo 123;
//$a=100;
//Function test(){
//    Echo "$a=".$a .'\n';
//}
//test();



//$a=array(0);
//if(empty($a)){
//    echo 1;
//}


//$a='1a';
//$b=array('1','2','3');
//If(in_array($a,$b)){
//    echo 'true';
//}else{
//    echo 'false';
//}


//输出日期格式
//define('NOW_DAY',date('Y-m-d'));
//echo NOW_DAY;

//$a=2;
//$b=array(1,2,3);
//echo count($a),",",count($b);



//类名不区分大小写，函数不区分大小写，变量区分大小写！
//class DB{
//    public function  cc(){
//        echo 33;
//    }
//}
//$a =new db();
//$a->cc();

//$cars=array("Volvo","BMW","Toyota");
//
//sort($cars);
//
//var_dump($cars);die;
//$clength=count($cars);
//for($x=0;$x<$clength;$x++)
//{
//    echo $cars[$x];
//    echo "<br>";
//}


//$age=array("Bill"=>"60","Steve"=>"80","mark"=>"31");
//var_dump($age);
//echo'<br>';
//asort($age);
//var_dump($age);die;
//
//foreach($age as $x=>$x_value)
//{
//    echo "Key=" . $x . ", Value=" . $x_value;
//    echo "<br>";
//}


// $a=100;
// function test($a){
//     echo "$a=".$a .'\n'."\n".'sdfsd';
//}
//test($a);


//static 全局变量
// $i=5;
//
//function test(){
//   static $i=0;
//    $i++;
//
//}
//for($i=0;$i<10;$i++){
//    Test();
//}
//
//echo $i;


//ini_set('display_errors', '1');


//$str=" sdf''/'fdsf";
//echo addslashes($str);
//echo '<br>';
//echo addslashes(addslashes($str));




//正确接收post 传来user的参数
//$a=$_POST['user'];
//$b=$_REQUEST['user'];
//$c=$_SERVER['user'];
//$d=$GLOBALS['user'];
//
//echo 'b-'.$b;
//echo '<br>';
//echo 'a-'.$a;
//echo '<br>';
//echo 'c-'.$c;
//echo '<br>';
//echo 'd-'.$d;



//测试取模
//$a=2%5;
//echo 2%5 ."<br>";

//测试php7连redis
//$redis = new Redis();
//$redis->connect('127.0.0.1',6379);
//$redis->set('test','hello redis');
//echo $redis->get('test');


//$action = isset($_REQUEST['id']) ? trim($_REQUEST['id']) : 'default';
//if($action==2){
//    echo "id=2";
//}