<?php
	session_start();
	require_once("./Chatroom.php");
	
	$newchat = new Chatroom($_POST['chat_name'],$_SESSION['userID']);
	
	$_SESSION['currentChatID'] = $newchat->getChatRoomId();
	
	echo json_encode(array($newchat->getChatRoomName(),$newchat->getChatRoomId()));

?>