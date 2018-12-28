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
		$query = $this->sql->query("SELECT * FROM messages ORDER BY dt DESC");
		return $query->fetchAll();
	}

	public function one($id){
		$query = $this->sql->query("SELECT * FROM messages WHERE id_message=:id", ['id' => $id]);
		return $query->fetch();
	}

	public function add($name, $text){
		if(!$this->validation($name, $text)){
			return false;
		}

		$query = $this->sql->query("INSERT INTO messages (name, text) VALUES (:n, :t)", [
				'n' => $name,
				't' => $text
			]);

		return $this->sql->lastInsertId();
	}

	public function lastError(){
		return $this->lastError;
	}

	protected function validation($name, $text){
		$error = true;

		if($name == '' || $text == ''){
			$this->lastError = 'заполните все поля';
		}
		elseif(mb_strlen($name, 'UTF8') > 32){
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