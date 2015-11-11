<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';

//设置用户信息
$userinfo = array('userid' => 88,'phone'=>'13712345678', 'nickname'=>'租八借' );
$bool = \Ananzu\Redis\Redis::set("user", "userinfo:".$userinfo['userid'], json_encode($userinfo));
var_export($bool);echo "<br>";

echo "aaz:user:userinfo:".$userinfo['userid']."的有效期（-1表永久,-2key不存在，单位秒）： ".\Ananzu\Redis\Redis::ttl('user', 'userinfo:' . $userinfo['userid']);
echo "<br>";


echo "aaz:user:abc的有效期（-1表永久,-2key不存在，单位秒）： ".\Ananzu\Redis\Redis::ttl('user', 'abc');
echo "<br>";

$i = mt_rand(1000, 9999);
//设置有效期 EXPIRE key seconds
\Ananzu\Redis\Redis::set('user', 'jelly' . $i, "jelly nickname");
\Ananzu\Redis\Redis::EXPIRE('user', 'jelly' . $i, 90);
echo "jelly" . $i . "的有效期（-1表永久,-2key不存在，单位秒）： ".\Ananzu\Redis\Redis::ttl('user', 'jelly' . $i);
echo "<br>";


echo "dbsize: " . \Ananzu\Redis\Redis::dbsize('user');
echo "<br>";

$obj = \Ananzu\Redis\Redis::getInstance('user');
$keys = $obj->keys('*');
echo "<pre>user组服务器，所有key：";
var_export($keys);
