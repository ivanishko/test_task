<?php

namespace Controllers;

use Models\Tasks as Model;

class Tasks extends Client{
	protected $model;

	public function __construct(){
		parent::__construct();
		$this->model = new Model();
	}

	public function action_index(){
		$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;	
		$on_page = 3;
		$shift = ($page - 1) * $on_page;

		$res = $this->model->selectCount();
		$count = (int)$res['all_articles'];
		$pages = ceil($count / $on_page);

		
		//var_dump($count);	
		
		//var_dump($pages);
		//var_dump($pages);

		$tasks = $this->model->all( $on_page,$shift);

		$templateName = (($_GET['view'] ?? '') == 'table') ? 'v_table' : 'v_index';

		$this->title = 'Главная';


		$this->content = $this->template($templateName, [
			'tasks' => $tasks,
			'count' => $count,
			'page' => $page, 
			'pages' => $pages
			
		]);

		
	}


	public function action_one()
	{
		$id = $this->params[2] ?? '';

		$task = $this->model->one($id);

		if($message === false){
			$this->page404();
			return;
		}
	
		/* ... много кода */

		$this->title = 'Просмотр сообщения';
		$this->content = $this->template('v_task', [
			'message' => $message
		]);
	}



	public function action_edit()

	{	
		$this->redirectIfNotAuth();
		$id = $this->params[2] ?? '';

		$task = $this->model->one($id);


		if(count($_POST) > 0){

			$data['status'] = ( isset($_POST['status']) && $_POST['status'] == 'on' ) ? 1 : null;
			
			$data['text'] = trim($_POST['text']);



			$query = $this->model->edit($id, $data);

			if($query === false){
				$msg = $this->lastError();
				//$errors = $this->model->errors();
			}
			else{
				header('Location: ' . ROOT . 'tasks');
				exit();
			}
		}

		else{
	

		$this->title = 'Редактирование сообщения';
		$this->content = $this->template('v_edit', [
			'task' => $task
		]);
	}

}


	public function action_add(){
		

		if(count($_POST) > 0){
			$user = trim($_POST['user']);
			$email = trim($_POST['email']);
			$text = trim($_POST['text']);

			$id = $this->model->add($user, $email, $text);

			if($id === false){
				$msg = $this->lastError();
				//$errors = $this->model->errors();
			}
			else{
				header('Location: ' . ROOT . 'tasks');
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