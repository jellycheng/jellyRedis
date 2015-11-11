<?php
namespace Ananzu\Redis;
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 空对象，什么也不做
 */
class EmptyObj {


	public function __call($method, $args) {

		return "";
	}



}