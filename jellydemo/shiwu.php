<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';

$i = mt_rand(100, 999);
//开启事物
$multi = \Ananzu\Redis\Redis::multi('user');
//获取组的key前缀
$prefix =\Ananzu\Redis\Redis::getKeyPrefix('user');
$multi->set($prefix.'abc', '123-' . $i);
$multi->set($prefix.'xyz', '1234xyz-' . $i);
$multi->exec();

echo "事物演示完毕";
