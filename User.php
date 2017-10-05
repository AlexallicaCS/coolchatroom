<?php
require_once("./Connection.php");

class User {

	private $userId;
	private $userName;
	private $userRole;

	public function __construct($username,$password) {
		
		//If User authenticated successfully, $userId and $userName are set
		$this->authenticateUser($username,$password);
		
		//For purposes of this project - Quick and Dirty Setters
		if ($this->userId != 0) {	
			if ($this->userId == 1) {	
				$this->setUserRole("admin");
			} else {
				$this->setUserRole("regular");
			}
		}
		
	}

	public function getUserId() {
		return $this->userId;		
	}
	
	public function getUserName() {
		return $this->userName;		
	}
	
	public function setUserRole($role) {
		$this->userRole = $role;
	}
	
	public function getUserRole() {
		return $this->userRole;
	}
	
	private function authenticateUser($username,$password) {

		$conn = new Connection();
		
		$mysqli = $conn->getConnectionString();
		
		//SQL Injection Prevention
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		
		$sql = "SELECT user_id, name FROM users WHERE name='$username' AND password = SHA1('$password')";
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (mysqli_num_rows ($result) == 1)
		{
			$this->userId = $row['user_id'];
			$this->userName = $row['name'];
			
		} else {
			
			$this->userId = "0";
			$this->userName = "Guest";
			
		}	
	}
	
	private function createUser() {
		//beyond scope
	}

}
?>