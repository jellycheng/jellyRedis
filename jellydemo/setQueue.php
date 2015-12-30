<?php

header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';
require 'fun.php';
putenv("DB_REDIS_DEFAULT_HOST=10.59.72.31");

//放入队列
$userinfo = array('userid' => 88,'phone'=>'13712345678', 'nickname'=>'租八借' );

//json_encode($userinfo)
$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", '第1次放入：abc ==sdfad');
echo $iIndex . PHP_EOL;


$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", '第2次放入：de 212 212');
echo $iIndex . PHP_EOL;

$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", '第3次放入：ghi');
echo $iIndex . PHP_EOL;

$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", 98765);
echo $iIndex . PHP_EOL;

$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", 0);
echo $iIndex . PHP_EOL;

$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", '');
echo $iIndex . PHP_EOL;

$iIndex = \Ananzu\Redis\RedisQueue::setQueue("house_queue", "house", '第7次放入：ghi');
echo $iIndex . PHP_EOL;


echo "队列长度： " . \Ananzu\Redis\RedisQueue::getQueueLen("house_queue", "house") . PHP_EOL;

echo "队列长度： " . \Ananzu\Redis\RedisQueue::getQueueLen("house_queue", "nonono") . PHP_EOL;