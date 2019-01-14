<?php

	session_start();

	include_once 'autoload.php';
	include_once 'config.php';

	$paramsTmp = explode('/', $_GET['queryurl'] ?? '');
	$params = [];

	foreach($paramsTmp as $p){
		if($p !== ''){
			$params[] = $p;
		}
	}

	$controller = ucfirst($params[0] ?? 'tasks');

	$action = 'action_' . ($params[1] ?? 'index');

	$id = $params[2] ?? '';
	
	$cname = "Controllers\\$controller";

	if(!class_exists($cname)){
		$cname = "Controllers\\Pages";
		$action = 'action_404';
	}


	$c = new $cname();
	$c->load($params);
	$c->$action($id);
	$html = $c->render();
	echo $html;
