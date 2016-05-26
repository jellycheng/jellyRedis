<?php

header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';
require 'fun.php';
putenv("DB_REDIS_DEFAULT_HOST=10.59.72.31");

//从队列中取数据
$data = \JellyRedis\Redis\RedisQueue::getQueue("house_queue", "house");
echo $data .PHP_EOL;


$data = \JellyRedis\Redis\RedisQueue::getQueue("house_queue", "house");
echo $data .PHP_EOL;

//不存在的队列 demo
$data = \JellyRedis\Redis\RedisQueue::getQueue("no_house_queue", "no_housess");
var_dump($data);
$data = \JellyRedis\Redis\RedisQueue::getQueue("house_queue", "no_housess");
var_dump($data);
