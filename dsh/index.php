<?php

	//import template to check if admin is logged in
	require "adminCheck.php";
	
	
	if($adminLoggedIn) {
		//if they are, welcome them, echo headers for full admin page
		
?>
<html>
	<head>
		<title>Dyer Ink Administrative Panel</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
		html {
			background-color:rgb(100,100,220);
			font-family: sans-serif;
		}
			#logoutButton {
				position:absolute;
				top:10px;
				right:10px;
				text-decoration:none;
				padding:15px 50px;
				border:1px solid white;
				border-radius:3px;
				color:white;
				font-size:2em;
				font-weight:bold;
			}
			
			.adminNavigation {
				margin:auto;
				text-align:center;
				width: 70%;
				margin-top:15%;
			}
			
			.adminNavButton {
				padding:30px;
				margin: 0 15px;
				border:1px solid white;
				border-radius:10px;
				display:inline-block;
				color:white;
				font-size:2em;
			}
			.adminNavButton a {
				color:white;
				text-decoration:none;
			}
			/* Rules for sizing the icon. */
			.material-icons.md-18 { font-size: 18px; }
			.material-icons.md-24 { font-size: 24px; }
			.material-icons.md-36 { font-size: 36px; }
			.material-icons.md-48 { font-size: 48px; }
			.material-icons.md-max { font-size: 158px;}
			
			/* Rules for using icons as black on a light background. */
			.material-icons.md-dark { color: rgba(0, 0, 0, 0.54); }
			.material-icons.md-dark.md-inactive { color: rgba(0, 0, 0, 0.26); }
			
			/* Rules for using icons as white on a dark background. */
			.material-icons.md-light { color: rgba(255, 255, 255, 1); }
			.material-icons.md-light.md-inactive { color: rgba(255, 255, 255, 0.3); }
		</style>
	</head>
	
<?php
	
	//Then echo the three buttons and information about last login date and IP
	
?>
	<body>
		Last login was from IP: 000.111.222.333
		<div class="adminNavigation">
			<div class="adminNavButton">
				<a href="inventory.php">
					<i class="material-icons md-max">card_travel</i><br />Inventory
				</a>
			</div>
			<div class="adminNavButton">
				<a href="categories.php">
					<i class="material-icons md-max">assignment</i><br />Categories
				</a>
			</div>
			<div class="adminNavButton">
				<a href="settings.php">
					<i class="material-icons md-max">settings</i><br />Settings
				</a>
			</div>

		</div>
		<a href='logout.php' id="logoutButton">Logout</a>

	</body>
</html>

<?php
		
		
		
		
	} else {
		//if they aren't, include the login form with all its glorious headers
		require "adminlogin.php";
	}
	
?>