<?php

	require "adminHeaders.php";
	require "adminmysqlcreds.php";
	
	//Grab $_GET variable of itemID
	if(!isset($_GET['id'])) {
		echo "There doesn't appear to be an item with that id...";
		echo "<br /><a href='inventory.php'>Click here to go back to the inventory</a>";
	} else {
		//connect to MySQL database for inventory
		$dbname = "test";
		
		// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
	
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 
		
		//Delete item corresponding with that ID
		
		$sql = "DELETE FROM inventory WHERE id='" . $_GET['id'] . "';";
		if ($conn->query($sql) === TRUE) {
			echo "Item deleted successfully!";
			echo "<script>setTimeout(window.location.href='inventory.php',5000);</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
		
	}
	
	
	require "adminFooter.php";
	
?>