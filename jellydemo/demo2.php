<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';


$res = \JellyRedis\Redis\Redis::set("pay", "key1", "val1");
var_dump($res);

$res = \JellyRedis\Redis\Redis::get("pay", "key1");
var_dump($res); //val1

$res = \JellyRedis\Redis\Redis::set("auth", "key1", "你好auth db1");
var_dump($res); 

$res = \JellyRedis\Redis\Redis::get("auth", "key1");
var_dump($res); 
