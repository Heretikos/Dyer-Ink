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
					//Create the form and populate it with the appropriate values
?>
	
	<form action="additem.php" method="POST">
		<input type="text" name="itemName" placeholder="Item Name" value="<?php echo $row['name']; ?>" /><br />
		<input type="number" name="itemPrice" step="0.01" placeholder="Price" value="<?php echo $row['price']; ?>" /><br />
		<input type="text" name="imageURL" placeholder="URL of image" value="<?php echo $row['imageURL']; ?>" /><br />
		<input type="text" name="description" placeholder="Description" value="<?php echo $row['description']; ?>" />
		<input type="submit" value="Save" />
	</form>
	
<?php
					}
		} else {
				//if it's zero, echo "there's nothing in your inventory, click above to add an item!"
				echo "Item not found - perhaps it was deleted?<br />";
				echo "<a href='inventory.php'>Click here to return to inventory</a>";
		}
	} 
	
	//if $_POST parameters are set, instantiate a PHP object out of those post parameters 
	//and populate that object, then call its methods to push that info into database,
	//then echo "item added" or something
	elseif (isset($_POST['itemName'])) {
		$newitem = new InventoryItem($_POST['itemName'],$_POST['itemPrice'],$_POST['description'],$_POST['imageURL'],true,0,0);
		$newitem->addToDB();
		echo "<h1>Item Saved successfully probably!</h1>";
		echo "<script>t=setTimeout(window.location.href='inventory.php',1000);</script>";
	} else {
?>


<form action="additem.php" method="POST">
	<input type="text" name="itemName" placeholder="Item Name" value="" /><br />
	<input type="number" name="itemPrice" step="0.01" placeholder="Price" value=""/><br />
	<input type="text" name="imageURL" placeholder="URL of image" value="" /><br />
	<input type="text" name="description" placeholder="Description" value=""/>
	<input type="submit" value="Save" />
</form>

<?php
	}
	
	
	$conn->close();
	


	//include fooders and shit
	require "adminFooter.php";
?>