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
		<meta name="viewport" content="width=65%, initial-scale=1.0" />
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
			
			h1 {
				text-align:center;
				font-size:4em;
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
			
			#addItemButton {
				position:absolute;
				top:30px;
				left:57px;
				text-decoration:none;
				padding:10px 30px;
				border:1px solid white;
				border-radius:3px;
				color:white;
				font-size:2em;
				font-weight:bold;
				background-color:rgba(120,255,0,0.7);
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
			
			.inventoryItem {
				background-color:rgba(255,255,255,0.7);
				box-shadow: 3px 7px 16px #888888;
				padding:30px;
				width:500px;
				margin:50px;
				transition:background-color 1s;
			}
			
			.inventoryItem:hover {
				background-color:rgba(255,255,255,1);
				transition:background-color 2s;
			}
			
			.inventoryItem img {
				float:left;
				margin-right:50px;
			}
			
			@media (orientation: landscape) {
				.inventoryItem {
					background-color:rgba(255,255,255,0.7);
					box-shadow: 3px 7px 16px #888888;
					padding:30px;
					width:85%;
					margin:50px;
				}
			}
		</style>
	</head>
	<body>
	
<?php
	
		
		//Echo H1 that says inventory
		echo "<h1>Inventory</h1>";
		
		//Echo addItem button (just a link to /addItem.php really)
		echo "<a href='additem.php' id='addItemButton'>Add Item</a>";
		
		//connect to database, authenticate
		require "adminmysqlcreds.php";
		
		$dbname = "tsubasag_DI_inventory";
		
		// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
	
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
					echo "<div class='inventoryItem'><img src='" . $row['imageURL'] . "' width='100' /><h2>" . $row["id"] . " " . $row["name"] . "</h2><p>" . $row['description'] . "</p>";
					//div inside of that with icons and ahrefs for deleting, editing,
					//publish/unpublishing that item (using $_GET parameters in the URLs) with class
					//that makes it invisible on mobile
					echo "<div class='itemTools'><a href='additem.php?itemID=" . $row["id"] . "'>Edit</a></div>";
					
					echo "</div>";
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