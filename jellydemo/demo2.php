<?php
header("Content-type: text/html; charset=utf-8");
require dirname(__DIR__) . '/vendor/autoload.php';


$res = \Ananzu\Redis\Redis::set("pay", "key1", "val1");
var_dump($res);

$res = \Ananzu\Redis\Redis::get("pay", "key1");
var_dump($res); //val1

