<?php

require_once("./Connection.php");
require_once("./Message.php");

class Chatroom {
	
	private $chatRoomId;
	private $chatRoomName;
	private $chatRoomUsers;
	private $numberOfNewMessages;
	
	public function __construct($chatRoomName, $userId) {
			
		$this->chatRoomName = $chatRoomName;
		$this->chatRoomUsers = array();
		$this->addUser($userId);
		
		//Stores in database and at the same time getting the generated Id
		$this->setChatRoomId();
		
		
	}
	
	public function getNumberOfChatRooms() {
		return count($chatrooms);
	}
	
	public function getChatRoomId() {
		return $this->chatRoomId;
	}
	
	public function setChatRoomId() {
		
		$conn = new Connection();
		
		$mysqli = $conn->getConnectionString();
		
		$sql = "INSERT INTO chatrooms VALUES(NULL,'" . $this->chatRoomName . "','" . json_encode($this->chatRoomUsers) . "', NOW())";
		$ins = mysqli_query($mysqli, $sql);
		
		$this->chatRoomId = $mysqli->insert_id;
		
		$conn->disconnect();
				
	}
	
	public function getNumberOfNewMessages() {
		return $this->$numberOfNewMessages;
	}
	
	/*
	 *
	 * @returns list of chat room users
	 *
	 */
	public function getAllUsers() {
		return  $this->chatRoomUsers;
	}
	
	public function getNumberOfUsers() {
		return count($this->chatRoomUsers);
	}
	
	public function addUser($userId) {
		
		array_push($this->chatRoomUsers, $userId);
		
		$conn = new Connection();
		
		$mysqli = $conn->getConnectionString();
		
		//SQL Injection Prevention
		$newUserId = mysqli_real_escape_string($mysqli, $userId);
				
		$sql = "UPDATE chatrooms SET users=" . json_encode($this->chatRoomUsers) . "WHERE chatroom_id=" . $this->chatRoomId;
		$updt = mysqli_query($mysqli, $sql);
		
		$conn->disconnect();		
		
	}
	
	public function removeUser($userId) {
		
		if (in_array($userId,$this->chatRoomUsers)) {
		
			$removeIdPos = array_search($userId);
			
			unset($this->chatRoomUsers[$removeIdPos]);
						
		}
		
	}
	
	
	
}
?>