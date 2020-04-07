<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-11-17
 * Time: 下午 11:27
 */

require './Base.php';
require './common.php';
ini_set('date.timezone','Asia/Shanghai');


$action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
if($action=='index'){
    //初始化redis
    $Base =new Base();
    $redis = $Base->redisConnect();
    //先看redis有没有数据
    $index_show= $redis->get('index_show');
    if($index_show){
        //有值直接返回
        echo json_encode(unserialize($index_show));
        exit();
    }


    //连接数据库
    $mysqli = $Base->mysqlConn();
    //返回最新的数据
        $sql = "SELECT * FROM topic ORDER BY send_time DESC limit 5";
        $result = $mysqli->query($sql);
        if($result){
           if($row = $result->fetch_all(MYSQLI_ASSOC)){
               //写入redis
               $redis->set('index_show',serialize($row));
               $redis->expire('index_show',3600*24);
               echo json_encode($row); //返回1  查询到结果集
              // var_dump($row) ;  //返回1  查询到结果集

           }
        }

    //再缓存一些分页需要的数据
    $page_use_sql = "SELECT * FROM topic ORDER BY send_time DESC limit 100";
    $result = $mysqli->query($page_use_sql);
    if($result){
        if($row = $result->fetch_all(MYSQLI_ASSOC)){
            //写入redis
            $redis->set('index_page',serialize($row));
            $redis->expire('index_page',3600*24);
            // var_dump($row) ;  //返回1  查询到结果集
        }
    }



    $mysqli->close();
}


if($action=='paging'){
    //分页
    $page=I('page');
    $pageshow=I('pageshow');


    //初始化redis
    $Base =new Base();
    $redis = $Base->redisConnect();

    //先看redis有没有数据
    $index_page= unserialize($redis->get('index_page'));
    if($index_page){
        if($page<=2){
            $page=($page-1)*$pageshow;
            //从reids存的数据中，要求返回对应数据段
            $row=array_slice($index_page,$page,$pageshow);
            echo json_encode($row);

        }else{//大于缓存的数据就从数据库取

            //连接数据库
            $Base =new Base();
            $mysqli = $Base->mysqlConn();


            //分页公式 limit 起始第一个数
            $pagesize = ($page-1) * $pageshow;

            //获取信息记录
            $sql="SELECT * FROM topic   ORDER BY send_time  DESC limit $pagesize,$pageshow ";
            $result = $mysqli->query($sql);
            if($result){
                if($row = $result->fetch_all(MYSQLI_ASSOC)){
                    echo json_encode($row); //返回1  查询到结果集

                    // var_dump($row) ;  //返回1  查询到结果集
                }
            }
            $mysqli->close();
        }

    }




}