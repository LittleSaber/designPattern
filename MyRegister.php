<?php
	
//工厂模式，单例模式，注册树模式的使用

/*
 * 首先创建一个单例模式用于生产对象
 */

class Single {
	/*
	 * 定义一个变量存储对象
	 * 这里要注意，如果getInstance()方法定义为static方法
	 * 变量也要定义为static变量，因为static方法只能访问static变量
	 */
	public static $single = null;
	//定义一个私有构造方法防止外部创建对象
	private function __construct() {

	}
	//定义一个实例化对象得方法
	public static function getInstance() {
		if(self::$single instanceof self) {
			return self::$single;
		}
		self::$single = new self();
		return self::$single;
	}

}

/*
 * 创建一个工厂模式，用于使用方法来获取对象
 */
class Factory {
	public static function toNew() {
		return Single::getInstance();
	}
}

/*
 * 创建一个注册树模式将对象放到注册树上
 */

class Register {
	//定义一个二维数组用来存放对象
	protected static $objects;
	//将对象注册到树上
	public static function set($alias, $object) {
		self::$objects[$alias] = $object;
	}
	//从注册器上获取对象
	public static function get($alias) {
		return self::$objects[$alias];
	}
	//从注册树上销毁
	public static function _unset($alias) {
		unset(self::$objects[$alias]);
	}
}

//测试
Register::set('zjp', Factory::toNew());
$zjp = Register::get('zjp');
print_r($zjp);
?>