<?php
namespace Models;
use PDO;

class Sql {
	protected $db;
	
	public function __construct(){	
		$this->db = new PDO('mysql:host=localhost;dbname=php1course', 'root', '');
		$this->db->exec('SET NAMES UTF8');
 	
		
	}
	public function query($sql, $params = []){
		$query = $this->db->prepare($sql);
		$query->execute($params);
		$this->checkError($query);

		return $query;
	}

	protected function checkError($query){
		$info = $query->errorInfo();
			
		if($info[0] != PDO::ERR_NONE){
			echo $info[2];
			exit();
		}
	}

		public function lastInsertId(){
		return $this->db->lastInsertId();
	}

	function dbConnectEdit($sql, $params = []){
		
		
	}
}