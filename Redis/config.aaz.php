<?php
/**
 * Author: jellycheng <42282367@qq.com>
 * Date: 2015/11/11
 * Desc: 配置参考demo
 */
/**
	array(
		'业务模块名'=>array(
					'host'=>'redis服务host，默认127.0.0.1',
					'port'=>'redis端口,默认6379',
					'database'=>redis数据库号默认0,
					'prefix'=>'该组业务redis-key前缀，注意业务前缀不要跟其它模块的prefix前缀同名，默认无',
					'desc'=>'业务描述，可填项',
			),
		'pay'=>array(
					'host'=>'10.59.72.31',
					'port'=>'6379',
					'database'=>0,
					'prefix'=>'aaz:pay:',
			),

	);
*/
if ( ! function_exists('env')) {

	function env($key, $default = null)
	{
		$value = getenv($key);

		if ($value === false) return value($default);

		switch (strtolower($value))
		{
			case 'true':
			case '(true)':
				return true;

			case 'false':
			case '(false)':
				return false;

			case 'null':
			case '(null)':
				return null;

			case 'empty':
			case '(empty)':
				return '';
		}

		return $value;
	}
}
if ( ! function_exists('value')) {
	function value($value)
	{
		return $value instanceof Closure ? $value() : $value;
	}
}
return array(
			'pay'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>2,
					'prefix'=>'aaz:pay:',
					'desc'=>'支付模块业务'
			),
			'pcauth'=>array(
					'host'=>env('DB_REDIS_USER_AUTH_HOST'),
					'port'=>env('DB_REDIS_USER_AUTH_PORT','6379'),
					'database'=>1,
					'prefix'=>'aaz:auth:',
					'desc'=>'pc登录认证模块'
			),
			'wirelessauth'=>array(
					'host'=>env('DB_REDIS_USER_AUTH_HOST'),
					'port'=>env('DB_REDIS_USER_AUTH_PORT','6379'),
					'database'=>1,
					'prefix'=>'aaz:auth:',
					'desc'=>'无线app及h5登录认证模块'
			),
			'user'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>2,
					'prefix'=>'aaz:user:',
					'desc'=>'用户信息模块'
			),
			'house'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>3,
					'prefix'=>'aaz:house:',
					'desc'=>'房源模块'
			),
			'global'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>4,
					'prefix'=>'aaz:global:',
					'desc'=>'全局通用配置模块，各个仓库共用'
			),
			'misc'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>4,
					'prefix'=>'aaz:global:',
					'desc'=>'不好归类通通放这个模块'
			),
			'weixin'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>4,
					'prefix'=>'aaz:wx:',
					'desc'=>'微信业务模块'
			),
			'admin'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>3,
					'prefix'=>'aaz:admin:',
					'desc'=>'后台业务模块'
			),
			'api'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>2,
					'prefix'=>'aaz:api:',
					'desc'=>'api仓库独有业务模块'
			),
			'pc'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>2,
					'prefix'=>'aaz:pc:',
					'desc'=>'pc网站独有业务模块'
			),
			'h5'=>array(
					'host'=>env('DB_REDIS_DEFAULT_HOST'),
					'port'=>env('DB_REDIS_DEFAULT_PORT','6379'),
					'database'=>2,
					'prefix'=>'aaz:h5:',
					'desc'=>'h5触屏网站独有业务模块'
			),
			'misc_queue'         => array(
				'host'     => env('DB_REDIS_DEFAULT_HOST'),
				'port'     => env('DB_REDIS_DEFAULT_PORT', '6379'),
				'database' => 4,
				'prefix'   => 'aaz:queue:misc:',
				'desc'     => '不好归类通通放这个模块,队列业务'
			),
			'house_queue'        => array(
				'host'     => env('DB_REDIS_DEFAULT_HOST'),
				'port'     => env('DB_REDIS_DEFAULT_PORT', '6379'),
				'database' => 4,
				'prefix'   => 'aaz:queue:house:',
				'desc'     => '房源模块,队列业务'
			),

);