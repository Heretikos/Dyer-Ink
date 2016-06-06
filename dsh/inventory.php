<?php

	//import template to check if admin is logged in
	require "adminCheck.php";
	
	
	if($adminLoggedIn) {
		//if they are, welcome them, echo headers for full admin page
		
?>
<html>
	<head>
		<title>Dyer Ink Inventory</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=65%; initial-scale=1.0" />
		<style type="text/css">
		html {
			background-color:rgb(100,100,220);
			font-family: sans-serif;
			
			background: url("http://www.superedo.net/fond-ecran/fond-ecran/Google%20Nexus/Google%20Nexus%205/google_nexus_5_088.jpg") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			
			font-family: 'Wire One', sans-serif;

		}
			#logoutButton {
				position:absolute;
				top:10px;
				right:10px;
				text-decoration:none;
				padding:10px 30px;
				border:1px solid white;
				border-radius:3px;
				color:white;
				font-size:2em;
				font-weight:bold;
			}
			
			.adminNavigation {
				margin:auto;
				text-align:center;
				width: 60%;
				margin-top:10%;
			}
			
			.adminNavButton {
				padding:30px;
				margin: 15px;
				border:1px solid white;
				border-radius:10px;
				display:inline-block;
				color:white;
				font-size:2em;
				background-color:rgba(0,0,0,0.3);
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
	<body>
	
<?php
	
		
		//Echo H1 that says inventory
		echo "<h1>Inventory</h1>";
		
		//Echo addItem button (just a link to /addItem.php really)
		echo "<a href='addItem.php'>Add Item</a>";
		
		//connect to database, authenticate
		require "adminsqlcreds.php";
		
		$dbname = "tsubasag_DI_inventory";
		
		$conn = new mysqli($servername, $username, $password,$dbname);
	
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 
		
		//get count of items/number of entries in inventory table
		
		$sql = "SELECT * FROM inventory";
		$result = $conn->query($sql);
		$itemCount = $result->num_rows;
	
		if ($itemCount > 0) {
				//If it's above zero, do an SQL query then, spit that shit out with a for() loop
				while($row = $result->fetch_assoc()) {
					//div, image with class that makes it float left, h2 with item name, p with details
					//div inside of that with icons and ahrefs for deleting, editing,
					//publish/unpublishing that item (using $_GET parameters in the URLs) with class
					//that makes it invisible on mobile
					echo  "<br>" . $row["id"];
					}
		} else {
				//if it's zero, echo "there's nothing in your inventory, click above to add an item!"
				echo "There's nothing in your inventory, click above to add an item!";
		}
		$conn->close();
		

	}
	//echo closing tags
	include "adminFooter.php";	
?>