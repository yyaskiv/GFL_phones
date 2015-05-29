<?php
class ManufactureA {
	public function keyAction($key) {
		return "KeyAction(A) - ".$key;
	}
}

class ManufactureB {
	public function keyAction($key) {
		return "KeyAction(B) - ".$key;
	}
}

abstract class Phone {
	protected $manufacture;

	public function __construct($m){
		$class= "Manufacture".strtoupper($m);
		$this->manufacture = new $class();
	}

	public function keyAction($key) {
		return $this->manufacture->keyAction($key);
	}
}

class KeybPhone extends Phone {
	public function keyPress($key){
		echo $this->keyAction($key);
	}
}

class SensPhone extends Phone {
	public function tap($key){
		echo $this->keyAction($key);
	}
}


$a = new KeybPhone("a");
$a->keyPress("B");

$b = new SensPhone("b");
$b->tap("C");
