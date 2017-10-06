<?php

require_once("./connection.php");

class Chatroom {
	
	private $chatRoomId;
	private $chatRoomName;
	private $chatRoomUsers;
	private $numberOfNewMessages;
	
	public function __construct($chatRoomName) {
			
		$this->chatRoomName = $chatRoomName;
		$this->chatRoomUsers = array();
			
	}
	
	public function isActive() {
		return $this->active;
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
	
	public function addUser($userId) {
		
		
		
		
		
	}
	
	public function removeUser($userId) {
		
	}
	
}
?>