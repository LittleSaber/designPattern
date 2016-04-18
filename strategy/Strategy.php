<?php 
define('BASEDIR', __DIR__);
require 'Config.php';
spl_autoload_register('Config::autoload');
class Strategy {

	protected $_strategy;
	function index() {
		echo 'AD:';
		$this->_strategy->showAd();
		echo '<hr/>';
		echo 'Category:';
		$this->_strategy->showCategory();
	}

	function setStrategy($strategy) {
		$this->_strategy = $strategy;
	}
}

$strategy = new Strategy();

if(isset($_GET['female'])) {
	$other = new FemaleUserStrategy();
}else {
	$other = new MaleUserStrategy();
}
$strategy->setStrategy($other);

$strategy->index();
?>