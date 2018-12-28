<?php

namespace Models;

class Messages{
	protected $sql;
	protected $lastError;

	public function __construct(){
		$this->sql = new Sql();
		$this->lastError = '';
	}

	public function all(){
		$query = $this->sql->query("SELECT * FROM tasks ORDER BY date_create DESC");
		return $query->fetchAll();
	}

	public function one($id_task){
		$query = $this->sql->query("SELECT * FROM tasks WHERE id_task=:id_task", ['id' => $id_task]);
		return $query->fetch();
	}

	public function add($email, $user, $text){
		if(!$this->validation($email, $user, $text)){
			return false;
		}

		$query = $this->sql->query("INSERT INTO tasks (email, user, text) VALUES (:e, :u, :t)", [
				'e' => $email,
				'u' => $user,
				't' => $text,

			]);

		return $this->sql->lastInsertId();
	}

	public function lastError(){
		return $this->lastError;
	}

	protected function validation($email, $user, $text){
		$error = true;

		if($email == '' || $user == '' || $text == ''){
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