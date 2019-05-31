<?php

class Sql extends PDO {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	}

	private function setParams($statment, $parameters = array()){

		foreach ($parameters as $key => $value) {
			$this->setParam($statment, $key, $value);
		}
	}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}


	public function query($rawquery, $params = array()){

		$stmt = $this->conn->prepare($rawquery);

       // echo json_encode($stmt);
		$this->setParams($stmt, $params);
        //echo json_encode($stmt);

        $stmt->execute();

		return $stmt;
	}


	public function select($rawquery, $params = array()):array
	{


		$stmt = $this->query($rawquery, $params);

		//echo json_encode($stmt);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}



?>