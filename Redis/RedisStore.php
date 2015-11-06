<?php

namespace Ananzu\Redis;

/**
* 
*/
class RedisStore
{
	protected $config;
	protected $redis; //redis对象

	/**
	'host'=>'10.59.72.31',
	'port'=>'6379',
	'database'=>0,
	'prefix'=>'aaz:pay:',
	'desc'=>'支付模块业务'
	*/
	function __construct($config)
	{
		$this->config = $config;
		$host = (isset($config['host']) && $config['host'])?$config['host']:'127.0.0.1';
		$port = (isset($config['port']) && $config['port'])?$config['port']:'6379';
		$this->redis  = new Redis;
        if (!$this->redis->connect($host, $port)) {

        	//上报监控并写log，但绝对不能跑异常，否则其它业务无法进行 todo

        	//产生空对象，保证业务正常,并注意空对像的所有方法全是返回空,表示redis中没有存数据
        	$this->redis = new emptyObj();
        }

	}


	public function __call($method, $args) {
		echo $method;
		var_dump($param);
		switch (count($args))
		{
			case 0:
				return $this->redis->$method();

			case 1:
				return $this->redis->$method($args[0]);

			case 2:
				return $this->redis->$method($args[0], $args[1]);

			case 3:
				return $this->redis->$method($args[0], $args[1], $args[2]);

			case 4:
				return $this->redis->$method($args[0], $args[1], $args[2], $args[3]);

			default:
				return call_user_func_array(array($this->redis, $method), $args);
		}
	}


}

