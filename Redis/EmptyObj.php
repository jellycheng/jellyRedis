<?php
namespace Ananzu\Redis;


class EmptyObj {





	public function __call($method, $args) {

		return "";
	}



}