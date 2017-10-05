<?php
require_once("./connection.php");
class Message
{
	public function postMessage ($user_id, $text ,$type){
		$user_id = $this -> mysqli->real_escape_string($user_id);
		$text = $this -> mysqli->real_escape_string($text);
		$type = $this -> mysqli->real_escape_string($type);
		$query = 'INSERT INTO message (sender_id, text, type, posted_on)'
		'VALUES (
		"' . $user_id . '",
		"' . $text . '",
		"' . $type . '",
		NOW()) ';
		
		$result = $this ->mysqli->query($query);
	}

	public function getNewMessages (){
			$query = 
			'
			SELECT sender_id, text, type, timestamp FROM message 
			ORDER BY timestamp DESC LIMIT 50
			
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
					$text = $row['text'];
					$type = $row['type'];
					$time = $row['timestamp'];
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