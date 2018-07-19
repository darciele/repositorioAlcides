<?php
class Dao extends PDO{
	private $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost; dbname=cafeteria", "root", "");
	}
	public function query($sql, $params = array()){
		$stmt = $this->conn->prepare($sql);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}
	public function setParams($stmt, $params = array()){
		foreach ($params as $key => $value) {
			$this->setParam($stmt, $key, $value);
		}
	}
	public function setParam($stmt, $key, $value){
		$stmt->bindParam($key, $value);
	}

	public function select ($sql, $params = array()){
		$stmt = $this->query($sql, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>