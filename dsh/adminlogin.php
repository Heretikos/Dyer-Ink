<?php

	//echo admin login stylesheet, headers, title
	
?>
<html>
	<head>
		<title>Administrator Login</title>
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
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
				width: 300px;
				margin: 0 auto;
			}
			.adminLogin input {
				border:1px solid white;
				background-color:transparent;
				color:white;
				padding:10px;
				margin:15px;
				font-size:2.5em;
			}
		</style>
	</head>
	<body>

<?php

	//Check if $_POST variables for login form are set
	
	
	
	//If so, sanitize inputs.
	
	//Then, check against values in database 
	
	//If they match, set cookie, echo login successful, and some inline javascript to
	//reload the page. Then email login details (time, IP address) to admin@dyerink.com
	
	//If they don't match, log IP address, email login attempt details (including attempted
	//password) to admin@dyerink. Then echo that the password or username was incorrect
	
	
	
	
	//If not, echo a basic form for login
	
?>

<form class="adminLogin" method="post" action="index.php">
	<input type="text" placeholder="Username" /> <br />
	<input type="password" placeholder="Password" />
</form>

<?php

	//closing tags

?>
		
	</body>
</html>