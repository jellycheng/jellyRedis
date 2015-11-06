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

	//获取指定组的redis对象
	public static function getInstance($group) {

		if(empty(static::$config)) {
			static::$config = include __DIR__ . '/config.demo.php';
		}

		if(!isset(static::$config[$group])) {
			return new EmptyObj();
		}

		$config = static::$config[$group];
		$host = (isset($config['host']) && $config['host'])?$config['host']:'127.0.0.1';
		$port = (isset($config['port']) && $config['port'])?$config['port']:'6379';
		$database = (isset($config['database']) && $config['database'])?$config['database']:0;
		
		$tmpKey = md5($host.$port);
		if(isset(static::$redisInstance[$tmpKey]) && is_object(static::$redisInstance[$tmpKey])) {
			echo "aaa===1";
			if($database!=static::$redisInstance[$tmpKey]->getLastDatabase()) {
				$b = static::$redisInstance[$tmpKey]->select($database);
				if($b) {
					echo "ok1";
					static::$redisInstance[$tmpKey]->setLastDatabase($database);
				}
			}
			return static::$redisInstance[$tmpKey];
		}
		echo "bbb===2";
		static::$redisInstance[$tmpKey] = new RedisStore(static::$config[$group]);
		if($database!=static::$redisInstance[$tmpKey]->getLastDatabase()) {
			$b = static::$redisInstance[$tmpKey]->select($database);
			if($b) {
				echo "ok22";
				static::$redisInstance[$tmpKey]->setLastDatabase($database);
			}
		}
		return static::$redisInstance[$tmpKey];

	}


	protected static function getKeyPrefix($group) {
		if(!isset(static::$config[$group])) {
			return '';
		}
		$config = static::$config[$group];
		if(isset($config['prefix'])) {
			return $config['prefix'];
		}
		return '';
	}


	

	//$res = \Ananzu\Redis\Redis::set("group", "key1", "val1");  只支持带key的命令哦，不支持MONITOR，select，FLUSHALL，SHUTDOWN等命令
	public static function __callStatic($method, $args)
	{
		$res = '';
		if(!count($args)) {
			return $res;
		}
		$groupName = $args[0];
		$instance = static::getInstance($groupName);
		array_shift($args);
		$i = count($args);
		if($i>0) {
			//有参数
			$args[0] = static::getKeyPrefix($groupName) . $args[0];
		}
		var_dump($args);
		switch ($i)
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
