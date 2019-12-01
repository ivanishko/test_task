<?php

namespace Models;

use PDO;

class Sql{
	protected static $instance;
	protected $db;

	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}

	protected function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=beejeetest', 'root', '');
		$this->db->exec('SET NAMES UTF8');
	}

	public function select($sql, $params = []){
	
		
		return $this->query($sql, $params)->fetchAll();
	}


	public function insert($table, $data){

		$keys = [];
		$masks = [];

		foreach($data as $key => $value){
			$keys[] = $key;
			$masks[] = ":$key";
		}


		$keyStr = implode(', ', $keys);
		$valuesStr = implode(', ', $masks);

		$sql = "INSERT INTO $table ($keyStr) VALUES ($valuesStr)";
		$this->query($sql, $data);
		return $this->db->lastInsertId();

	}

	public function delete($table, $where, $whereParams = [], $limit = 1){
        $sql = "DELETE FROM $table WHERE $where LIMIT $limit";
        $query = $this->query($sql, $whereParams);
        return $query->rowCount();
	}

	public function update($table, $data, $where, $whereParams = []){
        $pairs = [];

        foreach ($data as $key =>$value) {
            $pairs[] = "$key=:$key";
	    }

	    $pairStr = implode(',', $pairs);

	    $sql = "UPDATE $table SET $pairStr WHERE task_id = :id";
	    echo $sql;

	    $params = array_merge($data, $whereParams);
	    $query = $this->query($sql, $params);
	    return $query->rowCount();
	}

	public function query($sql, $params = []){
		$query = $this->db->prepare($sql);
		$query->execute($params);

		$this->checkError($query);

		return $query;
	}

	public function lastInsertId(){
		return $this->db->lastInsertId();
	}

	protected function checkError($query){
		$info = $query->errorInfo();

		if($info[0] != PDO::ERR_NONE){
			exit($info[2]);
		}
	}

}