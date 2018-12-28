<?php

namespace Models;

class Template{
	protected static $instance;
	protected $globalVars;

	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}

	protected function __construct(){
		$this->globalVars = [];
	}

	public function addGlobal($name, $value){
		$this->globalVars[$name] = $value;
	}

	public function render($fname, $params = []){
		extract($this->globalVars);
		extract($params);
		ob_start();
		include("view/{$fname}.php");
		return ob_get_clean();
	}
}
