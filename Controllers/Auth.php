<?php

namespace Controllers;

use Models\Auth as Model;

class Auth extends Client{

	public function action_login(){
		if(count($_POST) > 0){
			if(Model::login($_POST['login'], $_POST['password'], isset($_POST['remember']))){
				header('Location: ' . ROOT);
				exit();
			}

			$msg = 'Ошибка входа';
		}
		else{
			$msg = '';
		}

		$this->title = 'Вход на сайт';

		$this->content = $this->template('v_login', [
			'msg' => $msg
		]);
	}

	public function action_logout(){
		Model::logout();
		header('Location: ' . ROOT . 'auth/login');
		exit();
	}


}