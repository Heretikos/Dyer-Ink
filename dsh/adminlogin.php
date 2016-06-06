<?php

	//echo admin login stylesheet, headers, title
	require "adminHeaders.php";
?>

<?php

	//Check if $_POST variables for login form are set
	
	if(isset($_POST['username']) && isset($_POST['pass'])) {
		
		//If so, sanitize inputs.
		$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		
		
		//Then, check against values in database 
		require "adminmysqlcreds.php";
		
		// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword,$admindbname);
	
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
	
	require "adminFooter.php";
?>