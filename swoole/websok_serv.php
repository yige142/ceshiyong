<?php
$dir=dirname(__FILE__);
require_once "$dir/BaseSql.php";


//创建websocket服务器对象，监听0.0.0.0:9505端口
$ws = new swoole_websocket_server("0.0.0.0", 9502);


//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    //var_dump($request->fd, $request->get, $request->server);
    //相当于记录一个日志吧，有连接时间和连接ip
    echo $request->fd.'-----time:'.date("Y-m-d H:i:s",$request->server['request_time']).'--IP--'.$request->server['remote_addr'].'-----';
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    $info= $frame->data."}";
    $b=json_decode($info,true);

    //将json 数据转换为数组
    var_dump($b);
    $creat_time=time();
    $base=new BaseSql();
    //连接数据库 tt
    $mysqli = $base->mysqlConn('tt');

    //监听到信息存入数据库
    $sql="insert into danmu (name,context,create_time) VALUES ('{$b['user']}','{$b['text']}','{$creat_time}')";

    $result = $mysqli->query($sql);
    echo $result;

    //记录收到的消息，可以写到日志文件中
    echo "Message: {$frame->data}}\n";
    echo "fd: {$frame->fd}";
    //遍历所有连接，循环广播
    foreach($ws->connections as $fd){
        //如果是某个客户端，自己发的则加上isnew属性，否则不加
        if($frame->fd == $fd){
            $ws->push($frame->fd, $frame->data.',"isnew":""');
        }else{
            $ws->push($fd, "{$frame->data}");
        }
    }


});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();