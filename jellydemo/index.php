<?php
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';

$config = array('s' => ''

			);
$obj = new \Ananzu\Redis\RedisStore($config);

var_dump($obj->set());

