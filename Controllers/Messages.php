<?php

namespace Controllers;

use Models\Messages as Model;

class Messages extends Client{
	protected $model;

	public function __construct(){
		parent::__construct();
		$this->model = new Model();
	}

	public function action_index(){
		$messages = $this->model->all();

		$templateName = (($_GET['view'] ?? '') == 'table') ? 'v_table' : 'v_index';

		$this->title = 'Главная';

		$this->content = $this->template($templateName, [
			'messages' => $messages
		]);
	}


	public function action_one()
	{
		$id = $this->params[2] ?? '';

		$message = $this->model->one($id);

		if($message === false){
			$this->page404();
			return;
		}
	
		/* ... много кода */

		$this->title = 'Просмотр сообщения';
		$this->content = $this->template('v_message', [
			'message' => $message
		]);
	}

	public function action_add(){
		

		if(count($_POST) > 0){
			$user = trim($_POST['user']);
			$email = trim($_POST['email']);
			$text = trim($_POST['text']);

			$id = $this->model->add($user, $email, $text);

			if($id === false){
				//$msg = $mMessages->lastError();
			}
			else{
				header('Location: ' . ROOT . 'messages');
				exit();
			}
		}
		else{
			$user = '';
			$email = '';
			$text = '';
		}

		$this->title = 'Добавление статьи';

		$this->content = $this->template('v_add', [
			'user' => $user,
			'text' => $text,
			'email' => $email
		]);
	}

	public function action_delete(){
		$this->redirectIfNotAuth();

		$id = (int)$this->params[2];

		if($id == 0){
			exit('....');
		}

		if($this->model->delete($id)){
			header('Location: ' . ROOT);
			exit();
		}
		else{
			$this->page404();
		}
	}
}