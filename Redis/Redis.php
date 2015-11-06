<?php
namespace Ananzu\Redis;

class Redis {

	protected static $redisInstance = array();
	protected static $config = array();

	/**
		\Ananzu\Redis\Redis::setRedisConfig(array(
			'local'=>array(
					'host'=>'10.59.72.31',
					'port'=>'6379',
					'database'=>0,
					'prefix'=>'aaz:pay:',
					'desc'=>'支付模块业务'
			)));
	*/
	public static function setRedisConfig($config) {
		if(!$config || !is_array($config)) {
			return false;
		}
		static::$config = array_merge(static::$config, $config);
	}

	public static function getRedisConfig() {
		return static::$config;
	}


	protected static function getInstance($group) {
		
		if(isset(static::$redisInstance[$group]) && is_object(static::$redisInstance[$group])) {
			return static::$redisInstance[$group];
		}

		if(empty(static::$config)) {
			static::$config = include __DIR__ . '/config.demo.php';
		}

		if(!isset(static::$config[$group])) {
			return new emptyObj();
		}
		$host = (isset($config['host']) && $config['host'])?$config['host']:'127.0.0.1';
		$port = (isset($config['port']) && $config['port'])?$config['port']:'6379';
		$this->lastDatabase = (isset($config['database']) && $config['database'])?$config['database']:0;
		if(isset($config['prefix'])) {
			$this->prefixKey = $config['prefix'];
		}
		$tmpKey = $host.$port;
	
		static::$redisInstance[$group] = new RedisStore(static::$config[$group]);
		return static::$redisInstance[$group];


	}

	


	public static function __callStatic($method, $args)
	{
		$res = '';
		if(!count($args)) {
			return $res;
		}
		echo $method;
		var_dump( $args);
		$instance = static::getInstance($args[0]);
		array_shift($args);
		var_dump($args);exit;
		switch (count($args))
		{
			case 0:
				return $instance->$method();

			case 1:
				return $instance->$method($args[0]);

			case 2:
				return $instance->$method($args[0], $args[1]);

			case 3:
				return $instance->$method($args[0], $args[1], $args[2]);

			case 4:
				return $instance->$method($args[0], $args[1], $args[2], $args[3]);

			default:
				return call_user_func_array(array($instance, $method), $args);
		}


		return $res;
	}

}
