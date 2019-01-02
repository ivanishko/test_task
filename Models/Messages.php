<?php

namespace Models;

class Messages{
	protected $sql;
	protected $lastError;

	public function __construct(){
		$this->sql = Sql::instance();
		$this->lastError = '';
	}

	public function all(){

		return $this->sql->select("SELECT * FROM tasks ORDER BY task_id DESC");
	}

	public function one($id){
	
		$query = $this->sql->query("SELECT * FROM tasks WHERE task_id=:id", ['id' => $id]);

		return $query->fetch();
	}



	public function edit($id, $data){
		return $this->sql->update('tasks', 	$data,'task_id:=:id', ['id' => $id]);
	}


	public function add($user, $email, $text){
		if(!$this->validation($user, $email, $text)){
			return false;
		}

		return $this->sql->insert('tasks', [
			'user' => $user,
			'email' => $email,
			'text' => $text
		]);
	}

	public function delete($id){
		 $this->sql->delete('tasks', 'task_id = :id', [
				'id' => $id,
			]);

		return true;/*$query->rowCount() > 0;*/
	}

	public function lastError(){
		return $this->lastError;
	}

	protected function validation($user, $email, $text){
		$error = true;

		if($user == '' || $email == '' || $text == ''){
			$this->lastError = 'заполните все поля';
		}
		elseif(mb_strlen($user, 'UTF8') > 32){
			$this->lastError = 'имя не больше 32 символов';
		}
		elseif(mb_strlen($text, 'UTF8') > 140){
			$this->lastError = 'сообщение не больше 140 символов';
		}
		else{
			$error = false;
		}

		return !$error;
	}
}