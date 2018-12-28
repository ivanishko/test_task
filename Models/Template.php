<?php

namespace Models;

class Template{
	public static function render($fname, $params = []){
		extract($params);
		ob_start();
		include("view/{$fname}.php");
		return ob_get_clean();
	}
}
