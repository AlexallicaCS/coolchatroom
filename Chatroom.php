<?php

require_once("./connection.php");

class Chatroom {
	
	private $chatRoomId;
	private $chatRoomName;
	private $chatRoomUsers;
	
	public __construct($chatRoomName) {
			
		$this->chatRoomName = $chatRoomName;
		$this->chatRoomUsers = array();
			
	}	
	public createChatroom ($user_id){
		
	}
	
	public displayChatroom (){
	
		
	
	}
}
?>