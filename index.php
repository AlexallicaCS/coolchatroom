<?php

	$debug = false;

	session_start();
	
	require_once("./User.php");
	require_once("./Chatroom.php");
	
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

  <title>Cool Chatroom Main Menu</title>
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
	<div id="chatrooms">
		<h3 class="dashboard_group_headers">Chatrooms <a id="newchat" href="#" />[+]</a></h3>
		<ul id="chatroomlist"></ul>	
	</div>
	<div id="dashboard_right" class="dashboard_segments">
		<h3 class="dashboard_group_headers">Users</h3>
		<ul id="userlist"></ul>
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