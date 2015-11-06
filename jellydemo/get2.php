<?php
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';

$res = \Ananzu\Redis\Redis::get("auth", "key1");
var_dump($res); 