<?php
	/**
	 * 策略模式是对象得行为模式，用意是对一组算法的封装。动态选择需要的算法并使用
	 * 策略模式的三个角色
	 * 1.抽象策略角色
	 * 2.具体策略角色
	 * 3.环境角色（对抽象策略角色的引用）
	 */
	//抽象策略类
	abstract class baseAgent {
		abstract function PrintPage();
	}
	//用于客户端是ie时调用的类（环境角色）
	class ieAgent extends baseAgent {
		function PrintPage() {
			return 'IE';
		}
	}
	//用于客户端不是ie时调用的类（环境角色）
	class otherAgent extends baseAgent {
		function PrintPage() {
			return 'not IE';
		}
	}
	//具体策略角色
	class Browser {
		public function call($object) {
			return $object->PrintPage();
		}
	}
	$bro = new Browser();
	echo $bro->call(new otherAgent());
	echo $bro->call(new ieAgent());
?>