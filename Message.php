<?php
require_once("./Connection.php");

class Message
{
	private $messageId;
	private $messageText;
	private $senderId;
	private $messageType;
	private $chatroomId;
	
	public function __construct($messageText,$messageType,$senderId,$chatroomId) {
		
		$this->messageText 	= $messageText;
		$this->messageType 	= $messageType;
		$this->senderId		= $senderId;
		
		// Recipient/Destination
		$this->chatroomId	= $chatroomId;
		
		//Save Message/Set MessageId
		$this->setMessageId();
		
	}
	
	public function setMessageId() {
		
		$conn = new Connection();
		
		$mysqli = $conn->getConnectionString();
		
		$sql = "INSERT INTO messages VALUES(NULL,'" . $this->messageText . "','" . $this->messageType . "','" . $this->senderId . "','" . $this->chatroomId . "', NOW()";
		$ins = $mysqli->query($mysqli, $sql);
				
		$this->messageId = $mysqli->insert_id;
				
		$conn->disconnect();
				
	}
}
?>