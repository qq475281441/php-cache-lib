<?php

namespace lib\facade;

use lib\Cache;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 2019/2/23
 * Time: 10:59
 */

/**
 * Class CacheFacade
 * @package lib\facade
 *
 * @method void rm($name) static
 * @method void clear($tag) static
 * @method void set($name, $value, $expire) static
 * @method void tag($name, $keys, $overlay) static
 * @method void get($name) static
 * @method void has($name) static
 */
class CacheFacade
{
	protected static $type = ['rm', 'clear', 'set', 'get', 'has', 'tag'];
	
	public static function __callStatic($name, $arguments)
	{
		if (in_array($name, self::$type)) {
			$object = new Cache();
			return call_user_func_array([$object, $name], $arguments);
		}
	}
	
	public static function __call($name, $arguments)
	{
		if (in_array($name, self::$type)) {
			$object = new Cache();
			return call_user_func_array([$object, $name], $arguments);
		}
	}
	
	public static function getInstance()
	{
		return new static();
	}
}