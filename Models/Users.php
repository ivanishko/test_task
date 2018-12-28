<?php

namespace Models;

class Users{
	protected $sql;
	protected $lastError;

	public function __construct(){
		$this->sql = Sql::instance();
		$this->lastError = '';
	}

	public function one($id){
		$query = $this->sql->query("SELECT * FROM users WHERE id_user=:id", ['id' => $id]);
		return $query->fetch();
	}
}