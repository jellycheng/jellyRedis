<?php

header("Content-type: text/html; charset=utf-8");
require './vendor/autoload.php';


//备注： 所有方法的第1个参数一定是业务组代号，如果业务组代号不存在或者其它参数错误，均返回空
$res = \Ananzu\Redis\Redis::get();
var_dump($res);echo "<br>";
$res = \Ananzu\Redis\Redis::set("group", "key1", "val1");

var_dump($res);
