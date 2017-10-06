<?php

	$debug = false;

	session_start();
	
	require_once("./User.php");
	require_once("./Chatroom.php");
	
	if(isset($_SESSION["userID"]))
	{
		
		//$this->addUser($_GET['id'],$_SESSION['userID']);
		
		
	} else {
		
		header('location: ./index.php');
	
	}
?>
<!Doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Cool Chatroom</title>
  <meta name="description" content="Simple PHP Chatroom">

  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<?php if (isset($_SESSION['role'])) {  ?>
	<div id="top">
		<?php echo "Welcome, " . $_SESSION['name'] . " [ " . $_SESSION['role'] . " ] "; ?>
		<a href="./logout.php">logout</a>
	</div>
	<div id="dashboard">
		<!-- Left Segment for displaying all active chatrooms -->
		<div id="dashboard_left" class="dashboard_segments">
			<h3 class="dashboard_group_headers">Chatroom</h3>
			<ul id="chatroom"><?php echo $_GET['name']; ?></ul>
		</div>
		<div id="chatbox"><!-- Conversations happen here! --></div>
		<span id="message_box">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<textarea placeholder="Write Your Message Here..." required></textarea>
				<input id="sendbutton" type="submit" value="Send" />
			</form>
		</span>
		<!-- Right Segment for displaying all currently logged in users -->
		<div id="dashboard_right" class="dashboard_segments">
			<h3 class="dashboard_group_headers">Users</h3>
			
		</div>
	</div>
	
	
	<?php } else { ?>
		
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		  <div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<button type="submit" name = "login">Login</button>
		  </div>
		</form>
	
	<?php } ?>
	
	<script src="./js/script.js"></script>
	
</body>
</html>