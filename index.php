<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require __DIR__ . '/vendor/autoload.php';


//备注： 所有方法的第1个参数一定是业务组代号，如果业务组代号不存在或者其它参数错误，均返回空
$res = \JellyRedis\Redis\Redis::get(); //参数错误写法，但不会出现错误，返回空
echo "参数错误写法，但不会出现错误，返回空: ";
var_dump($res); //一定是空

echo "<br>";

echo "传入不存在的组，也不会直接影响业务，结果一直返回空： ";
$res = \JellyRedis\Redis\Redis::set("group", "key1", "val1");
var_dump($res);echo "<br>";

//获取不存在组的情况，一直返回空
echo "获取不存在组的情况，一直返回空: ";
$res = \JellyRedis\Redis\Redis::get("group", "key1");
var_dump($res); echo "<br>";


//获取缓存用户组信息
$res = \JellyRedis\Redis\Redis::get("user", "userinfo:123456");
var_dump($res); echo "<br>";

echo "dbsize: " . \JellyRedis\Redis\Redis::dbsize('user');
echo "<br>";



