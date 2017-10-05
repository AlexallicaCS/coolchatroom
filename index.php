<?php

	$debug = false;

	session_start();
	
	require_once("./User.php");
	
	if(isset($_POST["login"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			//in case of someone bypassing front end controls
			
			$error = "You need to provide a username and password. Please go back!";
			
			echo $error;
			
			exit();
		
		} else {
			
			if (isset($_POST['username']) and isset($_POST['password'])) {
				$username = stripslashes($_POST['username']);
				$password = stripslashes($_POST['password']);
				
				$user = new User($username,$password);
							
				$_SESSION['userID'] = $user->getUserId();
				$_SESSION['name'] 	= $user->getUserName();
				$_SESSION['role']	= $user->getUserRole();
				
				if ($debug) {
					var_dump($_SESSION);
				}
			}
		}
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
			<h3 class="dashboard_group_headers">Active Chatrooms</h3>
			<ul>
				<?php  ?>
				<li>One</li>
				<li>Master</li>
				<li>Kill</li>
				
			</ul>
		</div>
		<div id="dashboard_center">
			
		</div>
		<span id="message_box">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<textarea></textarea>
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
	
	<script src="js/script.js"></script>
	
</body>
</html>