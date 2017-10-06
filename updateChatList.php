<?php

	require_once("./Connection.php");
	
	$conn = new Connection();
	
	$mysqli = $conn->getConnectionString();
	
	$sql = "SELECT chatroom_id, name FROM chatrooms";
	$result = mysqli_query($mysqli, $sql);
	$results = array();
	while($list = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$results[] = $list;
	}
		
	$conn->disconnect();
	
	echo json_encode($results);

?>