<?php
	//定义一个抽象的类，让子类去继承实现它
	abstract class Operation {
		abstract public function getValue($num1,$num2);//强烈要求子类必须实现该功能函数
	}
	/*
     * 加法类
	 */
	class OperationAdd extends Operation {
		public function getValue($num1,$num2) {
			return $num1+$num2;
		}
	}
	/*
	 * 减法类
	 */
	class OperationSub extends Operation {
		public function getValue($num1,$num2) {
			return $num1-$num2;
		}
	}
	/*
	 * 乘法类
	 */
	class OperationMul extends Operation {
		public function getValue($num1,$num2) {
			return $num1*$num2;
		}
	}
	/*
	 * 除法类
	 */
	class OperationDiv extends Operation {
		public function getValue($num1,$num2) {
			try {
				if($num2==0) {
					throw new Exception("除数不能为0");
				}else {
					return $num1/$num2;
				}
			}catch(Exception $e) {
				echo "错误信息：".$e->getMessage();
			}
		}
	}
	/*
	 * 如果我现在需要一个取余的类，只要在这里加入就好了，不用去改其他的代码
	 */
	class OperationRem extends Operation {
		public function getValue($num1,$num2) {
			return $num1%$num2;
		}
	}
	/*
	 * 工厂类
	 * 主要用来创建对象
	 * 功能：根据输入的符号就能实例化出合适的对象
	 */
	class Factory {
		public static function createObj($operate) {
			switch($operate) {
				case '+':
					return new OperationAdd();
					break;
				case '-':
					return new OperationSub();
					break;
				case '*':
					return new OperationMul();
					break;
				case '/':
					return new OperationDiv();
					break;
			}
		}
	}
	/*
	 * 测试这个设计模式
	 */
	$test = Factory::createObj('*');
	$result = $test->getValue(23,4);
	echo $result;
?>