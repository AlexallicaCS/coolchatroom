<?php
require_once("./connection.php");
class Message
{
	private $messageId;
	private $messageText;
	private $senderId;
	private $messageType;
	
	public function __construct() {
		
		
		
	}
	
	
	
	
	public function postMessage ($user_id, $text ,$type) {
		
		
		
		$user_id = $this -> mysqli->real_escape_string($user_id);
		$text = $this -> mysqli->real_escape_string($text);
		$type = $this -> mysqli->real_escape_string($type);
		$query = 'INSERT INTO messages (message_text,message_type, message_timestamp, sender_id)'
		'VALUES (
		"' . $text . '",
		"' . $type . '",
		NOW(),
		"' . $user_id . '")';
		
		$result = $this ->mysqli->query($query);
	}

	public function getNewMessages (){
			$query = 
			'
			SELECT messages.sender_id, messages.message_text, messages.message_type,
			messages.message_timestamp, users.user_id, users.name
			FROM messages INNER JOIN users ON users.user_id = messages_sender_id
			ORDER BY timestamp DESC LIMIT 50;
			
			';
			$result = $this ->mysqli->query($query);
			
			//xml
			$response = '<?xml version = "1.0" encoding = "UTF-8" standalone = "yes"?>';
			$response .= '<response>';
			
			//check if there are any messages
			if ($result->num_rows){
				//set variables for better readability
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					$sender_id = $row['sender_id'];
					$text = $row['message_text'];
					$type = $row['message_type'];
					$time = $row['message_timestamp'];
					$response .= '<sender_id>'. $sender_id .'</sender_id>'.
								'<text>'. $text .'</text>'.
								'<type>'. $type .'</type>'.
								'<time>'. $time .'</time>';
								
								
					
				}
				result->close();
				
			}
			
			$response .= '</response>';
			return print_r($response);
	}
}
?>