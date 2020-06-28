<?php
$client = new swoole_client(SWOOLE_SOCK_UDP);
$client->sendTo('127.0.0.1', 9000, 'upd');
// 接收服务端信息
$data = $client->recv();
var_dump($data);
echo 'oo';
