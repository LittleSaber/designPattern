<?php 
/**
 * 观察者模式演示，这里我通过一个盗窃团伙作案的例子来演示，盗窃团伙分为放风人和盗窃人
 */

//定一个实现观察者模式的基类
class EventGenerator
{
	//存储要通知人的变量，也就是盗窃人，因为是多个人，所以使用一个数组
	public $observers = array();

	//盗窃之前分配好谁去盗窃，并规定好，如果警察来了我要通知这些人
	public function addObserver($observer)
	{
		$this->observers[] = $observer;
	}
	//规定警察来了放风人会通过notify这个方法来通知大家
	public function notify()
	{
		//因为我要通知所有的盗窃人，所以需要循环
		foreach($this->observers as $observer)
		{
			$observer->run();
		}
	}
}

//下面我要给每一个盗窃人配备一个run，因为他们需要通过它来传递信息啊
//这里我通过一个借口实现，如果是盗窃人就必须带上run，要不然被抓了可就不好了哦
interface Observer
{
	function run();
}

//定义放风人，放风人的功能可就多了，他是这个团队的领导，我规定谁可以参加这次活动，而且我亲自放风
class Event extends EventGenerator
{

	//定义警察来了的时候通知所有人
	public function trigger()
	{
		echo "警察来了，大家快跑啊，我先撤了<br/>\n";
		$this->notify();
	}
}

//好了，现在我们开始这次盗窃活动
//放风人
$event = new Event();
//盗窃人
class Observer1 implements Observer
{
	public function run()
	{
		echo "老大！我是Observer1，我收到你的通知了，马上撤退<br/>\n";
	}
}
class Observer2 implements Observer
{
	public function run()
	{
		echo "老大！我是Observer2，我收到你的通知了，我再偷点儿马上就撤<br/>\n";
	}
}
//放风人记下来，警察来了的时候要通知谁
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
//这时候开始抢劫................
//警察来了，老大开始通知大家撤退
$event->trigger();






?>