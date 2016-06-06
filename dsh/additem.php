<?php
	//include PHP template with concept of InventoryItem
	include "inventoryClass.php";
	//require headers and shit
	$title = "Add item to store inventory";
	require "adminHeaders.php";
	
	require "adminmysqlcreds.php";
	
	$dbname = "tsubasag_DI_inventory";
	
	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 

	//if $_GET parameters are set, instantiate a PHP object out of those parameters
	//and then call its methods for rendering the form populated (might just be a particular 
	//include())
	if (isset($_GET['itemID'])) {
		$id = $_GET['itemID'];
		
		//get count of items/number of entries in inventory table
		
		$sql = "SELECT * FROM inventory WHERE id=$id";
		$result = $conn->query($sql);
		$itemCount = $result->num_rows;
	
		if ($result->num_rows > 0) {
				//If it's above zero, do an SQL query then, spit that shit out with a for() loop
				while($row = $result->fetch_assoc()) {
					//div, image with class that makes it float left, h2 with item name, p with details
					echo "<div class='inventoryItem'><img src='' width='100' /><h2>" . $row["id"] . " " . $row["name"] . "</h2><p>Details about item</p></div>";
					//div inside of that with icons and ahrefs for deleting, editing,
					//publish/unpublishing that item (using $_GET parameters in the URLs) with class
					//that makes it invisible on mobile
					}
		} else {
				//if it's zero, echo "there's nothing in your inventory, click above to add an item!"
				echo "Item not found - perhaps it was deleted?";
		}
	} 
	
	//if $_POST parameters are set, instantiate a PHP object out of those post parameters 
	//and populate that object, then call its methods to push that info into database,
	//then echo "item added" or something
	elseif (isset($_POST['itemName'])) {
		$newitem = new InventoryItem();
	}
	
	
	$conn->close();
	


	//include fooders and shit
	require "adminFooter.php";
?>