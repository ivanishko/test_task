<?php

namespace Controllers;

abstract class Base{
	protected $params;

	public function __construct(){

	}

	public function load($params){
		$this->params = $params;
	}

	public abstract function render();
}