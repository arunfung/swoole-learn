<?php
// 同步客户端
$client = new swoole_client(SWOOLE_SOCK_TCP);

//连接到服务器
if (!$client->connect('127.0.0.1', 9000, 0.5))
{
    die("connect failed.");
}

function order()
{
     sleep(4);// 假设某一些操作造成时间很长
     return "order\n";
}

//向服务器发送数据
if (!$client->send(order()))
{
    die("send failed.");
}
//从服务器接收数据
$data = $client->recv();
if (!$data)
{
    die("recv failed.");
}

//关闭连接
$client->close();

// 返回结果给用户
echo '订单生成成功'."\n";
