<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';

//设置用户信息
$userinfo = array('userid' => 123456,'phone'=>'13712345678', 'nickname'=>'租八借' );
$bool = \Ananzu\Redis\Redis::set("user", "userinfo:123456", json_encode($userinfo));

//获取缓存用户组信息
$res = \Ananzu\Redis\Redis::get("user", "userinfo:123456");
var_dump($res); echo "<br>";
