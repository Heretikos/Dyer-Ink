<?php

	//echo admin login stylesheet, headers, title
	
?>
<html>
	<head>
		<title>Administrator Login</title>
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=70%; initial-scale=1.0" />
		<style type="text/css">
			html { 
			  background: url("http://www.superedo.net/fond-ecran/fond-ecran/Google%20Nexus/Google%20Nexus%205/google_nexus_5_088.jpg") no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  
			  font-family: 'Wire One', sans-serif;
			}
			form {
				width: 500px;
				margin: auto;
				margin-top:15%;
				text-align:right;
			}
			.adminLogin input {
				border:1px solid white;
				background-color:transparent;
				color:white;
				padding:10px;
				margin:15px;
				font-size:1.7em;
			}
			.adminLogin input[type=submit] {
				padding:10px 32px;
			}
			.error {
				color:red;
				font-size:1.45em;
				text-align:center;
				margin:auto;
				font-weight:bold;
			}
			h2 {
				color:lime-green;
				font-size:0.7em;
			}
		</style>
	</head>
	<body>

<?php

	//Check if $_POST variables for login form are set
	
	if(isset($_POST['username']) && isset($_POST['pass'])) {
		
		//If so, sanitize inputs.
		$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		
		
		//Then, check against values in database 
		require "adminmysqlcreds.php";
		
		// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
	
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 
		
		//query database
		$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
		$result = $conn->query($sql);
	
		//check if they're in the database
		if ($result->num_rows > 0) {
			echo "username and password matched";
			//If they match, set cookie, 
			setcookie("loggedIn1234", "do not care", time() + (86400 * 30), "/");
			
			//accounce that the login was successful
			echo "<h1>Login successful!</h1>";
			
			//redirect with javascript
			echo "<script>window.location.href='index.php';</script>";
			
			//Then email login details (time, IP address) to admin@dyerink.com
			$msg = "From IP: " . $_SERVER['REMOTE_ADDR'] . "\nWith username: $user and password $pass";
			
			mail("admin@dyerink.com","Admin login by $user",$msg);
			
		}
		else {
			
			//If they don't match, log IP address, email login attempt details (including attempted
			//password) to admin@dyerink. 
			
			$msg = "From IP: " . $_SERVER['REMOTE_ADDR'] . "\nWith username: $user and password $pass";
			
			mail("admin@dyerink.com","Failed Login Attempt",$msg);
			
			
			
			//Then echo that the password or username was incorrect
			
			echo '<form class="adminLogin" method="post" action="index.php">';
			echo '<div class="error">Incorrect username or password</div>';
			echo '<input type="text" placeholder="Username" name="username" /> <br />';
			echo '<input type="password" placeholder="Password" name="pass" /> <br />';
			echo '<input type="submit" value="Login" />';
			echo '</form>';
			
		}
		
		
		
	} else {
		//If not, echo a basic form for login
		echo '<form class="adminLogin" method="post" action="index.php">';
		echo '<input type="text" placeholder="Username" name="username" /> <br />';
		echo '<input type="password" placeholder="Password" name="pass" /> <br />';
		echo '<input type="submit" value="Login" />';
		echo '</form>';
	}
	
	//closing tags
?>
		
	</body>
</html>