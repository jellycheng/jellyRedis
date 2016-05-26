<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 
 */
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';


$config = array(
				'host'=>'10.59.72.31',
				'port'=>'6379',
			);
$obj = new \JellyRedis\Redis\RedisStore($config);

echo $obj->get('abc');
