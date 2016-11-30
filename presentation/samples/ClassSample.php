<?php

interface SampleInterface {
	public function abstractMethod();
}

class SampleClass implements SampleInterface {

	public function instanceMethod() {
		echo "This is an instance method<br>";
	}

	public function abstractMethod() {
		echo "This is an implementation of SampleInterface's abstract function<br>";
	}

	static function staticMethod() {
		echo "This is a static method<br>";
	}
}

class SampleChildClass extends SampleClass {
	private $str;

	public function __construct($string) {
		$this->str = $string;
	}

	public function instanceMethod() {
		parent::instanceMethod();

		$numArgs = func_num_args();

		if ($numArgs == 0) {
			echo "Overridden instance method<br>str=".$this->str."<br>";
		} else if ($numArgs > 0) {
			echo "Overridden instance method<br>str=".func_get_arg(0)."<br>";
		}
	}
}

$object1 = new SampleClass();
$object2 = new SampleChildClass("Child class");

$object1->instanceMethod();
$object1->abstractMethod();

$object2->instanceMethod();
$object2->instanceMethod("Argument");
$object2->abstractMethod();
