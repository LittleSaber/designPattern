<?php 


class Config {
	static function autoload($class) {

		require BASEDIR.'/'.$class.'.php';
	}
}
?>