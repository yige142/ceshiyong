<?php
//创建WebSocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server('0.0.0.0', 9502);//客户端链接成功
//$ws = new swoole_websocket_server("192.168.55.171", 9502);//客户端链接成功
//$ws = new swoole_websocket_server("127.0.0.1", 9502);//客户端链接失败


//监听WebSocket链接打开事件
$ws->on('open', function ($ws, $request) {
    //var_dump($request->fd, $request->get, $request->server);
    print_r($request);
    $ws->push($request->fd, "hello, welcome");
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    //echo "Message: {$frame->data}\n";
    print_r($frame);
    $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
    //删除已断开的客户端
    unset($ws->user_c[$fd-1]);
});
$ws->start();
