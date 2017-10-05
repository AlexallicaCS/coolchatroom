<?php

class Connection {
	
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	private $mysqli;
		
	public function __construct() {
		$this->host = 'localhost';
		$this->dbusername = 'root';
		$this->password = '';
		$this->dbname = 'db_chatroom';
		
		$this->mysqli = mysqli_connect($this->host,$this->dbusername,$this->password,$this->dbname);
		
		if ($this->mysqli->connect_error) {
			die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
		}
	}
	
	public function getConnectionString() {
		return $this->mysqli;
	}
		
	public function disconnect() {
		$this->close();
	}
	
}
?>