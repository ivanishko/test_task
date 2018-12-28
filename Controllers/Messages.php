<?php

namespace Controllers;

use Models\Messages as Model;
use Models\Template;

class Messages extends Client{

	public function action_index(){
		$mMessages = new Model();
		$tasks = $mMessages->all();

		$templateName = (($_GET['view'] ?? '') == 'table') ? 'v_table' : 'v_index';

		$this->title = 'Главная';

		$this->content = Template::render($templateName, [
			'tasks' => $tasks
		]);
	}

	public function action_one(){
		$id = $this->params[2] ?? '';

		$mMessages = new Model();
		$message = $mMessages->one($id);

		if($message === false){
			$this->title = 'Страница не найдена';
			$this->content = Template::render('v_404');
		}
		else{
			$this->title = 'Просмотр сообщения';
			$this->content = Template::render('v_message', [
				'message' => $message
			]);
		}
	}

	public function action_add(){
		if(count($_POST) > 0){
			$name = trim($_POST['name']);
			$text = trim($_POST['text']);

			$mMessages = new Model();
			$id = $mMessages->add($name, $text);

			if($id === false){
				$msg = $mMessages->lastError();
			}
			else{
				header('Location: ' . ROOT . 'message/' . $id);
				exit();
			}
		}
		else{
			$name = '';
			$text = '';
			$msg = '';
		}

		$this->title = 'Добавление статьи';

		$this->content = Template::render('v_add', [
			'name' => $name,
			'text' => $text,
			'msg' => $msg
		]);
	}

}