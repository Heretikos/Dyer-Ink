<?php
	
	//Connect to mySQL database
	require "adminmysqlcreds.php";
	$title = "Unpublishing item to Drafts...";
	require "adminHeaders.php";
	
	$dbname = "test";
	
	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 
	
	//fetch $_GET parameter
	$publishID = $_GET["itemID"];
	
	//publish the item corresponding to that ID
	
	$sql = "UPDATE inventory SET published='0' WHERE id=$publishID";
	
	
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		echo "<script>window.location.href='index.php';</script>";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
	$conn->close();
	
?>