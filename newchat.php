<?php
	session_start();
	require_once("./Chatroom.php");
	
	$newchat = new Chatroom($_POST['chat_name'],$_SESSION['userID']);
	
	echo "yeah";

?>