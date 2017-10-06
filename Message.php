<?php
require_once("./Connection.php");

class Message
{
	private $messageId;
	private $messageText;
	private $senderId;
	private $messageType;
	
	public function __construct($messageText,$messageType,$senderId) {
		
		$this->messageText 	= $messageText;
		$this->messageType 	= $messageType;
		$this->senderId		= senderId;
		
		//Save Message/Set MessageId
		$this->setMessageId();
		
	}
	
	public function setMessageId() {
		
		$conn = new Connection();
		
		$mysqli = $conn->getConnectionString();
		
		$sql = "INSERT INTO messages VALUES(NULL,'" . $this->messageText . "','" . $this->messageType . "', NOW()";
		$ins = $mysqli->query($mysqli, $sql);
				
		$this->messageId = $mysqli->insert_id;
				
		$conn->disconnect();
				
	}
}
?>