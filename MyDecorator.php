<?php 

class Show
{
	//存储装饰器
	protected $decorator = array();
	public function Show_content($content = null)
	{
		//装饰器before
		$this->beforeShow();
		echo $content;
		$this->afterShow();
	}

	//添加装饰器
	public function Add_decorator(Decorator $decorator)
	{
		$this->decorator[] = $decorator;
	}

	public function beforeShow()
	{
		foreach($this->decorator as $decorator)
		{
			$decorator->beforeShow();
		}
	}
	public function afterShow()
	{
		$this->decorator = array_reverse($this->decorator);
		foreach($this->decorator as $decorator)
		{
			$decorator->afterShow();
		}
	}

}
//定义装饰器接口
interface Decorator
{
	function beforeShow();
	function afterShow();
}

class FirstBlood implements Decorator
{
	public function beforeShow()
	{
		echo "<div style='color:red'>";
	}
	public function afterShow()
	{
		echo "</div>";
	}
}
$show = new Show();
//添加装饰器
$show->Add_decorator(new FirstBlood);
$show->show_content('Hello World!');
?>