<?php
// 1. 创建swoole 默认创建的是一个同步的阻塞tcp服务
$host = "0.0.0.0"; // 0.0.0.0 代表接听所有
// 默认是tcp
$serv = new Swoole\Server($host, 9000);
// 添加配置
$serv->set([
  'heartbeat_idle_time' => 10,
  'heartbeat_check_interval' => 3,
]);
// 2. 注册事件
$serv->on('Start', function($serv) use($host){
    echo "启动swoole 监听的信息tcp:$host:9000\n";
});

//监听连接进入事件
$serv->on('Connect', function ($serv, $fd) {
    echo "Client: 连接成功.\n";
});

//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: ".$data);
});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "断开连接.\n";
});
// 3. 启动服务器
// 阻塞
$serv->start(); // 阻塞与非阻塞
