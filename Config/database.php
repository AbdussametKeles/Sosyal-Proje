<?php 

class Database{

	private $host = "localhost";
	private $db_name = "antiasosyaldb";
	private $username = "root";
	private $password = "01233210";
	public $conn;

	public function getConnection(){

		$this->conn = null;
		try{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
			$this->conn->exec("set name utf8");
		}catch(PDOException $e){

			echo "Veritabanı bağlantı  hatası".$e->getMessage();

		}
		return $this->conn;
	}

}

?>