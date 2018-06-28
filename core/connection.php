<?php namespace config;
	class Connection{ // Establece una conexión con la base de datos.
		private $access= array("host" => "localhost", "user" => "root", "pass" => "", "db" => "aviator");
		private $conn;

		public function __construct(){
			$this->conn= new \mysqli($this->access['host'], $this->access['user'], $this->access['pass'], $this->access['db']);
		}
		public function simpleQuery($sql){
			$this->conn->query($sql);
		}
		public function returnQuery($sql){
			$data = $this->conn->query($sql);
			return $data;
		}
	}
?>
