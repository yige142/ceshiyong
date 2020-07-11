<?php
// ob_start();//开启缓存
//?>
<!--    <p>我是要生成的静态内容，也可以在该处链接数据库生成动态内容于此</p>-->
<!--    -->
<?php
//file_put_contents( 'index.html', ob_get_clean() );//把生成的静态内容保存到index.html文件，而不是输出到浏览器
//?>

<?php
//$file_path = "home.html";
//if(file_exists($file_path)){
//    $fp = fopen($file_path,"r");
//    $str = fread($fp,filesize($file_path));//指定读取大小，这里把整个文件内容读取出来
//    echo $str = str_replace("\r\n","<br />",$str);
//    fclose($fp);
//
//}
//
//
//die();








ob_start(); //打开缓冲区

$file_path = "home.html";
    $fp = fopen($file_path,"r");
    $str = fread($fp,filesize($file_path));//指定读取大小，这里把整个文件内容读取出来
    echo $str = str_replace("\r\n","<br />",$str);
    fclose($fp);

$info=ob_get_contents(); //得到缓冲区的内容并且赋值给$info
$info= str_replace("{\$v['id']}","<?php echo 123?>",$str);
$file=fopen('info.html','w'); //打开文件info.txt
fwrite($file,$info); //写入信息到info.txt
fclose($file); //关闭文件info.txt
?>