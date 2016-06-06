<?php
	//include PHP template with concept of InventoryItem
	include "inventoryClass.php";
	//require headers and shit
	$title = "Add item to store inventory";
	require "adminHeaders.php";

	//if $_GET parameters are set, instantiate a PHP object out of those parameters
	//and then call its methods for rendering the form populated (might just be a particular 
	//include())
	if (isset($_GET['itemID'])) {
		
	} 
	
	//if $_POST parameters are set, instantiate a PHP object out of those post parameters 
	//and populate that object, then call its methods to push that info into database,
	//then echo "item added" or something
	elseif (isset($_POST['itemName'])) {
		$newitem = new InventoryItem();
	}
	


	//include fooders and shit
?>